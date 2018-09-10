<div class="login-register" style="background-image:url(<?php echo base_url(); ?>assets/themes/adminpress/images/background/login-register.jpg);">>
    <div class="login-box card">
        <div class="card-body">
            <?php
            $attributes = array('class' => 'form-horizontal form-material', 'id' => 'recoverform');
            echo form_open('auth/forgot_password', $attributes);
            ?>
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3><?php echo lang('forgot_password_heading'); ?></h3>
                    <p class="text-muted"><?php echo sprintf(lang('forgot_password_subheading'), 'email'); ?> </p>
                </div>
            </div>
            <?php if (isset($message)) { ?>
                <div class="alert alert-info"><?php echo $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            <?php } ?>              
            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="identity" name="identity" class="form-control" type="text" required="" placeholder="<?php echo lang('forgot_password_validation_email_label') ?>"> 
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo lang('forgot_password_submit_btn'); ?></button>
                </div>
            </div>            
            <?php echo form_close(); ?>
        </div>
    </div>
</div>