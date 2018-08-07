<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */

$this->breadcrumbs=array(
	'Wrk Evidencias'=>array('index'),
	$model->id_evidencia,
);

$this->menu=array(
	array('label'=>'Lista evidencia', 'url'=>array('index')),
	array('label'=>'Crear evidencia', 'url'=>array('create')),
	array('label'=>'Actualizar evidencia', 'url'=>array('update', 'id'=>$model->id_evidencia)),
	array('label'=>'Borrar evidencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evidencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar evidencia', 'url'=>array('admin')),
);
?>

<h1>Ver evidencia <?php echo $model->txt_unidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_evidencia',
		'id_reporte',
		'txt_unidad',
		'txt_url_imagen',
		'fch_registro',
		//'b_liberado',
	),
)); ?>
