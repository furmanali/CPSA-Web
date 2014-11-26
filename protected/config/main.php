<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CPSA',
	'theme'=>'frontend',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.wrest.*',
        'ext.wrest.behaviors.*',
        'ext.Zend.Gdata.*',
        'ext.Zend.*',
        'ext.wacf.*',
        'ext.wacf.terms.*',
        'ext.pdffactory.*',
        'application.pdf.docs.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'pdfFactory'=>array(
            'class'=>'ext.pdffactory.EPdfFactory',

            //'tcpdfPath'=>'ext.pdffactory.vendors.tcpdf', //=default: the path to the tcpdf library
            //'fpdiPath'=>'ext.pdffactory.vendors.fpdi', //=default: the path to the fpdi library

            //the cache duration
            'cacheHours'=>5, //-1 = cache disabled, 0 = never expires, hours if >0

            //The alias path to the directory, where the pdf files should be created
            'pdfPath'=>'application.runtime.pdf',

            //The alias path to the *.pdf template files
            //'templatesPath'=>'application.pdf.templates', //= default

            //the params for the constructor of the TCPDF class
            // see: http://www.tcpdf.org/doc/code/classTCPDF.html
            'tcpdfOptions'=>array(
                  'format'=>'A4',
                  'orientation'=>'P', //=Portrait or 'L' = landscape
                  'unit'=>'mm', //measure unit: mm, cm, inch, or point
                  'unicode'=>true,
                  'encoding'=>'UTF-8',
                  'diskcache'=>false,
                  'pdfa'=>false,

            )
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
            //rest url patterns
            array('api/<model>/delete', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'DELETE'),
            array('api/<model>/update', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'PUT'),
            array('api/<model>/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
            array('api/<model>/get', 'pattern'=>'api/<model:\w+>/<_id:\d+>', 'verb'=>'GET'),
            array('api/<model>/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
            ),
            'showScriptName'=>false,
        ),
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=portal',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=googledocs',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'R4mp4G3',
			'charset' => 'utf8',
		),*/

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'gmailUser'=>'rolustest1@gmail.com',
		'gmailPass'=>'xyzabc123',
		'apiKey'=>'c26e72f0474c8d9ae02ab692f3596d6f',
		'adminEmail'=>'webmaster@example.com',
	),
);