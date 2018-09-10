var table_esperti;

$(document).ready(function () {

    //datatables esperti
    table_esperti = $('#dtbl_esperti_sep').DataTable({
        "language": {"url": baseURL + "assets/themes/adminpress/plugins/datatables-plugins/i18n/Italian.json"},
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "dom": 'lfrtip',
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseURL + "ws/esperti_sep_ajax/crea_datatable",
            "type": "POST",
            "data": function (data) {
                data.nome = $('#nome').val();
                data.cognome = $('#cognome').val();
                data.sesso = $('#sesso').val();
                data.data_nascita = $('#data_nascita').val();
                data.istat_provincia_residenza = $('#provincia_residenza').val();
                data.id_comune_residenza = $('#comune_residenza').val();
                if ($('#id_profilo').val() !== "")
                {
                    data.id_profilo = $('#id_profilo').val();
                } 
                if ($('#id_sep').val() !== "")
                {
                   data.id_sep = $('#id_sep').val();                
                }
                var prov = $('#area_geografica').val();
                switch(prov) {
                    case "AV":
                        data.flag_disp_AV = 1;
                        break;
                    case "BN":
                        data.flag_disp_BN = 1;
                        break;
                    case "CE":
                        data.flag_disp_CE = 1;
                        break;
                    case "NA":
                        data.flag_disp_NA = 1;
                        break;                        
                    case "SA":
                        data.flag_disp_SA = 1;
                        break;                        

                }
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {targets: [0, 1, 2, 3, 4], "visible": true, "searchable": true},
            {
                "targets": [28],
                "data": null,
                "render": function (data, type) {
                    if (type === "sort" || type === 'type') {
                        return data[28];
                    } else {
                        var stato = '';
                        if (parseInt(data[27]) < 2)
                            stato = '<span class="label label-danger">' + data[28] + '</span>';
                        else if (parseInt(data[27]) === 2) {
                            stato = '<span class="label label-warning">' + data[28] + '</span>';
                        } else {
                            stato = '<span class="label label-info">' + data[28] + '</span>';
                        }
                        //action_link += '<a href="javascript:elimina_domanda(' + data[0] + ');" data-toggle="tooltip" data-original-title="Elimina"> <i class="fa fa-close text-danger"></i> </a>';
                        return stato;
                    }
                },
                "visible": true
            },
            {
                "targets": [30],
                "data": null,
                "render": function (data) {
                    var action_link = '';
                    if (parseInt(data[27]) > 1)
                    {
                        action_link = '<a href="' + baseURL + 'esperti_sep/gestione_domanda/' + data[0] + '" data-toggle="tooltip" data-original-title="Gestione"> <i class="fa fa-edit text-inverse m-r-10"></i> </a>';
                    }
                    if ((parseInt(data[27]) > 1) && (parseInt(data[27]) < 4))
                    {
                        action_link += '<a href="javascript:sblocca_domanda(' + data[0] + ');" data-toggle="tooltip" data-original-title="Sblocca candidatura"> <i class="fa fa-unlock text-inverse m-r-10"></i> </a>';

                    }
                    //action_link += '<a href="javascript:elimina_domanda(' + data[0] + ');" data-toggle="tooltip" data-original-title="Elimina"> <i class="fa fa-close text-danger"></i> </a>';
                    return action_link;
                },
                "visible": true,
                "sortable": false
            },
            {targets: '_all', visible: false}
        ],
        "drawCallback": function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        }
    });

    $('#btn-filter').click(function () { //button filter event click
        table_esperti.ajax.reload(); //just reload table
    });

    $('#btn-reset').click(function () { //button reset event click
        $('#form-filter')[0].reset();
        if ($.fn.select2) {
            $('#form-filter select.select2').val('').trigger('change');
        }        
        $("#form-filter-div").slideUp();
        table_esperti.ajax.reload(); //just reload table
    });

    new Select2Cascade($('#provincia_residenza'), $('#comune_residenza'), baseURL + '/ws/common_ajax/lista_comuni');
    new Select2Cascade($('#id_sep'), $('#id_profilo'), baseURL + '/ws/common_ajax/lista_profili');
    
    $('#ricerca').on("click", function () {
        $("#form-filter-div").slideDown();
    });


});

function sblocca_domanda(id)
{
    swal({
        title: "Sei sicuro?",
        text: "La candidatura verrà sbloccata e l\'utente potrà modificare i dati associati alla domanda!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            //PROSEGUI											
            $.ajax({
                type: 'POST',
                url: baseURL + 'ws/esperti_sep_ajax/sblocca_domanda',
                cache: false,
                data: {id_domanda: id},
                success: function (data) {
                    switch (data) {
                        case true:
                            table_esperti.ajax.reload();
                            swal('Domanda sbloccata', 'Operazione effettuata correttamente', 'success');
                            break;
                        default:
                            swal('Attenzione', 'Errore nella procedura, riprovare', 'error');
                            break;
                    }
                },
                error: function () {
                    swal('Attenzione', 'Si sono verificati degli errori nella procedura', 'error');
                }
            });
        }
    });

}