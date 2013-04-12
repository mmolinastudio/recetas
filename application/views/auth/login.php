    <div class="container">

      <?php $attributes = array('class' => 'form-signin'); ?>
      <?php echo form_open("auth/login", $attributes); ?>

        <h2 class="form-signin-heading"><?php echo lang('login_heading'); ?></h2>
        <?php //echo "</p>".lang('login_subheading')."</p>"; ?>
        <div id="infoMessage"><?php echo $message; ?></div>
        
        <input type="text" id="identity" name="identity" class="input-block-level" placeholder="<?php echo lang('login_identity_label'); ?>">

        <input type="password" id="password" name="password" class="input-block-level" placeholder="<?php echo lang('login_password_label'); ?>">
        
        <button class="btn btn-large btn-primary pull-right" type="submit" name="submit"><?php echo lang('login_submit_btn'); ?></button>

        <label class="checkbox" name="remember">
          <input type="checkbox" id="remember" name="remember" value="1">
          <?php echo lang('login_remember_label'); ?>
        </label>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

      <!--</form>-->
      <?php echo form_close();?>

    </div> <!-- /container -->
