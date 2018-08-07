<?php
/* @var $this EntCampanasController */
/* @var $data EntCampanas */

/* Templete para Cada tarjeta de campañas */

?>
<div class="item">
<div class="card_campana">

	
	<div class="client_logo">
		<?php 
			if(!empty($data->txt_url_master_graphic)):
		?>
			<div style="background:url('<?= Yii::app()->request->baseUrl . "/images/campana_" . $data->id_campana . "/master/" . $data->txt_url_master_graphic ?>');background-position: center;
background-size: cover;">
				
			</div>
		<?php 
			else:
		?>
			<img src="<?php echo Yii::app()->request->baseUrl?>/images/ico/no_image.jpg">
		<?php 
			endif;
		?>
		
		
		
	</div>
	<div class="client_data">
		<h4>
			<?= Chtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/ico/pencil.png" width="20px">', array('update','id'=>$data->id_campana)) ?>
			
			<?php echo CHtml::link(CHtml::encode($data->txt_nombre), array('view', 'id'=>$data->id_campana)); ?>
			
		</h4>
	
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
		<?php echo CHtml::encode($data->idCliente->txt_nombre); ?>
		<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus')); ?>:</b>
		<?php echo CHtml::encode($data->idEstatus->txt_nombre); ?>
		<br />
	
		
	
		<b>Periodo:</b>
			<?php echo CHtml::encode(date_format(date_create($data->fch_inicio) , 'd M y')); ?> al 
			<?php echo CHtml::encode(date_format(date_create($data->fch_fin) , 'd M y')); ?>
		<br />
		
		<b>Plazas:</b><br>
		<ul>
		<?php foreach ($data->relCampanasPlazases as $plaza):?>
				<li>
					<span class="plaza_name"><?= $plaza->idPlaza->txt_nombre?></span>
					<span class="date_sm"><?= date_format(date_create($plaza->fch_inicio) , 'd M y') ?></span> 
					-
					 <span class="date_sm"><?= date_format(date_create($plaza->fch_fin) , 'd M y')?></span> 
					 
					 <span class="date_sm">
					 	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico/pencil.png" width="12px" onClick="showForm('Actualizar fechas', <?php echo $plaza->id_rel?>)">
					 </span>	
				 </li> 
			<?php endforeach; ?>
		</ul>
		<b><?php echo CHtml::encode($data->getAttributeLabel('txt_notas')); ?>:</b>
		<?php echo CHtml::encode($data->txt_notas); ?>
		<br />
	</div>
	

</div></div>


