<?php
/* @var $this EntCampanasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ent Campanases',
);

$this->menu=array(
	array('label'=>'Crear campanas', 'url'=>array('create')),
);
?>

<div class="main-content-wrapper">
	
		<h1>Campa&ntilde;as</h1>
	
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		'itemsCssClass'=>'grid'
	)); ?> 

</div>
	


	
<div style="clear: both;"></div>	

<div id="coverbg" class="coverbg"></div>	
	
	<div id="floating_form" class="floating_form">
		<div class="topbar">
			<p id="form_title">titulo</p>
			<span onClick="closeForm()">X</span>
		</div>
		<div id="form_content" class="form_content">
		</div>
	</div>
	
	
<script>

	function showForm(title, id){
		var w = $("#floating_form");
		w.toggle();

		var bg = $("#coverbg");
		bg.toggle();

		$("#form_title").html(title);
		

		var content = $("#form_content");
		content.html("Cargando");

		var url = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/relCampanasPlazas/update/" + id;

		console.log(url);
		
		content.load(url);
		
	}

	function closeForm(){
		var w = $("#floating_form");
		w.toggle();

		var bg = $("#coverbg");
		bg.toggle();
	}

	function submitForm(){
		var forma = $("#rel-campanas-plazas-form");
		var data = forma.serialize();
		var content = $("#form_content");

		console.log(forma.attr("action"));

		$.ajax({
				url: forma.attr("action"),
				typeData:"HTML",
				type:"POST",
				data:data,
				success:function(res){
						if(res.length > 0){
								content.html(res);
							}else{
								location.reload();
							}

					}
			});			

	}

</script>	