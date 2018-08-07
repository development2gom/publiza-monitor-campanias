<?php
/* @var $this EntUsuariosController */
/* @var $model EntUsuarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cliente'); ?>
		<?php echo $form->textField($model,'id_cliente',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_nombre'); ?>
		<?php echo $form->textField($model,'txt_nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_apellido_paterno'); ?>
		<?php echo $form->textField($model,'txt_apellido_paterno',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_apellido_materno'); ?>
		<?php echo $form->textField($model,'txt_apellido_materno',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_nombre_usuario'); ?>
		<?php echo $form->textField($model,'txt_nombre_usuario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_contrasena'); ?>
		<?php echo $form->textField($model,'txt_contrasena',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_web'); ?>
		<?php echo $form->textField($model,'b_web'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_habilitado'); ?>
		<?php echo $form->textField($model,'b_habilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->