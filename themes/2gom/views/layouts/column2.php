<?php $this->beginContent('//layouts/main'); ?>	
	
	<div class="My clase especial">
		<aside class="panel panel-default">	
			<nav class="dgom_menu_box_content">
				<?php
					$this->beginWidget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'nav navbar-right'),
					));
					$this->endWidget();
				?>
				
			</nav>
		</aside>
		<main  class="col-lg-8">
			<?php echo $content; ?>
		</main>
		
		
		<aside class="col-lg-2">
		
			<div class="dgom_menu_box_header">
				<p>Acciones</p>
			</div>	
			
			<nav class="dgom_menu_box_content">
				<?php $this->widget('zii.widgets.CMenu', array(
					/*'type'=>'list',*/
					'encodeLabel'=>false,
					'items'=>array(
						//array('label'=>'Aseguradoras', 'url'=>array('/catAseguradoras/index'),'itemOptions'=>array('class'=>'','role'=>'presentation')),
						
						
					),'htmlOptions' =>  array('class'=>'nav nav-pills nav-stacked','role'=>'presentation')
					));
				?>
			</nav>		
		</aside>
	</div>
<?php $this->endContent(); ?>	

