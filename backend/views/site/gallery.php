<?php
/* @var $this SiteController */

$this->title_h3='Галерея';

$this->breadcrumbs=array(
	'Галерея'
);

$this->menuActiveItems[EController::GALLERY_MENU_ITEM] = 1;

Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->assetManager->publish(
	Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/'
);

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/jquery.fancybox.pack.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.js'
	),
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/scripts/gallery.js'
	),
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/fancybox/source/jquery.fancybox.css'
	),
	'',
	CClientScript::POS_END
);
Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.css'
	),
	'',
	CClientScript::POS_END
);

?>

<div class="container">

	<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	

		<div data-provides="fileupload" class="fileupload fileupload-new pull-left">
			<span class="btn btn-file">
			<span class="fileupload-new">Select file</span>
			<span class="fileupload-exists">Change</span>
			<?php echo CHtml::activeFileField($galleryModel, 'image'); ?>
			</span>
			<span class="fileupload-preview"></span>
			<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#"></a>
		</div>
		
		<?php echo CHtml::htmlButton('<i class="icon-plus"></i> Добавить', array('class' => 'btn blue', 'type' => 'submit', 'style' => 'margin-left: 20px')); ?>
	<?php echo CHtml::endForm(); ?>

	<div class="row-fluid">
		<?php foreach ($images AS $image) { ?>
		<div class="span3">
			<div class="item">
				<a href="<?php echo $image;?>" title="Photo" data-rel="fancybox-button" class="fancybox-button">
					<div class="zoom">
						<?php echo CHtml::image($image);?>
						<div class="zoom-icon"></div>
					</div>
				</a>
				<div class="details">
					<a class="icon remove" href="#" rel="<?php echo $image;?>"><i class="icon-remove"></i></a>    
				</div>
			</div>
		</div>
		<?php }?>
	</div>
	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		Gallery.init();

		$(".details .remove").on("click", function() {
			if (confirm("Вы действительно хотите удалить это изображение?")) {
				var path = $(this).attr("rel").split("/");
				var name = path[path.length - 1];
				
				$.ajax({
					type: "POST",
					url : '/site/deleteGalleryImage/',
					data : {'name' : name},
					success : function(response) {
 						window.location.reload();
					}
				});
			}
		});
	})
</script>