<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */

$this->breadcrumbs=array(
	'Wrk Evidencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista evidencia', 'url'=>array('index')),
	array('label'=>'Administrar evidencia', 'url'=>array('admin')),
);
?>

<h1>Crear evidencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>