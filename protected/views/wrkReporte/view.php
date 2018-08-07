<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */

$this->breadcrumbs=array(
	'Wrk Reportes'=>array('index'),
	$model->id_reporte,
);

$this->menu=array(
	array('label'=>'Lista reporte', 'url'=>array('index')),
	array('label'=>'Crear reporte', 'url'=>array('create')),
	array('label'=>'Actualizar reporte', 'url'=>array('update', 'id'=>$model->id_reporte)),
	array('label'=>'Borrar reporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reporte),'confirm'=>'Estas seguro de borrar este registro?')),
	array('label'=>'Administrar reporte', 'url'=>array('admin')),
);
?>

<h1>Ver Reporte <?php echo $model->id_cliente; ?></h1>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_reporte',
		'idCliente.txt_nombre',
		'idCampana.txt_nombre',
		'idTipoReporte.txt_nombre',
		'fch_creacion',
		'b_liberado',
	),
)); ?>
</div>

<h3>Evidencia</h3>
<p class="btn btn-primary" onclick="agregarEvidenciaForm()">Agregar evidencia</p>

<div id="evidencia_form" style="display: none" class="popup_form"></div>

<?php foreach ($model->wrkEvidencias AS $evidencia): ?>
<div class="view">
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$evidencia,
		'attributes'=>array(
			//'id_evidencia',
			//'id_reporte',
			'txt_unidad',
			'txt_url_imagen',
			'fch_registro',
			//'b_liberado',
		),
	)); ?>
</div>
<?php endforeach;?>


<script>

	function agregarEvidenciaForm(){
		target = $("#evidencia_form");
		target.load("<?=Yii::app()->baseUrl ?>/wrkEvidencia/create", function(){target.slideToggle()});
		
	}
</script>