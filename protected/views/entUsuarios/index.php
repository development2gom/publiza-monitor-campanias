<?php
/* @var $this EntUsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ent Usuarioses',
);

$this->menu=array(
	array('label'=>'Crear usuarios', 'url'=>array('create')),
);
?>

<div class="col-lg-12">
<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>
<br>
<div class="col-lg-12">
<h1>Empleados (Publiza)</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProviderEmpleados,
	'itemView'=>'_view',
)); ?>

</div>
