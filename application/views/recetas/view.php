<h1><?php echo $recetas_item['nombre']; ?></h1>
<p>Foto: <?php echo $recetas_item['foto']; ?></p>

<p>Ingredientes: </p>
<ul>
	<?php 
		foreach ($ingredientes as $ingredientes_item) {
			echo "<li>".$ingredientes_item['nombre']."</li>";
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

<p>Tiempo de preparación: 
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
<p>Tiempo de cocción: 
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
<p>Tiempo de refrigeración: 
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
<p>críticas: <?php echo $recetas_item['criticas']; ?></p>
<p>Dificultad: <?php echo $recetas_item['dificultad']; ?></p>