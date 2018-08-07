<?php
/* @var $this WrkEvidenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wrk Evidencias',
);

$this->menu=array(
	array('label'=>'Crear evidencia', 'url'=>array('create')),
	array('label'=>'Administrar evidencia', 'url'=>array('admin')),
);
?>

<h1>Evidencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
