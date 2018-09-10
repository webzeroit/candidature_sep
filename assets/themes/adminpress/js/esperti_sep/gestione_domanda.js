var table_professionalita;
var table_istr_profilo;


$(document).ready(function () {

    $('#div_salva_professionalita').hide();
    $('#div_salva_istr_profilo_domanda_esep').hide();

    //lettura dati domanda
    leggi_domanda();

    //allegati
    table_allegati = $('#dtbl_allegati_domanda').DataTable({
        "language": {"url": baseURL + "assets/themes/adminpress/plugins/datatables-plugins/i18n/Italian.json"},
        "processing": false, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "info": false,
        "paging": false,
        "searching": false,
        "lengthChange": false,
        "ordering": false,
        "autoWidth": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseURL + "ws/candidatura_ajax/crea_datatables_allegati",
            "type": "POST",
            "data": {
                "id_domanda": $("input[name='id_domanda']").val()
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {"targets": [0], "visible": false, "searchable": false},
            {"targets": [1], "visible": false, "searchable": false},
            {"targets": [2], "visible": true},
            {"targets": [3], "visible": false, "searchable": false},
            {"targets": [4], "visible": false, "searchable": false},
            {"targets": [5], "visible": true},
            {
                "targets": [6],
                "data": null,
                "render": function (data) {
                    var action_link = '<a download target="_blank" href="' + data[4] + '" data-toggle="tooltip" data-original-title="Scarica"> <i class="fa fa-download text-inverse m-r-10"></i> </a>';
                    return action_link;
                }
            }
        ],
        "drawCallback": function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        }
    });

    //professionalita
    table_professionalita = $('#dtbl_professionalita').DataTable({
        "language": {"url": baseURL + "assets/themes/adminpress/plugins/datatables-plugins/i18n/Italian.json"},
        "processing": false, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "info": false,
        "paging": false,
        "searching": false,
        "lengthChange": false,
        "ordering": false,
        "autoWidth": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseURL + "ws/esperti_sep_ajax/crea_datatable_professionalita",
            "type": "POST",
            "data": {
                "id_domanda": $("input[name='id_domanda']").val()
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {"targets": [0], "visible": false, "searchable": false},
            {"targets": [1], "visible": false, "searchable": false},
            {"targets": [2], "visible": false, "searchable": false},
            {"targets": [3], "visible": true, "width": "50%"},
            {"targets": [4], "visible": true, "width": "30%"},
            {"targets": [5], "visible": true, "width": "20%"},
            {
                "targets": [6],
                "data": null,
                "render": function (data) {
                    var action_link = '<a href="javascript:modifica_professionalita(' + data[0] + ');" data-toggle="tooltip" data-original-title="Modifica"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>';
                    action_link += '<a href="javascript:elimina_professionalita(' + data[0] + ');" data-toggle="tooltip" data-original-title="Elimina"> <i class="fa fa-close text-danger"></i> </a>';
                    return action_link;
                }
            }
        ],
        "drawCallback": function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        }
    });
    $('#btn_add_professionalita').click(function () {
        $("input[name='id_professionalita_domanda']").val('0');
        $('#frm_professionalita_esep')[0].reset();
        $('#id_professionalita').val('').trigger('change'); //select2 reset
        $('#div_salva_professionalita').slideDown();
    });
    $('#btn_chiudi_professionalita').click(function () {
        $('#div_salva_professionalita').slideUp();
    });
    $('#frm_professionalita_esep').on('submit', function (form) {
        form.preventDefault();
        if (!$('#frm_professionalita_esep').jqBootstrapValidation("hasErrors"))
        {
            var formData = $("#frm_professionalita_esep").serialize();

            $.ajax({
                type: 'POST',
                url: baseURL + 'ws/esperti_sep_ajax/salva_professionalita',
                cache: false,
                data: formData,
                success: function (data) {
                    if (data > 0) {
                        swal("Salva dati", "Operazione effettuata con successo", "success");
                        table_professionalita.ajax.reload(); //just reload table
                        $('#div_salva_professionalita').slideUp();
                    }
                },
                error: function () {
                    swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
                }
            });


        }
    });

    //profili
    table_istr_profilo = $('#dtbl_istr_profilo_domanda').DataTable({
        "language": {"url": baseURL + "assets/themes/adminpress/plugins/datatables-plugins/i18n/Italian.json"},
        "processing": false, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "info": false,
        "paging": false,
        "searching": false,
        "lengthChange": false,
        "ordering": false,
        "autoWidth": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseURL + "ws/esperti_sep_ajax/crea_datatable_istruttoria_profili",
            "type": "POST",
            "data": {
                "id_domanda": $("input[name='id_domanda']").val()
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {"targets": [0], "visible": false, "searchable": false},
            {"targets": [1], "visible": false, "searchable": false},
            {"targets": [2], "visible": false, "searchable": false},
            {"targets": [3], "visible": true, "width": "50%"},
            {"targets": [4], "visible": true, "width": "10%"},
            {"targets": [5], "visible": true, "width": "30%"},
            {
                "targets": [6],
                "data": null,
                "render": function (data) {
                    var action_link = '<a href="javascript:istruttoria_profilo(' + data[0] + ');" data-toggle="tooltip" data-original-title="Apri"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>';
                    return action_link;
                },
                "width": "10%"
            }
        ],
        "drawCallback": function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
        }
    });
    $('#btn_chiudi_istr_profilo').click(function () {
        $('#div_salva_istr_profilo_domanda_esep').slideUp();
    });
    $('#frm_istr_profilo_domanda_esep').on('submit', function (form) {
        form.preventDefault();
        if (!$('#frm_istr_profilo_domanda_esep').jqBootstrapValidation("hasErrors"))
        {
            var formData = $("#frm_istr_profilo_domanda_esep").serialize();

            $.ajax({
                type: 'POST',
                url: baseURL + 'ws/esperti_sep_ajax/salva_istruttoria_profilo',
                cache: false,
                data: formData,
                success: function (data) {
                    if (data > 0) {
                        swal("Salva dati", "Operazione effettuata con successo", "success");
                        table_istr_profilo.ajax.reload(); //just reload table
                        $('#div_salva_istr_profilo_domanda_esep').slideUp();
                    }
                },
                error: function () {
                    swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
                }
            });
        }
    });

    //esiti
    $('#frm_esito_istruttoria_esep').on('submit', function (form) {
        form.preventDefault();
        if (!$('#frm_esito_istruttoria_esep').jqBootstrapValidation("hasErrors")) {
            var formData = $("#frm_esito_istruttoria_esep").serialize();
            $.ajax({
                type: 'POST',
                url: baseURL + 'ws/esperti_sep_ajax/salva_domanda',
                cache: false,
                data: formData,
               success: function (data) {
                    if (data > 0) {
                        swal("Salva dati", "Operazione effettuata con successo", "success");                        
                    }
                },
                error: function () {
                    swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
                }
            });
        }
    });

});
function leggi_domanda()
{
    $.ajax({
        type: 'POST',
        url: baseURL + 'ws/esperti_sep_ajax/leggi_domanda',
        cache: false,
        data: {id_domanda: $("input[name='id_domanda']").val()},
        success: function (data) {
            console.log(data);
            $('#frm_istruttoria_domanda_esep').loadJSON(data);
            $("#frm_esito_istruttoria_esep #id_esito_domanda_esep").val(data.id_stato_domanda_esep);
            $("#frm_esito_istruttoria_esep #data_istruttoria").val(data.data_istruttoria);
            $("#frm_esito_istruttoria_esep #note_istruttoria").val(data.note);
        },
        error: function () {
            swal('Attenzione', 'Si sono verificati degli errori nel recupero dei dati', 'error');
        }
    });
}

function elimina_professionalita(id_professionalita_domanda)
{
    swal({
        title: "Sei sicuro?",
        text: "Verrà cancellata la riga selezionata",
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
                url: baseURL + 'ws/esperti_sep_ajax/elimina_professionalita',
                cache: false,
                data: {id_professionalita_domanda: id_professionalita_domanda},
                success: function (data) {
                    switch (data) {
                        case true:
                            table_professionalita.ajax.reload();
                            swal('Eliminato', 'Operazione effettuata correttamente', 'success');
                            break;
                        default:
                            swal('Attenzione', 'Errore nella cancellazione, riprovare', 'error');
                            break;
                    }
                },
                error: function () {
                    swal('Attenzione', 'Si sono verificati degli errori nella cancellazione', 'error');
                }
            });
        }
    });

}

function modifica_professionalita(id_professionalita_domanda)
{
    $.ajax({
        type: 'POST',
        url: baseURL + 'ws/esperti_sep_ajax/leggi_professionalita',
        cache: false,
        data: {id_professionalita_domanda: id_professionalita_domanda},
        success: function (data) {
            $('#id_professionalita').select2("val", data.id_professionalita);
            $('#des_specifica_professionalita').val(data.des_specifica_professionalita);
            $('#livello_EQF_professionalita').val(data.livello_EQF_professionalita);
            $("input[name='id_professionalita_domanda']").val(data.id_professionalita_domanda);
            $('#div_salva_professionalita').slideDown();
        },
        error: function () {
            swal('Attenzione', 'Si sono verificati degli errori nel recupero dei dati', 'error');
        }
    });
}


function istruttoria_profilo(id_domanda_sep)
{
    $('#frm_istr_profilo_domanda_esep')[0].reset();
    
    $.ajax({
        type: 'POST',
        url: baseURL + 'ws/candidatura_ajax/leggi_profilo',
        cache: false,
        data: {id_domanda_sep: id_domanda_sep},
        success: function (data) {
            $('#frm_istr_profilo_domanda_esep').loadJSON(data);
            $('#note').val(data.note);
            $('#livello_EQF_profilo').val(data.livello_eqf);
            $('#div_salva_istr_profilo_domanda_esep').slideDown();
        },
        error: function () {
            swal('Attenzione', 'Si sono verificati degli errori nel recupero dei dati', 'error');
        }
    });
}