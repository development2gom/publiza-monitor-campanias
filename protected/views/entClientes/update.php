<?php
/* @var $this EntClientesController */
/* @var $model EntClientes */

$this->breadcrumbs=array(
	'Ent Clientes'=>array('index'),
	$model->id_cliente=>array('view','id'=>$model->id_cliente),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista clientes', 'url'=>array('index')),
	array('label'=>'Crear clientes', 'url'=>array('create')),
	array('label'=>'Ver clientes', 'url'=>array('view', 'id'=>$model->id_cliente)),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar clientes <?php echo $model->txt_nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>