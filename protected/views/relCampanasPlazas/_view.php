<?php
/* @var $this RelCampanasPlazasController */
/* @var $data RelCampanasPlazas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rel), array('view', 'id'=>$data->id_rel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_campana')); ?>:</b>
	<?php echo CHtml::encode($data->id_campana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_plaza')); ?>:</b>
	<?php echo CHtml::encode($data->id_plaza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fch_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fch_fin); ?>
	<br />


</div>