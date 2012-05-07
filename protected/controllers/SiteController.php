<?php
/**
 * 前台单独页面
 * 
 * @author 不会飞的羊
 */
class SiteController extends Controller {
	/**
	 * 首页
	 */
	public function actionIndex() {
		$this->render('index');
	}
	
	/**
	 * 错误页面
	 */
	public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest) {
	    		echo $error['message'];
            } else {
	        	$this->render('error', $error);
            }
        }
	}
}