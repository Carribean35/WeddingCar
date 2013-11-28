<?php
/* @var $this SiteController */

$this->title_h3='Портфолио';

$this->breadcrumbs=array(
	'Главная' => '/',
	'Портфолио'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" data-toggle="modal" href="/site/portfolioAdd/"><i class="icon-plus"></i>Добавить портфолио</a>
							</li>';

$this->menuActiveItems[EController::PORTFOLIO_MENU_ITEM] = 1;
?>

<div class="container">

<div class="tabbable tabbable-custom tabbable-full-width">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'portfolio-grid',
		'dataProvider'=>$dataProvider,
		'filter'=>null,
		'enableSorting'=>false,
		'htmlOptions'=>array('class'=>'portlet-body'),
		'itemsCssClass'=>'table table-striped table-hover',
		'summaryText'=>'',
		'loadingCssClass'=>'',
		'columns'=>array(
			array(
				'header'=>'Id',
				'name'=>'id',
			),
			array(
				'header'=>'Имя',
				'name'=>'name',
			),
			array(
				'header'=>'Видимость',
				'name'=>'visible',
				'type'=>'html',
				'value'=>function($data) {
					if ($data['visible'] == 0)
						return CHtml::openTag('span', array('class'=>'label label-important')).'скрытый'.CHtml::closeTag('span');
					else
						return CHtml::openTag('span', array('class'=>'label label-success')).'видимый'.CHtml::closeTag('span');
				}
				
			),
			array(
				'header'=>'Действия',
				'class'=>'CButtonColumn',
				'buttons'=>array(
					'view'=>array(
						'label'=>'Посмотреть',
						'imageUrl'=>false,
						'options'=>array('class'=>'btn mini blue-stripe'),
						'url'=>'"/site/portfolioAdd/".$data[\'id\']."/"',
					),
					'add'=>array(
						'label'=>'Удалить',
						'imageUrl'=>false,
						'options'=>array('class'=>'btn mini black-stripe'),
						'click'=>'confirmDel',
						'url'=>'"/site/portfolioDel/".$data[\'id\']."/"',
					),
				),
				'template'=>'{view} {add}',
			),
		),
	)); ?>
</div>


	
</div>

<script type="text/javascript">
	function confirmDel() {
		if (confirm("Вы действительно хотите удалить это портфолио?"))
			return true;
		return false;
	}
</script>