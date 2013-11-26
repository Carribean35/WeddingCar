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

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.js'
	),
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-timepicker/compiled/timepicker.css'
	),
	'',
	CClientScript::POS_END
);
Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-datepicker/css/datepicker.css'
	),
	'',
	CClientScript::POS_END
);

?>

<div class="container">
	
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>$model->formId,
			'enableAjaxValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'error',
				'afterValidate'=>'js:contentAfterValidate',
			),
			'htmlOptions'=>array('class'=>'form-horizontal'),

		)); ?>

			<div class="control-group">
				<?php echo $form->label($model,'phone',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($model,'phone',array('class'=>'m-wrap medium')); ?>
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
			
			<div class="control-group">
				<?php echo $form->label($model,'actionDateEnd',array('class'=>'control-label')); ?>
				<div class="controls">
					
					<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date date-picker">
						<?php echo $form->textField($model,'actionDateEnd',array('class'=>'m-wrap m-ctrl-medium date-picker', 'size' => 16, 'readonly' => 'readonly')); ?>	
						<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
					
					<div class="input-append bootstrap-timepicker-component">
						<?php echo $form->textField($model,'actionTimeEnd',array('class'=>'m-wrap m-ctrl-small timepicker-default', 'readonly' => 'readonly')); ?>
						<span class="add-on"><i class="icon-time"></i></span>
					</div>
					<span class="help-inline"><?php echo $form->error($model,'actionDateEnd'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'actionText',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($model,'actionText',array('class'=>'m-wrap large')); ?>
					<span class="help-inline"><?php echo $form->error($model,'actionText'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'aboutText',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textArea($model,'aboutText',array('class'=>'m-wrap span6', 'style' => 'height: 150px;')); ?>
					<span class="help-inline"><?php echo $form->error($model,'aboutText'); ?></span>
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
		$("#ContentForm_phone").inputmask("mask", {"mask": "9 (999) 999 99 99"});

		if (jQuery().datepicker) {
			$('#ContentForm_actionDateEnd').datepicker({
				rtl : App.isRTL(),
				format : 'dd.mm.yyyy'
			});
		}

		$('#ContentForm_actionTimeEnd').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
		});

	})
	
	function contentAfterValidate (form, data, hasError) {

		$('#'+form.context.id).find('.control-group.error').removeClass('error');
		
		if (hasError) {
			for (var key in data) {
				$('#'+form.context.id).find('#'+key).parent().parent().addClass('error');
			}
		}
	}

</script>