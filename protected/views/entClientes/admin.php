<?php
/* @var $this EntClientesController */
/* @var $model EntClientes */

$this->breadcrumbs=array(
	'Ent Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista clientes', 'url'=>array('index')),
	array('label'=>'Crear clientes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ent-clientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="col-lg-12">
<h1>Administrar clientes</h1>
<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ent-clientes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
		'cssFile' => false,
	'columns'=>array(
		'id_cliente',
		'txt_nombre',
		array(
			'name'=>'txt_url_logo',
			'type'=>'html',
			'value'=>'(!empty($data->txt_url_logo))?CHtml::image( Yii::app()->request->baseUrl . "/images/clientes/" . $data->txt_url_logo,"",array("style"=>"width:125px")):"no image"'
		),	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>
