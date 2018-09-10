<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo lang('create_user_heading'); ?></h4>
                <h6 class="card-subtitle"><?php echo lang('create_user_subheading'); ?></h6>
                <?php echo form_open("auth/create_user", 'class="m-t-40" id="userform" novalidate'); ?>
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
                    <label class="control-label"><?php echo lang('create_user_company_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="company" name="company" class="form-control">
                    </div>
                </div>                   
                <div class="form-group">
                    <label class="control-label"><?php echo lang('create_user_phone_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="phone" name="phone" class="form-control"> 
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
                    <label class="control-label"><?php echo lang('create_user_identity_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="identity" name="identity" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                    </div>
                </div>  
                <div class="form-group">
                    <label class="control-label"><?php echo lang('create_user_password_label'); ?></label>
                    <div class="controls">
                        <input type="password" id="password" name="password" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo lang('create_user_password_confirm_label'); ?></label>
                    <div class="controls">
                        <input type="password" id="password_confirm" name="password_confirm" data-validation-match-match="password" class="form-control" required
                               data-validation-required-message="<?php echo lang('validator_required_field') ?>"
                               data-validation-match-message="<?php echo lang('validator_must_match_password') ?>"> 
                    </div>
                </div>   
                <div class="form-actions">
                    <button type="submit" class="btn btn-info"><?php echo lang('create_user_submit_btn'); ?></button>
                    <a href="<?php echo base_url('auth/index') ?>" class="btn btn-inverse">Annulla</a>
                </div>                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
