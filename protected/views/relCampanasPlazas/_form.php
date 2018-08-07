<?php
/* @var $this RelCampanasPlazasController */
/* @var $model RelCampanasPlazas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rel-campanas-plazas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

 
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'fch_inicio'); ?>
		
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    		'model' => $model,
    		'attribute' => 'fch_inicio',
			'options' => array(
					'showAnim' => 'fold',
					'dateFormat'=>'yy-mm-dd',
			),
    		'htmlOptions' => array(
        		'size' => '10',         // textField size
        		'maxlength' => '10',    // textField maxlength
    			'class'=>'form-control',
    			'placeholder'=>'2015-09-25'
    			),
			));
		?>
		<?php echo $form->error($model,'fch_inicio'); ?>
	</div>
	</div>

	<div class="col-lg-6">
	<div class="form-group">
		

		<?php echo $form->labelEx($model,'fch_fin'); ?>
				<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    		'model' => $model,
		    		'attribute' => 'fch_fin',
					
					'options' => array(
						'showAnim' => 'fold',
						'dateFormat'=>'yy-mm-dd',
					),
		    		'htmlOptions' => array(
		        		'size' => '10',         // textField size
		        		'maxlength' => '10',    // textField maxlength
		    			'class'=>'form-control',
		    			'placeholder'=>'2015-09-25'
		    			),
					));
				?>
				<?php echo $form->error($model,'fch_fin'); ?>
		

	</div>
	</div>

	<div class="col-lg-6">
	<div class="form-group">
		<a class="btn btn-primary" onclick="submitForm()">Actualizar</a>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->