<?php $this->beginContent('//layouts/main'); ?>	
	
	<div class="row">
		<aside class="panel panel-default sub-menu">
			
			
			<nav class="dgom_menu_box_content sub-menu-nav">
				<?php
					$this->beginWidget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'nav navbar-right'),
					));
					$this->endWidget();
				?>
				
			</nav>
		</aside>
		
		<!-- MAIN CONTENT -->
		<main  class="col-lg-12">
			<?php echo $content; ?>
		</main>
	
	</div>
<?php $this->endContent(); ?>	