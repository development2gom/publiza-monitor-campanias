<?php
/* @var $this RelCampanasPlazasController */
/* @var $model RelCampanasPlazas */

$this->breadcrumbs=array(
	'Rel Campanas Plazases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelCampanasPlazas', 'url'=>array('index')),
	array('label'=>'Manage RelCampanasPlazas', 'url'=>array('admin')),
);
?>

<h1>Create RelCampanasPlazas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>