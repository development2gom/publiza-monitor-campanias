<?php
/* @var $this EntClientesController */
/* @var $model EntClientes */

$this->breadcrumbs=array(
	'Ent Clientes'=>array('index'),
	$model->id_cliente,
);

$this->menu=array(
	array('label'=>'Lista clientes', 'url'=>array('index')),
	array('label'=>'Crear clientes', 'url'=>array('create')),
	array('label'=>'Actualizar clientes', 'url'=>array('update', 'id'=>$model->id_cliente)),
	array('label'=>'Borrar clientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'¿estas seguro de borrar este dato?')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>


<div class="col-lg-10 col-lg-offset-2">
<h1>Ver cliente <?php echo $model->txt_nombre; ?></h1>
</div>
<div class="col-lg-6 col-lg-offset-3">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id_cliente',
		'txt_nombre',
		'txt_persona_contacto',
		'txt_telefono',
		'txt_mail',	
		array(
			'name'=>'txt_url_logo',
			'type'=>'html',
			'value'=>(!empty($model->txt_url_logo))?CHtml::image( Yii::app()->request->baseUrl . "/images/clientes/" . $model->txt_url_logo,"",array("style"=>"width:125px;")):"no image",
		),
		//'b_habilitado',
	),
)); ?></div>
