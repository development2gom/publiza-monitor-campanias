<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */

$this->breadcrumbs=array(
	'Wrk Reportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista reporte', 'url'=>array('index')),
	array('label'=>'Administrar reporte', 'url'=>array('admin')),
);
?>

<h1>Crear Reporte</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaCliente'=>$criteriaCliente,
		'criteriaCampana'=>$criteriaCampana,
		'criteriaTipoReporte'=>$criteriaTipoReporte,
		'criteriaPlaza' => $criteriaPlaza,
)); ?>