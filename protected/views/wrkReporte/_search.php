<?php
/* @var $this WrkReporteController */
/* @var $model WrkReporte */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_reporte'); ?>
		<?php echo $form->textField($model,'id_reporte',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cliente'); ?>
		<?php echo $form->textField($model,'id_cliente',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_campana'); ?>
		<?php echo $form->textField($model,'id_campana',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_reporte'); ?>
		<?php echo $form->textField($model,'id_tipo_reporte',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_creacion'); ?>
		<?php echo $form->textField($model,'fch_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_liberado'); ?>
		<?php echo $form->textField($model,'b_liberado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->