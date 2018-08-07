<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */

$this->breadcrumbs=array(
	'Ent Usuarioses'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'Lista usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuarios', 'url'=>array('create')),
	array('label'=>'Actualizar usuarios', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Borrar usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>
<div class="col-lg-6 col-lg-offset-3">
<h1>Ver usuario <?php echo $model->txt_nombre; ?></h1>
</div>
<div class="col-lg-6 col-lg-offset-3">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_usuario',
		'id_cliente',
		'txt_nombre',
		'txt_apellido_paterno',
		'txt_apellido_materno',
		'txt_nombre_usuario',
		'txt_contrasena',
		'b_web',
		//'b_habilitado',
	),
)); ?>
</div>