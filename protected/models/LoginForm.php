<?php
/**
 * 用户登录 Model
 * 
 * @author 不会飞的羊
 */
class LoginForm extends CFormModel {
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	public function rules() {
		return array(
			array('username, password', 'required'),
			array('rememberMe', 'boolean'),
			array('password', 'authenticate')
		);
	}

	public function attributeLabels() {
		return array(
            'username' => '用户名',
            'password' => '密码',
			'rememberMe' => ' 记住我的登录信息'
		);
	}

	public function authenticate($attribute,$params) {
		$this->_identity=new UserIdentity($this->username, $this->password);
		if(!$this->_identity->authenticate()) {
			$this->addError('password', '用户名或密码不正确.');
        }
	}

	public function login() {
		if($this->_identity===null) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		} else {
			return false;
        }
	}
}
