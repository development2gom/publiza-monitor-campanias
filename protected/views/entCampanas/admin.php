<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */

$this->breadcrumbs=array(
	'Ent Campanases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista campanas', 'url'=>array('index')),
	array('label'=>'Crear campanas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ent-campanas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="col-lg-12">
	<h1>Administrar Campanas</h1>
	
	
	
	<?php echo CHtml::link('B&uacute;squeda avanzada','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'ent-campanas-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				'txt_nombre',
			//'id_campana',
			//'id_cliente',
			array(
	            'name'=>'id_cliente',
				'filter' => CHtml::listData(EntClientes::model()->findAll(), 'id_cliente', 'txt_nombre'),
	            'value'=>'$data->idCliente->txt_nombre',
	            'type'=>'text',
	        ),
			//'id_estatus',
			array(
	            'name'=>'id_estatus',
				'filter' => CHtml::listData(CatEstatus::model()->findAll(), 'id_estatus', 'txt_nombre'),
	            'value'=>'$data->idEstatus->txt_nombre',
	            'type'=>'text',
	        ),
			
			'fch_inicio',
			'fch_fin',
			
			//'txt_url_master_graphic',
				array(
						'name'=>'txt_url_master_graphic',
						'type'=>'html',
						'value'=>'(!empty($data->txt_url_master_graphic))?CHtml::image( Yii::app()->request->baseUrl . "/images/campana_" . $data->id_campana . "/master/" . $data->txt_url_master_graphic,"",array("style"=>"width:125px")):"no image"'
				),
			'txt_notas',
			//'b_habilitado',
		
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>