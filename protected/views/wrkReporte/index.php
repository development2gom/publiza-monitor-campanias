<?php
/* @var $this WrkReporteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wrk Reportes',
);

$this->menu=array(
	array('label'=>'Crear Reporte', 'url'=>array('create')),
	array('label'=>'Administrar Reporte', 'url'=>array('admin')),
);
?>

<h1>Reportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
