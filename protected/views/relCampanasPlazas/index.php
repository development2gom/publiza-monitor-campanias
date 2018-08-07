<?php
/* @var $this RelCampanasPlazasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rel Campanas Plazases',
);

$this->menu=array(
	array('label'=>'Create RelCampanasPlazas', 'url'=>array('create')),
	array('label'=>'Manage RelCampanasPlazas', 'url'=>array('admin')),
);
?>

<h1>Rel Campanas Plazases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
