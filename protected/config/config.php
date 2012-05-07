<?php
//设置时区
date_default_timezone_set('Asia/Shanghai'); 

/**
 * 系统配置
 * 
 * @author 不会飞的羊
 */ 
return array(
    'name' => '网上订餐系统', // 应用名称
    'sourceLanguage' => 'zh_cn',
    
    // 预载入log（记录）应用组件，这表示该应用组件无论它们是否被访问都要被创建。该应用的参数配置在下面以“components”为关键字的数组中设置
    'preload' => array('log'),
    
    'theme' => 'basic', // 使用模版名称
    
    'defaultController' => 'default', // 设置默认控制器类
    
    'modules'=>array(
        /*
        'gii'=>array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin'
        )
        */
    ),
    
	// 当前应用的组件配置。
	'components' => array(
        'cache' => array(
            'class' => 'CDummyCache'
        ),
		'user' => array(
			'allowAutoLogin'=>true
		),
		// 数据库配置
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/dingcan.db',
			'tablePrefix' => 'd_',
		),
		/*
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=dingcan',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'd_',
            'schemaCachingDuration'=>3600
		),
		 */
        'messages' => array('language' => 'zh_cn'),
		'errorHandler' => array(
            'errorAction'=>'site/error'
        ),
        'urlManager' => array(
        	'urlFormat' => 'path',
            'showScriptName' => false,
        	'rules' => array(
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>'
            )
        ),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning'
				),
				// 将错误记录消息在网页上显示
                /*
				array(
					'class' => 'CWebLogRoute'
				)
                */
			)
		)
	)
);