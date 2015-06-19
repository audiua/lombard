<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'theme'=>'classic',
	'defaultController'=>'site',

	// preloading 'log' component
	// 'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.widgets.sliderWidget.*',
		'application.widgets.leftMenuWidget.*',
		'application.widgets.saleWidget.*',
		'application.widgets.infoWidget.*',
		'application.widgets.formWidget.*',
		'application.widgets.linkPagerWidget.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'inside',
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'image'=>array(
		     'class'=>'application.extensions.image.CImageComponent',
		     // GD or ImageMagick
		     'driver'=>'GD',
		     // ImageMagick setup path
		    // 'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
	 	),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'/inside/<controller:\w+>/<action:\w+>/<id:\d+>'=>'inside/<controller>/<action>',
				'/inside/<controller:\w+>/<action:\w+>'=>'inside/<controller>/<action>',
				'/inside'=>'inside/default/index',
				'/gold.html'=>'site/gold',
				'/<page:[a-zA-Z0-9-]+>\.html'=>'site/page',
				'/<category:\w+>/<article:[a-zA-Z0-9-]+>\.html'=>'site/article',
				'/<category:\w+>/<p:\d+>'=>'site/category',
				'/<category:\w+>'=>'site/category',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		'db'=> require(dirname(__FILE__).'/db.php'),

		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		// 'log'=>array(
		// 	'class'=>'CLogRouter',
		// 	'routes'=>array(
		// 		array(
		// 			'class'=>'CFileLogRoute',
		// 			'levels'=>'error, warning',
		// 		),
		// 		// uncomment the following to show log messages on web pages
		// 		/*
		// 		array(
		// 			'class'=>'CWebLogRoute',
		// 		),
		// 		*/
		// 	),
		// ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);