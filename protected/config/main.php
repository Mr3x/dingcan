<?php
/**
 * 前台相关配置
 * 
 * @author 不会飞的羊
 */
return CMap::mergeArray(
    require(dirname(__FILE__).'/config.php'),
    array(
        'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        
        'theme' => 'basic',
 
        'import' => array(
            'application.models.*',
            'application.components.*',
        ),
        
        'components' => array(
            'urlManager' => array(
                'urlFormat' => 'path',
                'rules' => array(
                	'' => 'site/index',
                	'login' => 'secure/index',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
                )
            )
        )
    )
);
