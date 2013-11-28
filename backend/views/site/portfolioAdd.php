<?php
/* @var $this SiteController */

$this->title_h3='Портфолио';

$this->breadcrumbs=array(
	'Главная' => '/',
	'Портфолио' => '/site/portfolio/',
	'Добавить портфолио' 
);

Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.js'
	),
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.css'
	),
	'',
	CClientScript::POS_END
);

$url = Yii::app()->assetManager->publish(
	Yii::getPathOfAlias('common').'/data/portfolio/'
);

$this->menuActiveItems[EController::PORTFOLIO_MENU_ITEM] = 1;
?>

<div class="container">
	
	
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>$model->formId,
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'error',
				'afterValidate'=>'js:portfolioAfterValidate',
			),
			'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),

		)); ?>

			<div class="control-group">
				<?php echo $form->label($model,'name',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($model,'name',array('class'=>'m-wrap medium')); ?>
					<span class="help-inline"><?php echo $form->error($model,'name'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'text',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textArea($model,'text',array('class'=>'m-wrap span6', 'style' => 'height: 150px;')); ?>
					<span class="help-inline"><?php echo $form->error($model,'text'); ?></span>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'image',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php if (!empty($model->image)) {?>
						<?php echo CHtml::image($url.'/'.$model->image, '', array('width' => '200px', 'class' => 'pull-left'));?>
					<?php }?>
					<div data-provides="fileupload" class="fileupload fileupload-new pull-left">
						<span class="btn btn-file">
						<span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>
						<?php echo $form->FileField($model, 'image'); ?>
						</span>
						<span class="fileupload-preview"></span>
						<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#"></a>
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<?php echo $form->label($model,'visible',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->checkBox($model,'visible',array('class'=>'')); ?>
					<span class="help-inline"><?php echo $form->error($model,'visible'); ?></span>
				</div>
			</div>
			
			<div class="form-actions large">
				<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
				<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
			</div>
			
			<?php echo $form->hiddenField($model,'id'); ?>

		<?php $this->endWidget(); ?>
	
	
	
</div>

<script type="text/javascript">
	function portfolioAfterValidate (form, data, hasError) {
	
		$('#'+form.context.id).find('.control-group.error').removeClass('error');
		
		if (hasError) {
			for (var key in data) {
				$('#'+form.context.id).find('#'+key).parent().parent().addClass('error');
			}
			return false;
		}
		return true;
	}
</script>