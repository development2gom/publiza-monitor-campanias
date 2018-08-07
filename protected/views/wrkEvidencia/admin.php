<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */

$this->breadcrumbs=array(
	'Wrk Evidencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista evidencia', 'url'=>array('index')),
	array('label'=>'Crear evidencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#wrk-evidencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar evidencias</h1>

<!-- <p> -->
<!-- You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> -->
<!-- or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done. -->
<!-- </p> -->

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array("class"=>"search-button")); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'wrk-evidencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evidencia',
		array(
            'name'=>'id_reporte',
			'filter' => CHtml::listData(WrkReporte::model()->findAll(), 'id_tipo_reporte', 'txt_nombre'),
            'value'=>'$data->idReporte->idTipoReporte->txt_nombre',
            'type'=>'text',
        ),
		'txt_unidad',
		'txt_url_imagen',
		'fch_registro',
		'b_liberado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
