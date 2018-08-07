<?php
/* @var $this EntClientesController */
/* @var $model EntClientes */

$this->breadcrumbs=array(
	'Ent Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista clientes', 'url'=>array('index')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Crear cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>