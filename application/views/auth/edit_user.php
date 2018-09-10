<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo lang('edit_user_heading'); ?></h4>
                <h6 class="card-subtitle"><?php echo lang('edit_user_subheading'); ?></h6>
                <?php echo form_open(uri_string(), 'class="m-t-40" id="userform" novalidate'); ?>

                <div class="form-group">
                    <label class="control-label"><?php echo lang('create_user_fname_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name', $user->first_name); ?>" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                    </div>
                </div>   
                <div class="form-group">
                    <label class="control-label"><?php echo lang('edit_user_lname_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="first_name" name="last_name" value="<?php echo set_value('last_name', $user->last_name); ?>" class="form-control" required data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                    </div>
                </div>                 
                <div class="form-group">
                    <label class="control-label"><?php echo lang('edit_user_company_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="company" name="company" value="<?php echo set_value('company', $user->company); ?>" class="form-control">
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label"><?php echo lang('edit_user_phone_label'); ?></label>
                    <div class="controls">
                        <input type="text" id="phone" name="phone" value="<?php echo set_value('phone', $user->phone); ?>" class="form-control"> 
                    </div>
                </div>                  
                <?php echo form_hidden('id', $user->id); ?>
                <?php echo form_hidden($csrf); ?>

                <?php if ($this->ion_auth->is_admin()): ?>
                    <h4 class="card-title m-t-40">Assegnazione Ruoli</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="demo-checkbox">
                                    <?php
                                    foreach ($groups as $group)
                                    {
                                        $gID = $group['id'];
                                        $checked = null;
                                        foreach ($currentGroups as $grp)
                                        {
                                            if ($gID == $grp->id)
                                            {
                                                $checked = ' checked="checked"';
                                                break;
                                            }
                                        }
                                        ?>
                                        <input type="checkbox" id="group_<?php echo $group['id']; ?>" value="<?php echo $group['id']; ?>" name="groups[]" class="filled-in chk-col-light-blue" <?php echo $checked; ?>>
                                        <label for="group_<?php echo $group['id']; ?>"><?php echo htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8'); ?></label><br/>
                                    <?php } ?>
                                </div> 
                            </div>
                        </div>   
                    </div>                          
                <?php endif ?>
                <div class="form-actions">
                    <button type="submit" class="btn btn-info"><?php echo lang('edit_user_submit_btn'); ?></button>
                    <a href="<?php echo base_url('auth/index') ?>" class="btn btn-inverse">Annulla</a>
                </div>   
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



                   