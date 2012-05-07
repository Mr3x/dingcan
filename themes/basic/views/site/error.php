<?php
$this->pageTitle = $code.'错误 - '.Yii::app()->name;
?>
<h2><?php echo $code; ?> 错误</h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>