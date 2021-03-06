<div class="login-register" style="background-image:url(<?php echo base_url(); ?>assets/themes/adminpress/images/background/login-register.jpg);">>
    <div class="login-box card">
        <div class="card-body">
            <?php
            $attributes = array('class' => 'form-horizontal form-material', 'id' => 'loginform');
            echo form_open('auth/login', $attributes);
            ?>
            <h3 class="box-title m-b-20"><?php echo lang('login_heading'); ?></h3>

            <?php if (isset($message)) { ?>
                <div class="alert alert-info"><?php echo $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            <?php } ?>  

            <div class="form-group ">
                <div class="col-xs-12 controls">               
                        <input type="text" class="form-control" id="identity" name="identity"  required  placeholder="Email"
                               data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 controls">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password"
                               data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 font-14">
                    <div class="checkbox checkbox-primary pull-left p-t-0">                        
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                        <?php echo lang('login_remember_label', 'remember'); ?>
                    </div> 
                    <a href="forgot_password" id="to-recover" class="text-dark pull-right"><?php echo lang('login_forgot_password'); ?></a> 
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <div class="form-actions">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo lang('login_submit_btn'); ?></button>
                    </div>
                </div>
            </div>    
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <div>Non sei registrato? <a href="<?php echo base_url('auth/register_user'); ?>" class="text-info m-l-5"><b>Registrati</b></a></div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>