<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */

$this->breadcrumbs=array(
	'Ent Campanases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Campanas', 'url'=>array('index')),
	array('label'=>'Administrar Campanas', 'url'=>array('admin')),
);
?>

<div class="col-lg-12">
	<h1>Crear campaña</h1>
	
	<?php $this->renderPartial('_form', 
			array(
			'model'=>$model,
			'criteriaUsuario'=> $criteriaUsuario,
			'criteriaEstatus'=>$criteriaEstatus,
			'criteriaPlazas' => $criteriaPlazas
	)); ?>

</div>