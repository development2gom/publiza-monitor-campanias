<?php
/* @var $this WrkEvidenciaController */
/* @var $data WrkEvidencia */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id_evidencia')); ?>:</b>
		   <?php echo CHtml::link(CHtml::encode($data->id_evidencia), array('view', 'id'=>$data->id_evidencia)); ?>
 	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_reporte')); ?>:</b>
	<?php echo CHtml::encode($data->idReporte->idTipoReporte->txt_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('txt_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->txt_unidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('txt_url_imagen')); ?>:</b>
	<?php echo CHtml::encode($data->txt_url_imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fch_registro); ?>
	<br />

	<!--<b><?php //echo CHtml::encode($data->getAttributeLabel('b_liberado')); ?>:</b>
		   <?php //echo CHtml::encode($data->b_liberado); ?>
 	<br /> -->


</div>