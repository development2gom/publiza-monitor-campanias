<?php
/* @var $this RelCampanasPlazasController */
/* @var $model RelCampanasPlazas */

$this->breadcrumbs=array(
	'Rel Campanas Plazases'=>array('index'),
	$model->id_rel,
);

$this->menu=array(
	array('label'=>'List RelCampanasPlazas', 'url'=>array('index')),
	array('label'=>'Create RelCampanasPlazas', 'url'=>array('create')),
	array('label'=>'Update RelCampanasPlazas', 'url'=>array('update', 'id'=>$model->id_rel)),
	array('label'=>'Delete RelCampanasPlazas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelCampanasPlazas', 'url'=>array('admin')),
);
?>

<h1>View RelCampanasPlazas #<?php echo $model->id_rel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rel',
		'id_campana',
		'id_plaza',
		'fch_inicio',
		'fch_fin',
	),
)); ?>
