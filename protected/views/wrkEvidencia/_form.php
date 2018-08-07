<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wrk-evidencia-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Los datos con (<span class="required">*</span>) son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array("placeholder"=>"evidenia.jpg","class"=>"form-control")); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'fch_registro'); ?>
		
		<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    		'model' => $model,
		    		'attribute' => 'fch_registro',
		    		'htmlOptions' => array(
		        		'size' => '10',         // textField size
		        		'maxlength' => '10',    // textField maxlength
		    			'class'=>'form-control',
		    			'placeholder'=>'2015-09-25'
		    			),
					));
				?>
		
		<?php echo $form->error($model,'fch_registro'); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'num_lat'); ?>
		<?php echo $form->numberField($model,'num_lat',array('size'=>50,'maxlength'=>50,"placeholder"=>"99.87","class"=>"form-control")); ?>
		<?php echo $form->error($model,'num_lat'); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'num_lon'); ?>
		<?php echo $form->numberField($model,'num_lon',array("placeholder"=>"-19.87","class"=>"form-control")); ?>
		<?php echo $form->error($model,'num_lon'); ?>
	</div>
	</div>
	</div>
	
	
	<div class="row buttons">
	<div class="col-lg-6">
	<div class="form-group">
		<p onclick="agregarEvidenciaForm()" class="btn btn-primary" >crear</p>
	</div>
	</div>
	</div>
<?php $this->endWidget(); ?>

	
</div><!-- form -->


<script>

function agregarEvidenciaForm(){	
	target = $("#evidencia_form_<?=$model->id_reporte ?>");
	forma = $('#wrk-evidencia-form');
	action = forma.attr('action');
	//data = forma.serialize();
	var data = new FormData(forma[0]);
	
	 // Create a formdata object and add the files
   
	
	$.ajax({
		url: action,
		type: 'POST',
		data:data,
		cache: false,
        contentType: false,
        processData: false,
		beforeSend: function()  {
			//$("#avance").html("Enviando");
		    },
		uploadProgress: function(event, position, total, percentComplete) 
	    {
	        //$("#avance").html(position);
	 
	    },
		success: function (res){
			
			if(res.length==0){
				location.reload();
			}else{
				target.html(res);
			}

			},
		error: function (a, res, b){}
		} );
}
</script>