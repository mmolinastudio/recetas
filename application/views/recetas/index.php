	<h2>Lista de Recetas</h2>
	<?php echo $paginacion; ?>
	<div class="accordion" id="accordion2">
	<?php foreach ($recetas as $recetas_item) { ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<h3 class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $recetas_item->id; ?>"><?php echo $recetas_item->nombre; ?></h3>
			</div>
			<div id="collapse<?php echo $recetas_item->id; ?>" class="accordion-body collapse">
				<div class="accordion-inner">
					<p><?php echo $recetas_item->desc_corta; ?></p>
		    		<p><a href="<?php echo current_url()."/".$recetas_item->slug; ?>">Ver receta</a></p>
				</div>
			</div>
		</div>
	<?php } //end_foreach ?>
	</div>
	<?php echo $paginacion; ?>