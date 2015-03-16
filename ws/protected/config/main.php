<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'amatir-ws',

	// preloading 'log' component
    'preload'=>array(
        'log',
    ),

	// autoloading model and component classes
	'import'=>array(
        'application.wsobject.*',
		'application.models.*',
		'application.components.*',
        'ext.AweCrud.components.*', // AweCrud components
	),

	// application components
	'components'=>array(
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=amatir',
			'emulatePrepare' => true,
            //'enableParamLogging'=>true,
			//'username' => 'root',
			//'password' => '',
            'username' => 'posteldba',
            'password' => 'P05telDb4',
			'charset' => 'utf8',
		),

        'config' => array(
            'class' => 'application.extensions.EConfig.EConfig',
            'configTableName' => 'application_config',
            'strictMode' => false,
        ),

        'cache'=>array(
            'class'=>'system.caching.CDbCache'
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
					'levels'=>'error, warning, debug, info, trace',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
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
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
