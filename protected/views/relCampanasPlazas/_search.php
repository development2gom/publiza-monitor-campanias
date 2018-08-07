<?php
/* @var $this RelCampanasPlazasController */
/* @var $model RelCampanasPlazas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rel'); ?>
		<?php echo $form->textField($model,'id_rel',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_campana'); ?>
		<?php echo $form->textField($model,'id_campana',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_plaza'); ?>
		<?php echo $form->textField($model,'id_plaza',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_inicio'); ?>
		<?php echo $form->textField($model,'fch_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_fin'); ?>
		<?php echo $form->textField($model,'fch_fin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->