<?php
/* @var $this EntClientesController */
/* @var $model EntClientes */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ent-clientes-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Los datos con (<span class="required">*</span>) son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'txt_nombre'); ?>
				<?php echo $form->textField($model,'txt_nombre',array('size'=>50,'maxlength'=>50,"placeholder"=>"Sabritas","class"=>"form-control")); ?>
				<?php echo $form->error($model,'txt_nombre'); ?>
			</div>
		</div>
	
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'txt_persona_contacto'); ?>
				<?php echo $form->textField($model,'txt_persona_contacto',array('size'=>50,'maxlength'=>50,"placeholder"=>"Juan Vargaz","class"=>"form-control")); ?>
				<?php echo $form->error($model,'txt_persona_contacto'); ?>
			</div>
		</div>
		
	</div>
	
	
	<div class="row">	
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'txt_telefono'); ?>
				<?php echo $form->textField($model,'txt_telefono',array('size'=>50,'maxlength'=>50,"placeholder"=>"55-12-34-5678","class"=>"form-control")); ?>
				<?php echo $form->error($model,'txt_telefono'); ?>
			</div>
		</div>
	
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'txt_mail'); ?>
				<?php echo $form->textField($model,'txt_mail',array('size'=>50,'maxlength'=>50,"placeholder"=>"Juan Vargaz","class"=>"form-control")); ?>
				<?php echo $form->error($model,'txt_mail'); ?>
			</div>
		</div>
	</div>
	
	<div class="row">	
		<div class="col-lg-6">
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'image'); ?>
				<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50,"placeholder"=>"logo.png","class"=>"form-control")); ?>
				<?php echo $form->error($model,'image'); ?>
			</div>
		</div>
	
		<div class="col-lg-6">
			
		</div>
	</div>
 	

	<div class="row buttons">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
	</div>
	</div>
	</div>
<?php $this->endWidget(); ?>

