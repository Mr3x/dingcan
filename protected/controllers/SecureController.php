<?php
/**
 * 系统安全控制器，主要实现用户登录，注册及密码找回等功能
 * 
 * @author 不会飞的羊
 */
class SecureController extends CController {
	/**
	 * 当前控制器的默认页面
	 */
	public function actionIndex() {
		$this->actionLogin();
	}
	
	/**
	 * 用户登录
	 */
	public function actionLogin() {
		$login = new LoginForm();
		if(isset($_POST['LoginForm'])) {
			$login->attributes=$_POST['LoginForm'];
			if($login->validate() && $login->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$this->render('index', array(
			'action' => 'login',
			'login' => $login
		));
	}
	 
	/**
	 * 用户退出
	 */
	public function actionLogout() {
		Yii::app() -> user -> logout();
		$this -> redirect($this->createUrl('secure/login'));
	}
}