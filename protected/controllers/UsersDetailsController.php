<?php

class UsersDetailsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UsersDetails('insert');
        $model_credentials=new UsersCredentials('insert');
        $model_counter=new HitsCounter('insert');
        $model_credentials_login=new UsersCredentials;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if(isset($_POST['UsersDetails'], $_POST['UsersCredentials']))
        {
            $salt = openssl_random_pseudo_bytes(22);
            $salt = '$2a$%13$' . strtr(base64_encode($salt), array('_' => '.', '~' => '/'));

            if(!empty($_POST['UsersCredentials']['password']) && !empty($_POST['UsersCredentials']['repeat_password']))
            {
                $_POST['UsersCredentials']['password'] = crypt($_POST['UsersCredentials']['password'], $salt);
                $_POST['UsersCredentials']['repeat_password'] = crypt($_POST['UsersCredentials']['repeat_password'], $salt);
            }

            $model_credentials->attributes=$_POST['UsersCredentials'];

            $model_credentials->authkey = md5(time());
            $model_credentials->x2license = crypt(time(),$salt).md5($model_credentials->email);
            $model_credentials->date_of_expiry = date('Y-m-d');
            $model_credentials->status = 1;
            $model->attributes=$_POST['UsersDetails'];

            // validate BOTH $a and $b
            $valid=$model_credentials->validate();
            $valid=$model->validate() && $valid;


            if($valid)
            {
                // use false parameter to disable validation
                if($model_credentials->save(false))
                {
                    $model->users_credentials_id = $model_credentials->id;
                    $model->save();
                    $model_counter->users_credentials_id = $model_credentials->id;
                    $model_counter->date_of_expiry = date('Y-m-d');
                    $model_counter->save(false);
                }
                $this->redirect(array('view','id'=>$model->id));
            }
        }


		$this->render('create',array(
			'model'=>$model,
			'model_credentials'=>$model_credentials,
			'model_credentials_login'=>$model_credentials_login,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

        $model->scenario='update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UsersDetails']))
		{
			$model->attributes=$_POST['UsersDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UsersDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout = "//layouts/column1";
		$model=new UsersDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsersDetails']))
			$model->attributes=$_GET['UsersDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsersDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsersDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsersDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
