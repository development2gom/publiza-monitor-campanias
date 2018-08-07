

<!Doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="language" content="es" />
		
	
		
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/css/site.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/styles.css" type="text/css" media="screen" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery-2.1.4.min.js"> </script>
		
		
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap.min.js"> </script>
		
		
		
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		
		
		<!--  GOOGLE  -->
		
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid-view.css" />
	</head>
	<body>
		<div class="container-fluid">
		
		
		<span class="col-lg-8 col-lg-offset-2">
			<?php
			    foreach(Yii::app()->user->getFlashes() as $key => $message):
			    ?>	<br>
			    	<div class="alert alert-<?=$key ?>" role="alert">
			    	<a href="#" class="alert-link"><?=$message ?></a>
			    	</div>
			<?php 
			    endforeach;
			?>
		</span>
	
		
		
			<div class="nav col-lg-12">
				<div id="header">
					
				</div><!-- header -->
				
				<nav class="navbar navbar-default navbar-fixed-top ">
					
<!--Linea comentada por Alf el 26 de agosto : cambios de diseño para el sistema-->
					<?php # echo CHtml::link(Yii::app()->name, array('site/index'), array('class'=>'navbar-brand')); ?>
					
					<div class="nav-wrapper">
					
					<?php echo CHtml::link('<img class="site-logo" src="'.Yii::app()->theme->baseUrl.'/images/logo.png"/> ', array('site/index'), array('class'=>'navbar-brand')); ?>
				
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Campañas', 'url'=>array('/entCampanas/index'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->user->isClient()),
							array('label'=>'Clientes', 'url'=>array('/entClientes/index'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->user->isClient()),
							array('label'=>'Usuarios', 'url'=>array('/entUsuarios/index'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->user->isClient()),
							array('label'=>'Reportes', 'url'=>array('/reportes/index'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->isClient()),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						), 'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),
					)); ?>
					</div>
				</nav><!-- mainmenu -->
			</div>
			
			<div class="content-wrapper">
				<?php echo $content; ?>
			</div>
			
			
			
			
			<div class="nav col-lg-12">
				<footer>
					<p>Powered By 2 Geeks one Monkey</p>
				</footer>
			</div>
		</div>
		<script src="http://masonry.desandro.com/masonry.pkgd.js"> </script>
		<script>
			$(document).ready(function(){
				$('.grid').masonry({
				  itemSelector: '.item',
				  columnWidth: 320,
				  gutter: 10
				});
			});
		</script>
		
	</body>
	
</html>
