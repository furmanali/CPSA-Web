<?php

// api/UserController.php

class V1Controller extends WRestController
{

    //protected $_modelName = "user"; //model to be used as resource

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('get', 'list', 'create'),
                'roles' => array('member'),
            ),
            array(
                'allow',
                'actions' => array('delete', 'update'),
                'expression'=>'Yii::app()->controller->isAuthenticated()',
            ),
            array(
                'allow',
                'actions' => array('delete', 'update', 'sendGoogleCloudPrint'),
                'users' => array('*'),
                //'ips' => array('127.0.0.1', '192.168.0.1'),
            ),

            /*array(
                'allow',
                'actions' => array('delete', 'update', 'updateSpreadsheetCellContent'),
                'resource' => array(
                    'model' => 'User',
                    'params' => 'id',
                    'ownerField' => 'account_id',
                ),
            ),*/

            array(
                'deny',
            ),
        );
    }

    protected function beforeAction() {
        $headers = apache_request_headers();
        if(!$this->validateApiKey($headers['apiKey']))
            $this->sendResponse(203, array('status_code' => '203', 'status_message' => "API Key is incorrect!"));
        return true;
    }

    public function actions() //determine which of the standard actions will support the controller
    {
        return array(
            'list' => array( //use for get list of objects
                'class' => 'WRestListAction',
                'filterBy' => array( //this param used in `where` expression when forming an db query
                    'account_id' => 'account_id', // 'name_in_table' => 'request_param_name'
                ),
                'limit' => 'limit', //request parameter name which will contain a limit of object
                'page' => 'page', //request parameter name which will contain a requested page num
                'order' => 'order', //request parameter name which will contain ordering for sort
            ),
            'delete' => 'WRestDeleteAction',
            'get' => 'WRestGetAction',
            'create' => 'WRestCreateAction', //provide 'scenario' param
            'update' => array(
                'class' => 'WRestUpdateAction',
                'scenario' => 'update', //as well as in WRestCreateAction optional param
            )
        );
    }

    public function actionSendGoogleCloudPrint()
    {
        ini_set('max_execution_time', 500);
        $post = file_get_contents("php://input");
        if (!$postData = CJSON::decode($post, true))
            $postData = $this->request->getAllRestParams();

        $headers = apache_request_headers();
        $apiKey = $headers['apiKey'];

        $hitsLogs = new HitsLogs();
        $hitsLogs->users_credentials_id = NULL;
        $hitsLogs->authkey = $apiKey;
        $hitsLogs->x2license = isset($postData['x2Licence']) ? ($postData['x2Licence']) : (NULL);
        $hitsLogs->google_drive_template_id = isset($postData['google_drive_template_id']) ? ($postData['google_drive_template_id']) : (NULL);
        $hitsLogs->google_printer_id = isset($postData['google_printer_id']) ? ($postData['google_printer_id']) : (NULL);
        $hitsLogs->ip = isset($_SERVER['REMOTE_ADDR']) ? ($_SERVER['REMOTE_ADDR']) : (NULL);
        $hitsLogs->email = isset($postData['email']) ? ($postData['email']) : (NULL);
        $hitsLogs->status = 0;
        $hitsLogs->date_created = date('Y-m-d H:i:s');

        if(!$this->validateRequestData($postData))
        {
            $hitsLogs->save();
            $this->sendResponse(203, array('status_code' => '203', 'status_message' => 'Validation Failed'));
        }
        elseif($user = $this->validateLicenseKey($postData['x2Licence']))
        {
            $user_id = $user->id;
            $counter_id = $user->hitsCounters->id;
            $hitsLogs->users_credentials_id = $user_id;
            $hitsCounter = new HitsCounter();


            if($user->hitsCounters->date_of_expiry < date('Y-m-d H:i:s'))
            {
                $hitsLogs->save();
                $this->sendResponse(203, array('status_code' => '203', 'status_message' => 'Subscription Expired'));
            }
            elseif(!$user->hitsCounters->hits_available)
            {
                $hitsLogs->save();
                $this->sendResponse(203, array('status_code' => '203', 'status_message' => "No Hits Available"));
            }
            else
            {
                Yii::import('application.vendors.*');
                $spreadsheetKey = isset($postData['documentId']) && !empty($postData['documentId']) ? ($postData['documentId']) : '1xzwKUN3G1zPqoqPrPBI2wGx3UroLTD0qNLnTVy17lKM';

                //*****Getting Printer Id*******//
                try{
                    $user = Yii::app()->params['gmailUser'];
                    $pass = Yii::app()->params['gmailPass'];

                    if(!$printerid = (isset($postData['google_printer_id']) && !empty($postData['google_printer_id'])) ? ($postData['google_printer_id']) : (NULL))
                    {
                        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, 'cloudprint');
                        // Get token, add headers, set uri
                        $Client_Login_Token = $client->getClientLoginToken();
                        $client->setHeaders('Authorization','GoogleLogin auth='.$Client_Login_Token);
                        $client->setUri('http://www.google.com/cloudprint/interface/search');

                        $response = $client->request(Zend_Http_Client::POST);

                        $PrinterResponse = json_decode($response->getBody());
                        $printers = array();


                        if (isset($PrinterResponse->printers)) {
                            foreach ($PrinterResponse->printers as $printer)
                            {
                                if($printer->name == "HP LaserJet Professional P1102w")
                                    $printerid = $printer->id;
                                $printers[] = $printer->id;
                            }
                        } else {
                            $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Something went wrong!!"));
                        }
                    }
                    //*******Download the google docs template update placeholders and convert to pdf*******//
                    try{
                        $service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
                        $client = Zend_Gdata_ClientLogin::getHttpClient($user,$pass, $service);
                        $docsService = new Zend_Gdata_Docs($client);
                        $doc = $docsService->getDocument($spreadsheetKey);
                        $client->setUri($doc->getContent()->getSrc());
                        $response = $client->request();
                        $html = $response->getBody();

                        //save placeholder values
                        foreach ($postData as $key => $value)
                            $html = str_replace($key,$value, $html);

                        Yii::import('application.extensions.tcpdf.html2pdf');
                        try
                        {
                            $html2pdf = new html2pdf('P', 'A4', 'en');
                            //$html2pdf->setModeDebug();
                            $html2pdf->setDefaultFont('Helvetica');
                            $html2pdf->writeHTML($html,false);
                            $data = $html2pdf->Output("pdfdemo.pdf",true);

                            //create a TCPDF instance with the params from tcpdfOptions from config/main.php
                            /*$pdf=Yii::app()->pdfFactory->getTCPDF();
                            //$pdf=Yii::app()->pdfFactory->getWkHtmlToPdf();

                            //use this instance like explained in [TCPDF examples](http://www.tcpdf.org/examples.php "")
                            $pdf->SetCreator(PDF_CREATOR);
                            $pdf->SetAuthor('Nicola Asuni');
                            $pdf->addPage();
                            $pdf->write(0,$html);
                            $data=$pdf->output("pdfdemo.pdf",'F');*/
                            //******Sending file to cloud printing*******//
                            try{
                                // Set up Gdata client and log in
                                $client = \Zend_Gdata_ClientLogin::getHttpClient($user, $pass, 'cloudprint');
                                $Client_Login_Token = $client->getClientLoginToken();
                                $client->setHeaders('Authorization','GoogleLogin auth='.$Client_Login_Token);
                                $client->setUri('https://www.google.com/cloudprint/interface/submit');

                                // Set parameters
                                $client->setParameterPost('printerid',$printerid);
                                $client->setParameterPost('title', 'Test Print');
                                $client->setParameterPost('contentTransferEncoding','base64');
                                $client->setParameterPost('content',base64_encode($data));
                                $client->setParameterPost('contentType','application/pdf');

                                // Submit and get response
                                $response = $client->request(\Zend_Http_Client::POST);

                                // Check response
                                $PrinterResponse = json_decode($response->getBody());

                                if (isset($PrinterResponse->success) && $PrinterResponse->success==1) {
                                    $hitsCounter->updateCounter($counter_id,$user_id,'success');
                                    $hitsLogs->status = 1;
                                    $hitsLogs->google_printer_id = $printerid;
                                    $hitsLogs->save();
                                    $this->sendResponse(200, array('status_code' => '200', 'status_message' => "Success! The document should print shortly."));

                                } else {
                                    $hitsCounter->updateCounter($counter_id,$user_id,'failure');
                                    $hitsLogs->google_printer_id = $printerid;
                                    $hitsLogs->save();
                                    $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Printing Failed!"));
                                }
                            }
                            catch(Zend_Gdata_App_AuthException $e)
                            {
                                $hitsLogs->google_printer_id = $printerid;
                                $hitsLogs->save();
                                $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Sending cloud print failure!"));
                            }
                        }
                        catch(HTML2PDF_exception $e) {
                            $hitsLogs->google_printer_id = $printerid;
                            $hitsLogs->save();
                            $this->sendResponse(203, array('status_code' => '203', 'status_message' => "PDF Generation Failure!"));
                        }

                    }
                    catch(Zend_Gdata_App_AuthException $e)
                    {
                        $hitsLogs->google_printer_id = $printerid;
                        $hitsLogs->save();
                        $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Document Download failure!"));
                    }
                }
                catch(Zend_Gdata_App_AuthException $e)
                {
                    $hitsLogs->save();
                    $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Printer ID failure!"));
                }
            }
        }
        else
        {
            $hitsLogs->save();
            $this->sendResponse(203, array('status_code' => '203', 'status_message' => "Failure!"));
        }

    }

    public function validateApiKey($apiKey) {
        if(Yii::app()->params['apiKey'] == $apiKey) {
            return true;
        } else {
            return false;
        }
    }

    public function validateLicenseKey($licenseKey) {
        $model = UsersCredentials::model()->find(array('condition'=>'x2license="'.$licenseKey.'"'));
        if(isset($model["id"]) && !empty($model["id"])) {
            return $model;
        } else {
            return false;
        }
    }





    public function validateRequestData($data) {
        if(
            isset($data['x2Licence']) && !empty($data['x2Licence']) &&
            isset($data['google_drive_template_id']) && !empty($data['google_drive_template_id']) &&
            isset($data['google_printer_id']) && !empty($data['google_printer_id'])
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return HitsCounter the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=UsersDetails::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }


}