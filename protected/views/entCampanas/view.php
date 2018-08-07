<?php
/* @var $this EntCampanasController */
/* @var $model EntCampanas */

$this->breadcrumbs=array(
	'Ent Campanases'=>array('index'),
	$model->id_campana,
);

$this->menu=array(
	array('label'=>'Lista campanas', 'url'=>array('index')),
	array('label'=>'Crear campanas', 'url'=>array('create')),
	array('label'=>'Actualizar campanas', 'url'=>array('update', 'id'=>$model->id_campana)),
	array('label'=>'Borrar campanas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_campana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar campanas', 'url'=>array('admin')),
);
?> 	

<div class="col-lg-12">
	<div class="header">
		<div class="profile">
			<?php 
				if(!empty($model->txt_url_master_graphic)):
			?>
			<img src="<?=Yii::app()->baseUrl?>/images/campana_<?=$model->id_campana ?>/master/<?=$model->txt_url_master_graphic ?>">
			<?php 
			else:	
			?>
			<img src="<?=Yii::app()->baseUrl?>/images/ico/no_image.jpg">
			<?php 
				endif;
			?>
		</div>
		
		<div class="content">
			<h1>Campaña <?=$model->txt_nombre ?></h1>
			<?php echo '<b>Cliente:</b> '.$model->idCliente->txt_nombre ?>
			<?php echo '<br><b>Estatus:</b> '.$model->idEstatus->txt_nombre ?>
			<?php echo '<br><b>Nombre:</b> '.$model->txt_nombre ?>
			<?php echo '<br><b>Periodo:</b> '.$model->fch_inicio ?> - <?php echo $model->fch_fin ?>
			<?php echo '<br><b>Duración:</b> '.$model->num_duracion ?> meses
			<?php echo '<br><b>Plazas:</b> ' ?>
			<?php foreach ($model->relCampanasPlazases as $plaza):?>
				<?= $plaza->idPlaza->txt_nombre?> - 
			<?php endforeach; ?>
			<?php echo '<br><b>Notas:</b> '.$model->txt_notas ?>
			
			
		</div>
		
		<div class="content">
			<p class="btn btn-primary" style="width:180px; margin-bottom:2px;" onclick="addReporte(<?=$model->id_cliente ?>,<?=$model->id_campana ?>)">Agregar reporte</p><br>
			<p class="btn btn-primary" style="width:180px; margin-bottom:2px;" onclick="agregarPPT(<?=$model->id_campana ?>,'ppt')">Agregar ppt</p>
			<?php 
				if(!empty( $model->txt_url_ppt )){
					echo CHtml::link('Descargar', Yii::app()->request->baseUrl . '/images/campana_' . $model->id_campana . '/' . $model->txt_url_ppt,array('target'=>'_blank'));
				}
			
			?>
			<br>
			<p class="btn btn-primary" style="width:180px; margin-bottom:2px;" onclick="agregarPPT(<?=$model->id_campana ?>,'img')">Agregar Imágen</p>
			<?php 
				if(!empty( $model->txt_url_image )){
					echo CHtml::link('Descargar', Yii::app()->request->baseUrl . '/images/campana_' . $model->id_campana . '/' . $model->txt_url_image,array('target'=>'_blank'));
				}
			
			?>
			<br>
			<p class="btn btn-primary" style="width:180px; margin-bottom:2px;" onclick="agregarPPT(<?=$model->id_campana ?>,'xls')">Agregar Excel</p>
			<?php 
				if(!empty( $model->txt_url_xls )){
					echo CHtml::link('Descargar', Yii::app()->request->baseUrl . '/images/campana_' . $model->id_campana . '/' . $model->txt_url_xls,array('target'=>'_blank'));
				}
			
			?>
			<br>
			<p class="btn btn-primary" style="width:180px; margin-bottom:2px;" onclick="deshabilitarCampana(<?=$model->id_campana ?>)">Vencer campaña</p>
			<br>
			
		</div>
		<div class="content">
			<form>
				<p>Filtrar por plaza</p>
				<?php echo CHtml::dropDownList('idp', $idp ,$plazas, array("prompt"=>"Todas","class"=>"form-control")); ?>
				<br>
				<p>Filtrar por estatus</p>
				<?php echo CHtml::dropDownList('idt', $idt ,$estado, array("prompt"=>"Todas","class"=>"form-control")); ?>
				<br>
				<input type="submit" class="btn btn-primary" value="filtrar">
			</form>
		</div>
	</div>
	
	<div id="addReporte" style="display: none" class="popup_form">
		<img  src="<?php echo Yii::app()->request->baseUrl?>/images/ico/hex-loader2.gif" width="100px" >
		<span>Cargando formulario espere por favor ...</span>
	</div>
		
	<!--         -----------------------------------------------------------------------------------------------<br>			 -->
			
<?php foreach($model->wrkReportes As $repo): ?>
	<div class="view">		
		<div class="repo_data">
			<h3>Reporte</h3>
			<?php echo 'Tipo de reporte: '.$repo->idTipoReporte->txt_nombre ?>
			<?php echo '<br>Fecha de creaci&oacuten: '.$repo->fch_creacion ?>
			<br>
			<?php echo 'Plaza: '.$repo->idPlaza->txt_nombre ?>
			<br>
			<span class="" onclick="editarNumeroReporte(<?=$repo->id_reporte ?>)"><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/ico/pencil.png','Editar',array('style'=>'width:20px') )?></span>
			<?php echo 'N&uacute;mero de unidad: '.$repo->txt_numero_unidad ?>
			<br>

			<span class="" onclick="editarNumeroPlaca(<?=$repo->id_reporte ?>)"><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/ico/pencil.png','Editar',array('style'=>'width:20px') )?></span>
			<?php echo 'Eco/Placa: '.$repo->txt_eco_placa ?>

			<br>
			<span class="" onclick="editarCodigoRuta(<?=$repo->id_reporte ?>)"><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/ico/pencil.png','Editar',array('style'=>'width:20px') )?></span>
			<?php echo 'C&oacute;digo de ruta: '.$repo->txt_codigo_ruta ?>
			
			
			
			<br>
			<?php if ($repo->b_liberado==0){ ?>
				<p class="btn btn-primary" onclick="liberarReporte(<?=$repo->id_reporte ?>)">Liberar Reporte</p>		
			<br>
			<?php }else{?>
				El reporte está liberado
			<?php };?>
			<br>
			<br>
			<p class="btn btn-primary" onclick="addEvidencia(<?=$repo->id_reporte ?>)">Agregar evidencia</p>
			<div id="evidencia_form_<?=$repo->id_reporte ?>" style="display: none" class="popup_form"></div>
		</div>
		
		
		<div class="data">
			<?php foreach($repo->wrkEvidencias As $evi): ?>
			
				<div class="data_card">		
					<div class="profile">
						<h3><?php echo $evi->txt_unidad ?></h3>
						<div style="position: relative;">
							<img class="ico_img ico_overlay_edit_picture" 
								src="<?= Yii::app()->baseUrl?>/images/ico/edit_image.png" 
								onclick="show_PopUp_changePic(<?=$evi->id_evidencia ?>)">
								
							<img class="profile_img" src="<?= Yii::app()->baseUrl?>/images/evidencia/repo_<?=$repo->id_reporte?>/<?=$evi->txt_url_imagen ?>">
						</div>
					</div>
					<div class="repo_data">
						<div class="pull-right">
						<img class="ico_img_24" 
								src="<?= Yii::app()->baseUrl?>/images/ico/trash.png" 
								onclick="show_PopUp_deleteEvidencia(<?=$evi->id_evidencia ?>)">
						</div>		
								<p class="date"><?php echo $evi->fch_registro ?></p>
								<!--p class="date"><?php echo $evi->txt_unidad ?></p-->
			 		</div>
		 		</div> 
			
			<?php endforeach; ?>
		</div>
	</div>
<?php endforeach; ?>
		
	<script>
		function addReporte(idc,idca){
			target = $("#addReporte");
			target.slideToggle();
			target.load("<?=Yii::app()->baseUrl ?>/index.php/wrkReporte/create/idc/" + idc + "/idca/" + idca, function(){});
		}
	
		function addEvidencia(idr){
			divName = "#evidencia_form_" + idr;
			target = $(divName);
			target.load("<?=Yii::app()->baseUrl ?>/index.php/wrkEvidencia/create/idr/" + idr, function(){target.slideToggle()});
			
		}
		
	</script>

</div>

<div id="pop_up_back_cover" class="full_pop_up_bg" onclick="">

	<div id="pop_up_change_pic" class="floating_window pop_up_window" onclick="preventDefault()">
	
		<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_changePic()">X</div>
		<h3>Modificar fotografía</h3>
		
		<br><br>
		<form enctype='multipart/form-data' method="POST" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/updateImage">
			<input type="file" name="new_image">
			<input type="hidden" name="idEvent" id="idEvent">
			<br><br>
			<input type="submit" class="btn btn-primary" name="" value="Cambiar fotografía">
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_changePic()">
		</form>
	</div>
	
	<div id="pop_up_delete_evidencia" class="floating_window pop_up_window" onclick="preventDefault()">
	
		<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_changePic()">X</div>
		<h3>Borrar evidencia</h3>
		<strong>¿Esta seguro de borrar la evidencia seleccionada?</strong>
		
		<form method="GET" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/deleteEvidencia">
			
			<input type="hidden" name="id" id="idEventDelete">
			<br><br>
			<input type="submit" class="btn btn-primary" name="" value="Borrar">
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_deleteEvidencia()">
		</form>
	</div>
	
	<div id="pop_up_liberar_reporte" class="floating_window pop_up_window" onclick="preventDefault()">
	
		<div class="pop_header">	
			<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_changePic()">X</div>
			<h3>Liberar Reporte</h3>
		</div>
		<strong>¿Esta seguro liberar el reporte?</strong>
		
		<form method="GET" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/LiberarReporte">
			
			<input type="hidden" name="id" id="idReporteLiberar">
			<br><br>
			<input type="submit" class="btn btn-primary" name="" value="Liberar">
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_liberarReporte()">
		</form>
	</div>
	
	<!-- ---------------------------------------------  -->
	
	<div id="pop_up_agregar_ppt" class="floating_window pop_up_window" onclick="">
	
		<div class="pop_header">	
			<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_agregarPPT()">X</div>
			<h3>Agregar archivo</h3>
		</div>
		<strong>Selecciona el archivo</strong>
		
		<form id="upload_file_form"  method="POST" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/agregarArchivo" enctype="multipart/form-data">
			
			<input type="hidden" name="idc" id="idc">
			<input type="hidden" name="tipo" id="tipo">
			<br>
			<div id="loading" style="display: none">
				<img  src="<?php echo Yii::app()->request->baseUrl?>/images/ico/hex-loader2.gif" width="100px" >
				<span>Cargando archivo espere por favor ...</span>
			</div>
			<div id="load_file">
				<input type="file" name="archivo" id="archivo">
			</div>
			<br>
			
			<input 
				type="button" 
				class="btn btn-primary" 
				name="" 
				onclick="$('#loading').show();$('#load_file').hide();$('#upload_file_form').submit();" 
				value="Agregar">
				
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_agregarPPT()">
		</form>
	</div>
	
	
	<!-- ---------------------------------------------  -->
	
	<div id="pop_up_change_num_eco" class="floating_window pop_up_window" onclick="preventDefault()">
	
		<div class="pop_header">	
			<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_editarNumeroEconomico()">X</div>
			<h3 id="title">Cambiar número económico</h3>
		</div>
		<strong>Indicar el número económico</strong>
		
		<form method="POST" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/editarNumeroReporte" >
			
			<input type="hidden" name="idr" id="idr">
			<input type="hidden" name="idtipo" id="idtipo">
			
			<input type="text" name="numero" id="numero">
			<br><br>
			<input type="submit" class="btn btn-primary" name="" value="Cambiar">
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_editarNumeroEconomico()">
		</form>
	</div>
	
	<!-- ---------------------------------------------  -->
	
	<div id="pop_up_deshabilita_campana" class="floating_window pop_up_window" onclick="preventDefault()">
	
		<div class="pop_header">	
			<div class="pull-right" style="cursor: pointer;" onClick="hide_PopUp_editarNumeroEconomico()">X</div>
			<h3 id="title">Vencer la campaña</h3>
		</div>
		<strong>¿Desea marcar como vencida la campaña?</strong>
		<br>
		<br>
		<form method="POST" action="<?= Yii::app()->baseUrl?>/index.php/entCampanas/vencerCampana" >
			
			<input type="hidden" name="idcv" id="idcv">
			
			
			<input type="submit" class="btn btn-primary" name="" value="Vencer">
			<input type="button" class="btn btn-danger" name="" value="Cancelar" onclick="hide_PopUp_deshabilitarCampana()">
		</form>
	</div>
	
	
</div>


<script>

//------------- Cambiar Pic ---------
	function show_PopUp_changePic(id){
			$("#idEvent").val(id);
			$("#pop_up_back_cover").slideToggle();
			$("#pop_up_change_pic").slideToggle();		
	}
	
	function hide_PopUp_changePic(){
		$("#pop_up_change_pic").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}

	//------------- Delete Evidencia ---------
	
	function show_PopUp_deleteEvidencia(id){
		$("#idEventDelete").val(id);
		$("#pop_up_back_cover").slideToggle();
		$("#pop_up_delete_evidencia").slideToggle();		
	}

	function hide_PopUp_deleteEvidencia(){
		$("#pop_up_delete_evidencia").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}

//------------- Liberar reporte ---------
	
	function liberarReporte(id){
		$("#idReporteLiberar").val(id);
		$("#pop_up_back_cover").slideToggle();
		$("#pop_up_liberar_reporte").slideToggle();	
	}
	
	function hide_PopUp_liberarReporte(){
		$("#pop_up_liberar_reporte").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}


//------------- agregar ppt ---------
	
	function agregarPPT(id,tipo){
		$("#idc").val(id);
		$("#tipo").val(tipo);
		$("#pop_up_back_cover").slideToggle();
		$("#pop_up_agregar_ppt").slideToggle();	
	}
	
	function hide_PopUp_agregarPPT(){
		$("#pop_up_agregar_ppt").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}

//------------- Editar numero economico ---------
	
	function editarNumeroReporte(id){
		$("#idr").val(id);
		$("#idtipo").val(1);
		$("#pop_up_change_num_eco").slideToggle();
		$("#pop_up_back_cover").slideToggle();

		$("#pop_up_change_num_eco #title").html("Editar numero economico");
	}
	
	function hide_PopUp_editarNumeroEconomico(){
		$("#pop_up_change_num_eco").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}


	

//------------- Editar Placa ---------
	
	function editarNumeroPlaca(id){
		$("#idr").val(id);
		$("#idtipo").val(2);
		$("#pop_up_change_num_eco").slideToggle();
		$("#pop_up_back_cover").slideToggle();
		$("#pop_up_change_num_eco #title").html("Editar número de placa");
	}
	
	
//------------- Editar codigo de ruta ---------
	
	function editarCodigoRuta(id){
		$("#idr").val(id);
		$("#idtipo").val(3);
		$("#pop_up_change_num_eco").slideToggle();
		$("#pop_up_back_cover").slideToggle();
		$("#pop_up_change_num_eco #title").html("Editar número código de ruta");
	}


//------------- Deshabilitar campaña ---------
	
	function deshabilitarCampana(id){
		$("#idcv").val(id);
		$("#pop_up_deshabilita_campana").slideToggle(); //Muestra el contenido de la forma
		$("#pop_up_back_cover").slideToggle(); //muestra el objeto de atras

		$("#pop_up_change_num_eco #title").html("Editar numero economico");
	}
	
	function hide_PopUp_deshabilitarCampana(){
		$("#pop_up_deshabilita_campana").slideToggle();
		$("#pop_up_back_cover").slideToggle();
	}
	
	

	
	
</script>