<?php 
	if($logged_in){
		if($receta_username == $real_username){
			echo "<p class=\"alert alert-error\"><i class=\"icon-pencil\"></i> Aún no puedes editar esta receta</p>";
			echo "<p class=\"alert alert-error\"><i class=\"icon-trash\"></i> Aún no puedes eliminar esta receta</p>";
			echo "<p class=\"alert alert-error\"><i class=\"icon-remove\"></i> Aún no puedes eliminar ingredientes</p>";
			echo "<p class=\"alert alert-error\"><i class=\"icon-plus\"></i> Aún no puedes añadir ingredientes</p>";			
		}else{
			echo "<p class=\"alert alert-error\"><i class=\"icon-heart\"></i> Aún no puedes añadir esta receta a tu lista de recetas favoritas</p>";
			echo "<p class=\"alert alert-error\"><i class=\"icon-star\"></i> <i class=\"icon-star-empty\"></i> Aún no puedes hacer \"Me gusta\"</p>";
		}
	}
?>

<h1><?php echo $recetas_item['nombre']; ?></h1>
<p>Foto: <?php echo $recetas_item['foto']; ?></p>
<p><i class="icon-tags"></i> Categorías:</p>
<p>Ingredientes: </p>
<ul>
	<?php 
		foreach ($ingredientes as $ingredientes_item) {
			echo "<li>".$ingredientes_item['nombre']." - ".$ingredientes_item['cantidad']." ".$ingredientes_item['unidad']." (".$ingredientes_item['prioridad'].")</li>";
			//echo "<li>".$ingredientes_item['nombre']."</li>";
		}
		
	?>
</ul>



<p>Descripción corta: <?php echo $recetas_item['desc_corta']; ?></p>
<p>Descripción: <?php echo $recetas_item['desc_larga']; ?></p>


<?php
	//$t_preparacion = explode(':', $recetas_item['t_preparacion']);
	//$horas = $t_preparacion[0];
	//$minutos = $t_preparacion[1];
?>

<p><i class="icon-time"></i> Tiempo de preparación: 
	<?php
		if ($recetas_item['t_preparacion'] == NULL){
			echo "(desconocido)";
		}else{
			$d = new DateTime($recetas_item['t_preparacion']);
			if ($d->format('H') > 0){
				echo ltrim($d->format('H'), '0').'h, '.ltrim($d->format('i'), '0').' min';
			}else{
				echo ltrim($d->format('i'), '0').' min';
			}
		}
	?>
</p>
<p><i class="icon-time"></i> Tiempo de cocción: 
	<?php
		if ($recetas_item['t_coccion'] == NULL){
			echo "(desconocido)";
		}else{
			$d = new DateTime($recetas_item['t_coccion']);
			if ($d->format('H') > 0){
				echo ltrim($d->format('H'), '0').'h, '.ltrim($d->format('i'), '0').' min';
			}else{
				echo ltrim($d->format('i'), '0').' min';
			}
		}
	?>
</p>
<p><i class="icon-time"></i> Tiempo de refrigeración: 
	<?php
		if ($recetas_item['t_refrigeracion'] == NULL){
			echo "(desconocido)";
		}else{
			$d = new DateTime($recetas_item['t_refrigeracion']);
			if ($d->format('H') > 0){
				echo ltrim($d->format('H'), '0').'h, '.ltrim($d->format('i'), '0').' min';
			}else{
				echo ltrim($d->format('i'), '0').' min';
			}
		}
	?>
</p>


<p>Número de raciones: <?php echo $recetas_item['num_raciones']; ?></p>
<p>Consejos: <?php echo $recetas_item['consejos']; ?></p>
<p>Dificultad: <?php echo $recetas_item['dificultad']; ?></p>

<?php if ($receta_username == "administrador") { ?>
	<p><i class="icon-user"></i> Administrador</p>
<?php } elseif ($receta_username == "nadie") { ?>
	<p><i class="icon-user"></i> usuario desconocido</p>
<?php } else{ ?>
	<p><i class="icon-user"></i> <a href="<?php echo site_url("usuario/".$receta_username); ?>"><?php echo $receta_username; ?></a></p>
<?php } ?>

<p><i class="icon-bookmark"></i> Añadir a mis recetas favoritas</p>
