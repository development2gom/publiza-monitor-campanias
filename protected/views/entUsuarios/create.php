<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */

$this->breadcrumbs=array(
	'Ent Usuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista usuarios', 'url'=>array('index')),
);
?>

<h1>Crear usuarios</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaCliente'=> $criteriaCliente
)); ?>