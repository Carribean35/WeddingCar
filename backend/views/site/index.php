<?php
/* @var $this SiteController */

$this->title_h3='Главная';

$this->breadcrumbs=array(
	'Главная'
);

$this->menuActiveItems[EController::DESKTOP_MENU_ITEM] = 1;

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'
	),
	CClientScript::POS_END
);
?>

<div class="container">
	
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'content-form',
			'enableAjaxValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'error',
			),
			'htmlOptions'=>array('class'=>'form-horizontal'),
			// 'action'=>'/catalog/brand/add/'
		)); ?>

			<div class="control-group">
				<?php echo $form->label($model,'phone',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($model,'phone',array('class'=>'m-wrap medium', 'id' => 'phone')); ?>
					<span class="help-inline"><?php echo $form->error($model,'phone'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'email',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($model,'email',array('class'=>'m-wrap medium')); ?>
					<span class="help-inline"><?php echo $form->error($model,'email'); ?></span>
				</div>
			</div>
			
			<div class="form-actions large">
				<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
				<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
			</div>

		<?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#phone").inputmask("mask", {"mask": "9 (999) 999 99 99"});	
	})

</script>