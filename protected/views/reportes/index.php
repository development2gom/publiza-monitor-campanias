<?php 
/*@var $camp EntCampanas */
/*@var $prod EntProductos */
/*@var $cliente EntClientes */
?>

<div class="col-lg-12">

<div class="header">
	<h1>Campañas de <?=$cliente->txt_nombre ?></h1>
</div>

<?php foreach($camapanasList As $camp): ?>
	
	<div class="card">
		<div class="profile">
			<img src="<?=Yii::app()->baseUrl?>/images/campana_<?=$camp->id_campana ?>/master/<?=$camp->txt_url_master_graphic ?>">
		</div>
		<div class="content">
			<p class="title"><?=$camp->txt_nombre ?></p>
			<p><?=$camp->fch_inicio ?> - <?=$camp->fch_fin ?></p>
			<p><?=$camp->txt_notas ?></p>
			
			
			
			<h4>Productos en la campa&ntilde;a:</h4>
			<ul class="list-unstyled">
				<?php foreach ($camp->entProductoses AS $rel): ?>
					<li><?=$rel->num_cantidad ?> - <?=$rel->idProducto->txt_nombre ?></li>
				<?php endforeach;?>
			</ul>
			
			
			<hr>
			<?=CHtml::link('Reporte Instalaci&oacute;n',array('reportes/instalacion/idc/'. $camp->id_campana)) ?><br>
			<?=CHtml::link('Reporte Incidencias',array('reportes/incidencias/idc/'. $camp->id_campana)) ?><br>
			<?=CHtml::link('Reporte Periodico',array('reportes/periodico/idc/'. $camp->id_campana)) ?>
		</div>	
	</div>
<?php endforeach;?>
</div>