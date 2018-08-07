<?php
/* @var $this EntClientesController */
/* @var $data EntClientes */
?>
<div class="col-lg-6">
<div class="view card_cliente">

<div class="client_logo">
		<?php 
			if(!empty($data->txt_url_logo)):
		?>
			<img src="<?php echo Yii::app()->request->baseUrl?>/images/clientes/<?php echo CHtml::encode($data->txt_url_logo); ?>" width="125px">
		<?php 
			else:
		?>
			<img src="<?php echo Yii::app()->request->baseUrl?>/images/ico/no_image.jpg" width="125px">
		<?php 
			endif;
		?>
	</div>
	
	<div class="client_data">
		
		<h4><?php echo CHtml::link(CHtml::encode($data->txt_nombre), array('update', 'id'=>$data->id_cliente)); ?></h4>
		
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_persona_contacto')); ?>:</b>
		<?php echo CHtml::encode($data->txt_persona_contacto); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_telefono')); ?>:</b>
		<?php echo CHtml::encode($data->txt_telefono); ?>
		<br />
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_mail')); ?>:</b>
		<?php echo CHtml::encode($data->txt_mail); ?>
	</div>
	
	

	


</div></div>