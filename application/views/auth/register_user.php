<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="login-register" style="background-image:url(<?php echo base_url(); ?>assets/themes/adminpress/images/background/login-register.jpg);">>
    <div class="login-box card">
        <div class="card-body">
            <?php 
                $attributes = array('class' => 'form-horizontal form-material', 'id' => 'loginform');
                echo form_open('auth/register_user', $attributes); 
            ?>
            <h3 class="box-title m-b-20">Registrazione utente</h3>
            <?php if (isset($message)) { ?>
                <div class="alert alert-info"><?php echo $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            <?php } ?>              
            <div class="form-group">
                <label class="control-label"><?php echo lang('create_user_fname_label'); ?></label>
                <div class="controls">
                    <input type="text" id="first_name" name="first_name" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                </div>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo lang('create_user_lname_label'); ?></label>
                <div class="controls">
                    <input type="text" id="last_name" name="last_name" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                </div>
            </div>            
            <div class="form-group">
                <label class="control-label"><?php echo lang('create_user_email_label'); ?></label>
                <div class="controls">
                    <input type="email" id="email" name="email" class="form-control" required 
                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"
                           data-validation-email-message="<?php echo lang('validator_email_field') ?>"> 
                </div>
            </div>    
            <div class="form-group">
                <label class="control-label"><?php echo lang('create_user_password_label'); ?></label>
                <div class="controls">
                    <input type="password" id="password" name="password" class="form-control" required 
                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                </div>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo lang('create_user_password_confirm_label'); ?></label>
                <div class="controls">
                    <input type="password" id="password_confirm" name="password_confirm" 
                           data-validation-match-match="password" class="form-control" required
                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"
                           data-validation-match-message="<?php echo lang('validator_must_match_password') ?>"> 
                </div>
            </div>   
            <div class="form-actions">
                <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Registrati</button>
            </div> 
            <div class="form-group text-center m-t-20">
                <div class="col-sm-12 text-center">
                    <div>Sei già registrato? <a href="<?php echo base_url('auth/login'); ?>" class="text-info m-l-5"><b>Accedi</b></a></div>
                </div>
            </div>            
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
