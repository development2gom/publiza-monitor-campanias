<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */

$this->breadcrumbs=array(
	'Wrk Evidencias'=>array('index'),
	$model->id_evidencia=>array('view','id'=>$model->id_evidencia),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista evidencia', 'url'=>array('index')),
	array('label'=>'Crear evidencia', 'url'=>array('create')),
	array('label'=>'Ver evidencia', 'url'=>array('view', 'id'=>$model->id_evidencia)),
	array('label'=>'Administrar evidencia', 'url'=>array('admin')),
);
?>

<h1>Actualizar evidencia <?php echo $model->txt_unidad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaReporte'=>$criteriaReporte
)); ?>