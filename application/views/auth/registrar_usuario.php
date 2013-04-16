
<?php $attributes = array('class' => 'form-horizontal'); ?>
<?php echo form_open("registro", $attributes); ?>

      <legend>
            <h1><?php echo lang('register_user_heading');?></h1>
            <p><?php echo lang('register_user_subheading');?></p>
      </legend>

      <div class="text-error"><?php echo $message;?></div>

      <div class="control-group" title="<?php echo lang('register_user_optional_label');?>">
            <label class="control-label" for="first_name"><?php echo lang('register_user_fname_label');?></label>
            <div class="controls">
                  <input type="text" id="first_name" name="first_name" placeholder="Nombre">
            </div>
      </div>
      <div class="control-group" title="<?php echo lang('register_user_optional_label');?>">
            <label class="control-label" for="last_name"><?php echo lang('register_user_lname_label');?></label>
            <div class="controls">
                  <input type="text" id="last_name" name="last_name" placeholder="Apellido">
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="username"><?php echo lang('register_user_username_label');?></label>
            <div class="controls">
                  <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
      </div>
      <div class="control-group">
            <label class="control-label" for="email"><?php echo lang('register_user_email_label');?></label>
            <div class="controls">
                  <input type="email" id="email" name="email" placeholder="Email"  required>
            </div>
      </div>

      <div class="control-group">
            <label class="control-label" for="password"><?php echo lang('register_user_password_label');?></label>
            <div class="controls">
                  <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
      </div>

      <div class="control-group">
            <label class="control-label" for="password_confirm"><?php echo lang('register_user_password_confirm_label');?></label>
            <div class="controls">
                  <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password" required>
            </div>
      </div>
      <div class="control-group">
            <div class="controls">
                  <button type="submit" name="submit" class="btn btn-primary btn-large"><?php echo lang('register_user_submit_btn'); ?></button>
            </div>
      </div>

<?php echo form_close();?>