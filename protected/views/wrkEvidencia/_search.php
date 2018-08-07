<?php
/* @var $this WrkEvidenciaController */
/* @var $model WrkEvidencia */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'id_evidencia'); ?>
		<?php echo $form->textField($model,'id_evidencia',array('size'=>11,'maxlength'=>11,"placeholder"=>"1","class"=>"form-control")); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'id_reporte'); ?>
		<?php echo $form->textField($model,'id_reporte',array('size'=>11,'maxlength'=>11,"placeholder"=>"reporte","class"=>"form-control")); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'txt_unidad'); ?>
		<?php echo $form->textField($model,'txt_unidad',array('size'=>50,'maxlength'=>50,"placeholder"=>"Unidad 1","class"=>"form-control")); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'txt_url_imagen'); ?>
		<?php echo $form->textField($model,'txt_url_imagen',array('size'=>50,'maxlength'=>50,"placeholder"=>"a1.gif","class"=>"form-control")); ?>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'fch_registro'); ?>
		<?php echo $form->dateField($model,'fch_registro',array("class"=>"form-control")); ?>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->label($model,'b_liberado'); ?>
		<?php echo $form->textField($model,'b_liberado',array("placeholder"=>"0","class"=>"form-control")); ?>
	</div>
	</div>
	</div>
	<div class="row buttons">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo CHtml::submitButton('Buscar',array("class"=>"btn btn-primary")); ?>
	</div>
	</div>
	</div>
<?php $this->endWidget(); ?>

