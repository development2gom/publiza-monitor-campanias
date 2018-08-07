<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */

$this->breadcrumbs=array(
	'Wrk Reportes'=>array('index'),
	$model->id_reporte=>array('view','id'=>$model->id_reporte),
	'Update',
);

$this->menu=array(
	array('label'=>'List WrkReporte', 'url'=>array('index')),
	array('label'=>'Create WrkReporte', 'url'=>array('create')),
	array('label'=>'View WrkReporte', 'url'=>array('view', 'id'=>$model->id_reporte)),
	array('label'=>'Manage WrkReporte', 'url'=>array('admin')),
);
?>

<h1>Actualizar Reporte <?php echo $model->id_reporte; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaCliente'=>$criteriaCliente,
		'criteriaCampana'=>$criteriaCampana,
		'criteriaTipoReporte'=>$criteriaTipoReporte
)); ?>