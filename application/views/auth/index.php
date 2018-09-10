<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<script type="text/javascript">
    $(window).on('load', function () {
        // ============================================================== 
        // Data Tables
        // ============================================================== 
        $('#datatables_utenti').DataTable({
            "language": {"url": baseURL + "assets/themes/adminpress/plugins/datatables-plugins/i18n/Italian.json"},
            "dom": 'lfrtip',
            "buttons": [
                'excel'
            ]
        });


    });
    function conferma(id, tipo)
    {
        swal({
            title: tipo + " utenza",
                    text: "Vuoi modificare l'utente?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                if (tipo === 'Disattiva') {
                    window.location.href = baseURL + "auth/deactivate/" + id;
                } else {
                    window.location.href = baseURL + "auth/activate_by_admin/" + id;
                }
            }
        });
    }
</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo lang('index_heading'); ?></h4>
                <h6 class="card-subtitle"><?php echo lang('index_subheading'); ?></h6>
                <div class="table-responsive m-t-10 m-b-40">
                    <table id="datatables_utenti" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo lang('index_fname_th'); ?></th>
                                <th><?php echo lang('index_lname_th'); ?></th>
                                <th><?php echo lang('index_email_th'); ?></th>
                                <th><?php echo lang('index_groups_th'); ?></th>
                                <th><?php echo lang('index_status_th'); ?></th>
                                <th><?php echo lang('index_action_th'); ?></th>
                            </tr>                            
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php foreach ($user->groups as $group): ?>
                                            <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?><br />
                                        <?php endforeach ?>
                                    </td>
                                    <td>                                        
                                        <a href="javascript:conferma(<?php echo $user->id; ?>,'<?php echo ($user->active) ? 'Disattiva' : 'Attiva'; ?>')" ><?php echo ($user->active) ? 'Disattiva' : 'Attiva'; ?></a>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo base_url("auth/edit_user/" . $user->id); ?>" data-toggle="tooltip" data-original-title="Modifica"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>                                       
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="button-group">
                    <a href="<?php echo base_url('auth/create_user') ?>" class="btn btn-info"><?php echo lang('index_create_user_link'); ?></a>                    
                </div>

            </div>
        </div>
    </div>
</div>



