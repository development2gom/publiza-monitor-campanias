<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */

$this->breadcrumbs=array(
	'Ent Usuarioses'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuarios', 'url'=>array('create')),
);
?>

<h1>Actualizar usuario <?php echo $model->txt_nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaCliente'=> $criteriaCliente
)); ?>