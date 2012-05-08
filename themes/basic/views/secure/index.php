<?php
// ****mr
$cs = Yii::app()->clientScript;
DingCanUtils::Css($cs)
	->registerFile(Yii::app()->baseUrl.'/global/bootstrap/css/bootstrap.css')
	->registerFile(Yii::app()->baseUrl.'/global/bootstrap/css/bootstrap-responsive.css')
	->registerFile(Yii::app()->baseUrl.'/admin/css/dingcan.css');
DingCanUtils::Script($cs)
	->registerCore('jquery')
	->registerFile(Yii::app()->baseUrl.'/global/bootstrap/js/bootstrap.js');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode('用户登录 - '.Yii::app()->name); ?></title>
</head>
<body id="secure">
    <div class="modal">
    	<div class="modal-header">
    		<img id="logo" src="<?php echo Yii::app()->baseUrl.'/admin/img/logoS.png'; ?>">
    		<ul id="secureTab" class="nav nav-tabs">
    			<li class="active"><a href="#login">登录</a></li>
    			<li><a href="#reg">注册</a></li>
    		</ul>
    	</div>
    	<div class="modal-body tab-content">
    		<div id="login" class="tab-pane active">
    			<?php 
    				$loginForm = $this->beginWidget('CActiveForm', array(
    					'action' => $this->createUrl('secure/login'),
    					'htmlOptions' => array(
    						'id' => 'loginForm',
							'class' => 'clearfix'
						)
					)); 
				?>
				<?php echo $loginForm->errorSummary($login, "用户验证有误：", null, array(
					'class' => 'alert alert-error'
				)); ?>
				<?php echo $loginForm->label($login, 'username'); ?>
				<?php echo $loginForm->textField($login, 'username', array('class'=>'input-xlarge')) ?>
				<?php echo $loginForm->label($login, 'password'); ?>
				<?php echo $loginForm->passwordField($login, 'password', array('class'=>'input-xlarge')) ?>
				<div class="rememberMe pull-left">
					<?php echo $loginForm->checkBox($login, 'rememberMe', array('class'=>'pull-left')); ?>
					<?php echo $loginForm->label($login, 'rememberMe') ?>
				</div>
				<a href="#" id="loginSub" class="btn btn-primary pull-right">登录</a>
    			<?php $this->endWidget(); ?>
    			<div class="login-btm">
    				<a id="pwdA" href="#pwd">忘记密码？</a>
    			</div>
    		</div>
    		<div id="reg" class="tab-pane"></div>
    		<div id="pwd" class="tab-pane"></div>
    	</div>
    </div>
<script>
	$(function () {
		$('#secureTab a, #pwdA').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
		
		$('#loginSub').click(function(e) {$('#loginForm').submit();});
	});
</script>
</body>
</html>