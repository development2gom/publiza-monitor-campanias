<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ent-campanas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Los datos don (<span class="required">*</span>) son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'id_cliente'); ?>
		<?php echo $form->dropDownList($model,'id_cliente',$criteriaUsuario, array("prompt"=>"Seleccione el usuario","class"=>"form-control")); ?>
		<?php echo $form->error($model,'id_cliente'); ?>
 	</div>
 	</div>
	
	<div class="col-lg-6">
	<div class="form-group">
		
		<?php echo $form->labelEx($model,'txt_nombre'); ?>
		<?php echo $form->textField($model,'txt_nombre',array('size'=>50,'maxlength'=>50,"placeholder"=>"Nombre de campaña","class"=>"form-control")); ?>
		<?php echo $form->error($model,'txt_nombre'); ?>
	
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-4">
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
	
	<div class="col-lg-4">
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
	
	<div class="col-lg-4">
	<div class="form-group">
		
				<?php echo $form->labelEx($model,'num_duracion'); ?><br>
				<?php echo $form->dropDownList($model,'num_duracion',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'), array('prompt'=>'Duracion en meses',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'num_duracion'); ?>
	
	
	</div>
	</div>
	
	
	
	</div>
	
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				
				<?php echo $form->labelEx($model,'image'); ?>
				<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50,"placeholder"=>"master.png","class"=>"form-control")); ?>
				<?php echo $form->error($model,'image'); ?>
		
				
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				
				
				
				<?php echo $form->labelEx($model,'id_estatus'); ?>
				<?php echo $form->dropDownList($model,'id_estatus',$criteriaEstatus,array("prompt"=>"Seleccione el estatus","class"=>"form-control")); ?>
				<?php echo $form->error($model,'id_estatus'); ?>
				
			</div>
		</div>
	</div>

 	
 	

	<div class="row">
		<div class="col-lg-2">
			<div class="form-group">
			
				<label for="" class="required">Plazas <span class="required">*</span></label><br>
			
				<?php echo $criteriaPlazas?>
				<?php echo $form->error($model,'rel_plazas'); ?>
			</div>
		</div>
		
		<div class="col-lg-10">
			<div class="form-group">
				
				<?php echo $form->labelEx($model,'txt_notas'); ?>
				<?php echo $form->textArea($model,'txt_notas',array('size'=>60,'maxlength'=>250,"placeholder"=>"notas","class"=>"form-control", "rows"=>5)); ?>
				<?php echo $form->error($model,'txt_notas'); ?>
				
		 	</div>
	 	</div>
 	</div>





	<div class="row buttons">
	<div class="col-lg-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Campaña' : 'Guardar Cambios',array("class"=>"btn btn-primary")); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

