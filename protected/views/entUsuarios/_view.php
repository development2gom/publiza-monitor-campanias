<?php
/* @var $this EntUsuariosController */
/* @var $data EntUsuarios */
?>
<div class="col-lg-6">
	<div class="view">
	
		<div class="client_logo">
			<?php 
				if(!empty($data->idCliente->txt_url_logo)):
			?>
				<img src="<?php echo Yii::app()->request->baseUrl?>/images/clientes/<?php echo CHtml::encode($data->idCliente->txt_url_logo); ?>" width="125px">
			<?php 
				else:
			?>
				<img src="<?php echo Yii::app()->request->baseUrl?>/images/ico/no_image.jpg" width="125px">
			<?php 
				endif;
			?>
		</div>
	
		<div class="client_data">
		<h4><?php echo CHtml::link($data->idCliente != null?CHtml::encode($data->idCliente->txt_nombre): "Usuario interno", array('update', 'id'=>$data->id_usuario)); ?></h4>	
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_nombre')); ?>:</b>
		<?php echo CHtml::encode($data->txt_nombre); ?> <?php echo CHtml::encode($data->txt_apellido_paterno); ?> <?php echo CHtml::encode($data->txt_apellido_materno); ?>
		<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_nombre_usuario')); ?>:</b>
		<?php echo CHtml::encode($data->txt_nombre_usuario); ?>
		<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_contrasena')); ?>:</b>
		<?php echo CHtml::encode($data->txt_contrasena); ?>
		<br />
	
		 
		<b><?php echo CHtml::encode($data->getAttributeLabel('b_web')); ?>:</b>
		<?php echo CHtml::encode($data->b_web==1?"Web":"Movil"); ?>
		<br />
		</div>	
	</div>
</div>