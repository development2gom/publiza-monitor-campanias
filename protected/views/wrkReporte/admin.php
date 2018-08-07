<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */

$this->breadcrumbs=array(
	'Wrk Reportes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista reporte', 'url'=>array('index')),
	array('label'=>'Crear reporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#wrk-reporte-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar reportes</h1>

<!-- <p> -->
<!-- You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> -->
<!-- or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done. -->
<!-- </p> -->

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'wrk-reporte-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_reporte',
		array(
            'name'=>'id_cliente',
			'filter' => CHtml::listData(EntClientes::model()->findAll(), 'id_cliente', 'txt_nombre'),
            'value'=>'$data->idCliente->txt_nombre',
            'type'=>'text',
        ),
		array(
            'name'=>'id_campana',
			'filter' => CHtml::listData(EntCampanas::model()->findAll(), 'id_campana', 'txt_nombre'),
            'value'=>'$data->idCampana->txt_nombre',
            'type'=>'text',
        ),
			array(
            'name'=>'id_tipo_reporte',
			'filter' => CHtml::listData(CatTiposReportes::model()->findAll(), 'id_tipo_reporte', 'txt_nombre'),
            'value'=>'$data->idTipoReporte->txt_nombre',
            'type'=>'text',
        ),
		'fch_creacion',
		'b_liberado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
