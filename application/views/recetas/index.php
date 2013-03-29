<h1>Recetas - listado</h1>
<?php foreach ($recetas as $recetas_item): ?>

    <h2><?php echo $recetas_item['nombre'] ?></h2>
    <div id="main">
        <?php echo $recetas_item['desc_corta'] ?>
    </div>
    <p><a href="<?php echo $recetas_item['slug'] ?>">View article</a></p>

<?php endforeach ?>