<?php
// 系统前台入口

define('BASEPATH', dirname(__FILE__));

// 引导文件的路径 以及配置文件main.php的路径
$yii = BASEPATH.'/framework/yii.php';
$config = BASEPATH.'/protected/config/main.php';

// 正式环境下应该去掉，以提高性能，打开debug有利于调试
//defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
