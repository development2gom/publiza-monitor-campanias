<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ent-usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los datos con (<span class="required">*</span>) son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'id_cliente'); ?>
		<?php echo $form->dropDownList($model,'id_cliente',$criteriaCliente, array("prompt"=>"Seleccione el cliente","class"=>"form-control")); ?>
		<?php echo $form->error($model,'id_cliente'); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'txt_nombre'); ?>
		<?php echo $form->textField($model,'txt_nombre',array('size'=>50,'maxlength'=>50,"placeholder"=>"Julio","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_nombre'); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'txt_apellido_paterno'); ?>
		<?php echo $form->textField($model,'txt_apellido_paterno',array('size'=>50,'maxlength'=>50,"placeholder"=>"Rivera","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_apellido_paterno'); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'txt_apellido_materno'); ?>
		<?php echo $form->textField($model,'txt_apellido_materno',array('size'=>50,'maxlength'=>50,"placeholder"=>"Rojas","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_apellido_materno'); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'txt_nombre_usuario'); ?>
		<?php echo $form->textField($model,'txt_nombre_usuario',array('size'=>50,'maxlength'=>50,"placeholder"=>"mike","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_nombre_usuario'); ?>
	</div>
	</div>
	
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'txt_contrasena'); ?>
		<?php echo $form->PasswordField($model,'txt_contrasena',array('size'=>50,'maxlength'=>50,"placeholder"=>"********","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_contrasena'); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'b_web'); ?>
		<?php echo $form->textField($model,'b_web',array("placeholder"=>"1","class"=>"form-control")); ?>
		<?php echo $form->error($model,'b_web'); ?>
	</div>
	</div>
	</div>
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'b_habilitado'); ?>
		<?php echo $form->textField($model,'b_habilitado'); ?>
		<?php echo $form->error($model,'b_habilitado'); ?>
	</div> -->

	<div class="row buttons">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
	</div>
	</div>
	</div>
<?php $this->endWidget(); ?>

