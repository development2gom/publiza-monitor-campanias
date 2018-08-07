<?php
/*@var $repo WrkReporte */ 
/*@var $ev WrkEvidencia */
?>


<div class="col-lg-12">

	<div class="header">
	<div class="profile">
		<img src="<?=Yii::app()->baseUrl?>/images/campana_<?=$campana->id_campana ?>/master/<?=$campana->txt_url_master_graphic ?>">
	</div>
	<div class="content">
		<h1>Reporte de Incidencias</h1>
		<h2>Cliente: <?=$campana->idCliente->txt_nombre ?></h2>
		<p>Campa&ntilde;a: <?=$campana->txt_nombre ?></p>
	</div>			
	
	</div>
	
	<?php foreach ($data as $repo):?>
		<div class="view">
			<div class="repo">
				Fecha de captura: <?=$repo->fch_creacion ?><br>
				Unidad: <?=$repo->txt_numero_unidad ?><br>
			</div>
			<div class="data">
				<?php foreach ($repo->wrkEvidencias as $ev):?>
					<div class="data_card">
					<div class="profile">
						<img src="<?= Yii::app()->baseUrl?>/images/evidencia/repo_<?=$repo->id_reporte?>/<?=$ev->txt_url_imagen ?>">
					</div>
					<div class="repo_data">
					<p class="date"><?=$ev->fch_registro ?></p>
					<!-- p class="unidad">Unidad: <?=$ev->txt_unidad ?></p-->
					</div>
				</div>		
				<?php endforeach;?>
			</div>	
			
			
		</div>
	<?php endforeach;?>

</div>