<?php
/**
 * 用户数据
 * 
 * @author 不会飞的羊
 */
class User extends CActiveRecord {
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{users}}';
	}
	
	public function validatePassword($password) {
		return $this->hashPassword($password, $this->confusing)===$this->password;
	}

	public function hashPassword($password, $confusing) {
		return md5($confusing.$password);
	}
	
	protected function generateSalt() {
		return uniqid('',true);
	}
}