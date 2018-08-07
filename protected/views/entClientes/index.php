<?php
/* @var $this EntClientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ent Clientes',
);

$this->menu=array(
	array('label'=>'Crear clientes', 'url'=>array('create')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
