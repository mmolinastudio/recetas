
<?php $attributes = array('class' => 'form-horizontal'); ?>
<?php echo form_open("recetas/nueva_receta", $attributes); ?>

      <legend>
            <h1><?php echo lang('nueva_receta_heading');?></h1>
            <p><?php echo lang('nueva_receta_subheading');?></p>
      </legend>

      <div class="text-error"><p><?php echo $message;?></p></div>

      <div class="control-group">
            <label class="control-label" for="nombre"><?php echo lang('nueva_receta_nombre_label');?></label>
            <div class="controls">
                  <input class="input-xxlarge" type="text" id="nombre" name="nombre" placeholder="Título..." required>
            </div>
      </div>
      <div class="control-group" title="<?php echo lang('nueva_receta_optional_label');?>">
            <label class="control-label" for="desc_corta"><?php echo lang('nueva_receta_desc_corta_label');?></label>
            <div class="controls">
                  <textarea rows="2" class="input-xxlarge" type="text" id="desc_corta" name="desc_corta" placeholder="Introducción..."></textarea>
            </div>
      </div>

      <div class="control-group">
            <hr>
            <label class="control-label">
                  <?php echo lang('nueva_receta_ingredientes_label');?>
            </label>
            <div class="controls ">
                  <label><?php //echo lang('nueva_receta_ingrediente_nombre_label');?>
                        <input class="input-xxlarge" type="text" id="ingr_nombre_0" name="ingr_nombre_0" placeholder="Nombre..." required>
                  </label>

                  <input class="input-small" type="text" id="ingr_cantidad_0" name="ingr_cantidad_0" placeholder="Cantidad..." required>
                  <input class="input-large" type="text" id="ingr_unidad_0" name="ingr_unidad_0" placeholder="Unidad de medida..." required>
                  <select class="input-large" name="prioridad" id="prioridad0">
                        <option>Select...</option>
                        <option value="0">Necesario. No puede faltar.</option>
                        <option value="1">Alternativo. Se puede usar otro ingrediente en lugar de éste (decir cual).</option>
                        <option value="2">Opcional. Si falta, no pasa nada.</option>
                  </select>
                  <p></p>
                  <button id="boton_ingr" class="btn btn-mini" type="button">Añadir ingrediente</button>
                  <hr>
            </div>
      </div>

      <div class="control-group">
            <label class="control-label" for="desc_larga"><?php echo lang('nueva_receta_desc_larga_label');?></label>
            <div class="controls">
                  <textarea rows="7" class="input-xxlarge" type="text" id="desc_larga" name="desc_corta" placeholder="Describe la receta..." required></textarea>
            </div>
      </div>

      <div class="control-group">
            <label class="control-label" for="foto"><?php echo lang('nueva_receta_foto_label');?></label>
            <div class="controls">
                  
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 163px; height: 120px;">
                              <img src="http://www.placehold.it/163x120/EFEFEF/AAAAAA.png&text=imagen" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 163px; max-height: 120px; line-height: 20px;">
                        </div>
                        <div>
                              <span class="btn btn-file">
                                    <span class="fileupload-new">Selecciona una Imagen</span>
                                    <span class="fileupload-exists">Cambiar</span>
                                    <input type="file" id="foto" name="foto" />
                              </span>
                              <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Eliminar Imagen</a>
                        </div>
                  </div>

            </div>
      </div>

      <div class="control-group">
            <label class="control-label" for="t_preparacion"><?php echo lang('nueva_receta_t_preparacion_label');?></label>
            <div class="controls">
                  <input class="input-small" type="text" id="t_preparacion" name="t_preparacion" placeholder="HH:mm:ss" required>
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="t_coccion"><?php echo lang('nueva_receta_t_coccion_label');?></label>
            <div class="controls">
                  <input class="input-small" type="text" id="t_coccion" name="t_coccion" placeholder="HH:mm:ss" required>
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="t_refrigeracion"><?php echo lang('nueva_receta_t_refrigeracion_label');?></label>
            <div class="controls">
                  <input class="input-small" type="text" id="t_refrigeracion" name="t_refrigeracion" placeholder="HH:mm:ss" required>
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="num_raciones"><?php echo lang('nueva_receta_num_raciones_label');?></label>
            <div class="controls">
                  <input class="input-mini" type="number" id="num_raciones" name="num_raciones" placeholder="n" required>
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="dificultad"><?php echo lang('nueva_receta_dificultad_label');?></label>
            <div class="controls">
                  <label class="radio">
                        <input type="radio" name="dificultad" id="dificultad1" value="0" checked>
                        Fácil
                  </label>
                  <label class="radio">
                        <input type="radio" name="dificultad" id="dificultad2" value="1">
                        Media
                  </label>
                  <label class="radio">
                        <input type="radio" name="dificultad" id="dificultad2" value="2">
                        Difícil
                  </label>
            </div>
      </div>

      <div class="control-group" title="<?php echo lang('nueva_receta_optional_label');?>">
            <label class="control-label" for="consejos"><?php echo lang('nueva_receta_consejos_label');?></label>
            <div class="controls">
                  <textarea rows="3" class="input-xxlarge" type="number" id="consejos" name="consejos" placeholder="¿Algún consejo?"></textarea>
            </div>
      </div>

      <div class="control-group">
            <div class="controls">
                  <button type="submit" name="submit" class="btn btn-primary btn-large"><?php echo lang('nueva_receta_submit_btn'); ?></button>
            </div>
      </div>

<?php echo form_close();?>
