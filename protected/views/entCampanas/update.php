<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */

$this->breadcrumbs=array(
	'Ent Campanases'=>array('index'),
	$model->id_campana=>array('view','id'=>$model->id_campana),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista campanas', 'url'=>array('index')),
	array('label'=>'Crear campanas', 'url'=>array('create')),
	array('label'=>'Ver campanas', 'url'=>array('view', 'id'=>$model->id_campana)),
	array('label'=>'Administrar campanas', 'url'=>array('admin')),
);
?>

<h1>Actualizar campaña <?php echo $model->txt_nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
		'criteriaUsuario'=> $criteriaUsuario,
		'criteriaEstatus'=>$criteriaEstatus,
		'criteriaPlazas' => $criteriaPlazas
)); ?>