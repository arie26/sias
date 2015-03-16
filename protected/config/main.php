<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SIAS',

	// preloading 'log' component
    /*'preload'=>array(
        'log',
        'bootstrap', // preload the bootstrap component
    ),*/

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.AweCrud.components.*', // AweCrud components
        'ext.YiiMailer.YiiMailer',
	),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password'=>'arie',
            'generatorPaths' => array(
                'ext.AweCrud.generators', // AweCrud generators
            ),
        ),
    ),/*
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'arie',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'ext.bootstrap-theme.gii',
            ),
		),
		
	),*/

	// application components
	'components'=>array(
        'notification' => array('class' => 'application.components.NotificationManager'),
        'excel' => array('class' => 'application.components.ExcelFactory'),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'config' => array(
            'class' => 'application.extensions.EConfig.EConfig',
            'configTableName' => 'application_config',
            'strictMode' => false,
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
                'gii'=>'gii',                
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:.+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


        'mailer' => array(
            'class' => 'application.extensions.Yii-SwiftMailer-master.SwiftMailer',

            // Using SMTP:
            'mailer' => 'smtp',
            // security is optional
            // 'ssl' for "SSL/TLS" or 'tls' for 'STARTTLS'
            'security' => 'tls',
            'host'=>'smtp.gmail.com',
            'from'=>'reor.sdppi@gmail.com',
            'username'=>'reor.sdppi@gmail.com',
            'password'=>'sdppi1234',
            'port' => 587,

/*
            // Using sendmail:
            'mailer'=>'sendmail',
            // Logging
            // logs brief messages about message success or failhure
            logMailerActivity => true,
            // logs additional info from SwiftMailer about connection details
            // must be used in conjunction with logMailerActivity == true
            // check the send() method for realtime logging to console if required
            logMailerDebug => true,*/
        ),

        /*
        'urlManager' => array(
            'class' => 'application.components.UrlManager',
            'excludeRoutePattern' => array(
                '/^exam\//',
            ),
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName' => false,
        ),*/

		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sias',
			'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info, trace, debug',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        'messages' => array (
            'extensionPaths' => array(
                'AweCrud' => 'ext.AweCrud.messages', // AweCrud messages directory.
            ),
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),

        'session' => array(
            'class' => 'CDbHttpSession',
            'timeout' => 7200,
        ),
    /*
        'session' => array(
            'savePath' => 'D:/xampp/htdocs/reor/session', //I created this empty folder and placed it
            //outside of the protected folder. Currently the chmod is 775
            'cookieMode' => 'allow',
            'cookieParams' => array(
                'path' => '/sessCook', //I'm not sure if this is correct
                'domain' => 'http://www.mydomain.com/subdomain', //am I only supposed to place the          //parent domain?
                'httpOnly' => true,
            ),
        ),
    */
	),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
        'uploadFolder'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'../../../../files/Amatir',
        'attachmentFolder'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'../../../../files/Amatir/email',

        'webservice'=>array(
            'barcode' => 'http://10.1.25.25/barcode/barcode.php',
        ),

        //this is the default of dynamic application config
        'exam'=>array(
            'max_per_day' => 3,
            'date_to_exam_fixing_date'=> 3,
            'date_to_exam_closing_registration' => 3,
            'input_score_min' => 60,
            'input_score_max' => 99,
        ),
        'payment'=>array(
            'allow_manual_invoice_creation'=>0,
            'minutes_allow_reversal'=>20,
            'cost_per_registrant'=>20000,
            'renewal_fees_certificate'=>100000,
            'iar_khusus_fee'=>150000,
            'ikrap_fee'=>150000,
            'additional_exam_cost'=>0,
            'perangkat_surabaya'=>300000,
        ),
        'notification_bar'=>array(
            'email_attachmet_sign'=> "RACHMAT WIDAYANA",
            'max_pending_event' => 8,
            'max_pending_register'=> 0,
            'max_pending_nilai'=> 0,
            'max_pending_certificate'=> 8,
        ),
        'next_certificate_number'=>1,

        'print_kartu_ujian'=>array(
            'nama_tanda_tangan'=> 'SUBAGYO',
            'nip_tanda_tangan'=> '196110031990031001',
            'photo-top' => 300,
            'photo-left' => 200,
            'photo-size' => 300,
            'info-top' => 0,
            'info-left' => 200,
            'info-font-size'=>18,
        ),

        'print_certificate'=>array(
            'photo-top' => 30,
            'photo-left' => 100,
            'photo-size' => 200,
            'info-top' => 30,
            'info-left' => 400,
            'info-font-size'=>24,
        ),

	),
);
