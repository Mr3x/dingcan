<?php
/**
 * 系统工具类，定义一些常用的操作
 * 
 * @author 不会飞的羊
 */
class DingCanUtils {
	/**
	 * 脚本文件管理
	 */
	public static function Script($cs) {
		return new DingCanScript($cs);
	}
	
	/**
	 * 样式表文件管理
	 */
	public static function Css($cs) {
		return new DingCanCss($cs);
	}
}


/**
 * 系统脚本文件管理
 */
class DingCanScript {
	public $cs = null;
	
	public function __construct($cs) {
		$this->cs = $cs;
	}
	
	/**
	 * 注册 Script
	 */
	public function register($id, $script, $position = CClientScript::POS_HEAD) {
		$this->cs->registerScript($id, $script, $position);
		return $this;
	}
	
	/**
	 * 注册系统 Script
	 */
	public function registerCore($name) {
		$this->cs->registerCoreScript($name);
		return $this;
	}
	
	/**
	 * 注册 Script 文件
	 */
	public function registerFile($url, $position = CClientScript::POS_HEAD) {
		$this->cs->registerScriptFile($url, $position);
		return $this;
	}
}

/**
 * 系统样式文件管理
 */
class DingCanCss {
	public $cs = null;
	
	public function __construct($cs) {
		$this->cs = $cs;
	}
	
	/**
	 * 注册 Css
	 */
	public function register($id, $css, $media='') {
		$this->cs->registerCss($id, $css, $media);
		return $this;
	}
	
	/**
	 * 注册 Css 文件
	 */
	public function registerFile($url, $media='') {
		$this->cs->registerCssFile($url, $media);
		return $this;
	}
}
