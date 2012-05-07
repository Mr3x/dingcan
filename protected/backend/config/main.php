<?php
/**
 * 后台相关配置
 * 
 * @author 不会飞的羊
 */
$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('backend', $backend);
return CMap::mergeArray(
    require(dirname(__FILE__).'/../../config/config.php'),
    array(
        'basePath' => $frontend,
        
        'theme' => 'admin',
        
        'controllerPath' => $backend.'/controllers',
        'viewPath' => $backend.'/views',
        'runtimePath' => $backend.'/runtime',
 
        'import' => array(
            'application.models.*',
            'application.components.*',
            'backend.models.*',
            'backend.components.*',
        ),
        
        'components' => array(
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => true,
                'rules' => array(
                	'' => 'site/index',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
                )
            )
        )
    )
);
