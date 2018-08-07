<?php
/* @var $this WrkReporteController */
/* @var $data WrkReporte */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_reporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_reporte), array('view', 'id'=>$data->id_reporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente->txt_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_campana')); ?>:</b>
	<?php echo CHtml::encode($data->idCampana->txt_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_reporte')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoReporte->txt_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fch_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b_liberado')); ?>:</b>
	<?php echo CHtml::encode($data->b_liberado); ?>
	<br />


</div>