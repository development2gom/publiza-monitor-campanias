<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */
/* @var $form CActiveForm */
?>


<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'wrk-reporte-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false 
) );
?>

<p class="note">
	Los datos con (<span class="required">*</span>) son requeridos.
</p>

<?php echo $form->errorSummary($model); ?>
<!-- 				'criteriaCliente'=>$criteriaCliente, -->
<!-- 				'$criteriaCampana'=>$criteriaCampana, -->
<!-- 				'criteriaTipoReporte'=>$criteriaTipoReporte -->




<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'id_tipo_reporte'); ?>
			<?php echo $form->dropDownList($model,'id_tipo_reporte',$criteriaTipoReporte, array("prompt"=>"Seleccione el tipo de reporte","class"=>"form-control")); ?>
			<?php echo $form->error($model,'id_tipo_reporte'); ?>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'fch_creacion'); ?>
			<?php echo $form->dateField($model,'fch_creacion',array('class'=>"form-control"))?>
			<?php echo $form->error($model,'fch_creacion'); ?>
		</div>
	</div>
</div>
<div class="row">
	
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'txt_numero_unidad'); ?>
			<?php echo $form->textField($model,'txt_numero_unidad',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'txt_numero_unidad'); ?>
		</div>
	</div>
	
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'txt_eco_placa'); ?>
			<?php echo $form->textField($model,'txt_eco_placa',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'txt_eco_placa'); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'txt_codigo_ruta'); ?>
			<?php echo $form->textField($model,'txt_codigo_ruta',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'txt_codigo_ruta'); ?>
		</div>
	</div>
	
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'id_plaza'); ?><br>
			<?php echo $form->dropDownList($model,'id_plaza',$criteriaPlaza, array("prompt"=>"Seleccione la plaza","class"=>"form-control")); ?>
			<?php echo $form->error($model,'id_plaza'); ?>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'b_liberado'); ?><br>
			<?php echo $form->radioButtonList($model,'b_liberado',array("1"=>"Si","0"=>"no")); ?>
			<?php echo $form->error($model,'b_liberado'); ?>
		</div>
	</div>
	
	<div class="col-lg-6">
		
	</div>
</div>

<div class="row buttons">
	<div class="col-lg-6">
		<div class="form-group">
			<p class="btn btn-primary" onclick="createReporte()">Crear rerpote</p>
	</div>
	</div>
</div>
<?php $this->endWidget(); ?>

<script>
	function createReporte(){
			forma = $("#wrk-reporte-form");
			action = forma.attr('action');
			data = forma.serialize();
			target = $("#addReporte");
			$.ajax({
				url: action,
				type:'POST',
				data:data,
				success:function(res){
						if(res.length != 0){
								target.html(res);	
							}else{
								location.reload();
							}
					},
				error:function(a, res , b){}
				});
		}

</script>