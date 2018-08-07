<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_campana'); ?>
		<?php echo $form->textField($model,'id_campana',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cliente'); ?>
		<?php echo $form->textField($model,'id_cliente',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estatus'); ?>
		<?php echo $form->textField($model,'id_estatus',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_nombre'); ?>
		<?php echo $form->textField($model,'txt_nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_inicio'); ?>
		<?php echo $form->textField($model,'fch_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_fin'); ?>
		<?php echo $form->textField($model,'fch_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_url_master_graphic'); ?>
		<?php echo $form->textField($model,'txt_url_master_graphic',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'txt_notas'); ?>
		<?php echo $form->textField($model,'txt_notas',array('size'=>60,'maxlength'=>250)); ?>
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