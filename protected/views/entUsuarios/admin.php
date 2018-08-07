<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */

$this->breadcrumbs=array(
	'Ent Usuarioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuarios', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ent-usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="col-lg-12">
<h1>Administrar usuarios</h1>


<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ent-usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_usuario',
		array(
            'name'=>'id_cliente',
			'filter' => CHtml::listData(EntClientes::model()->findAll(), 'id_cliente', 'txt_nombre'),
            'value'=>'$data->idCliente==null?"Publiza":$data->idCliente->txt_nombre',
            'type'=>'text',
        ),
		'txt_nombre',
		'txt_apellido_paterno',
		//'txt_apellido_materno',
		'txt_nombre_usuario',
		
		'txt_contrasena',
		//'b_web',
			
			array(
					'name'=>'b_web',
					//'filter' => CHtml::listData(EntClientes::model()->findAll(), 'id_cliente', 'txt_nombre'),
					'value'=>'$data->b_web==1?"Web":"Movil"',
					'type'=>'text',
			),
		//'b_habilitado',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>