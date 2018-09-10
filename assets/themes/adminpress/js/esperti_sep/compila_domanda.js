var action = $("input[name=action]").val();
var id_stato_domanda_esep = 0;
var table_profili;
var table_allegati;
var cascade_nascita;
var cascade_residenza;
var cascade_profili;

$(document).ready(function () {

    cascade_nascita = new Select2Cascade($('#provincia_nascita'), $('#comune_nascita'), baseURL + '/ws/common_ajax/lista_comuni');
    cascade_residenza = new Select2Cascade($('#provincia_residenza'), $('#comune_residenza'), baseURL + '/ws/common_ajax/lista_comuni');

    $('#frm_domanda_esep').on('submit', function (form) {
        form.preventDefault();
        if (!$('#frm_domanda_esep').jqBootstrapValidation("hasErrors")) {
            /*VERIFICA SE ESISTE GIA' UNA CANDIDATURA CON LO STESSO CODICE FISCALE*/
            codice_fiscale = $("#codice_fiscale").val();
            if (!esiste_candidatura(codice_fiscale))
            {
                if (verifica_area_geografica()) {
                    var formData = $("#frm_domanda_esep").serialize();
                    $.ajax({
                        type: 'POST',
                        url: baseURL + 'ws/candidatura_ajax/salva_candidatura',
                        cache: false,
                        data: formData,
                        success: function (data) {
                            if (data > 0) {
                                swal({
                                    title: "Salva dati",
                                    text: "Operazione effettuata con successo",
                                    type: "success"
                                }, function () {
                                    if (action === "add")
                                    {
                                        window.location.href = baseURL + "candidatura/compila_domanda";
                                    }
                                });
                            }
                        },
                        error: function () {
                            swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
                        }
                    });
                } 
                else //SELEZIONA AREA
                {
                    swal("Attenzione", "Seleziona almeno un\'area geografica coperta", "error");
                }

            } 
            else //ESISTE CF 
            {
                swal("Attenzione", "Una candidatura con codice fiscale " + codice_fiscale + " risulta già inserita", "error");
            }
        }
    });

    $('#div_salva_profilo_domanda_esep').hide();
    $('#div_salva_allegato_domanda_esep').hide();

    if (action === "add")
    {
        $('#tabella_profilo_domanda_esep').hide();
        $('#div_allegato_B').hide();
        $('#tabella_allegati_domanda_esep').hide();
    } else
    {
        //lettura dati domanda
        leggi_candidatura();

        /* PROFILI */
        cascade_profili = new Select2Cascade($('#id_sep'), $('#id_profilo'), baseURL + '/ws/common_ajax/lista_profili');
        table_profili = $('#dtbl_profilo_domanda').DataTable({
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
                "url": baseURL + "ws/candidatura_ajax/crea_datatable_profili",
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
                {"targets": [4], "visible": true, "width": "40%"},
                {
                    "targets": [5],
                    "data": null,
                    "render": function (data) {
                        var action_link = '';
                        if (parseInt(id_stato_domanda_esep) < 2) {
                            var action_link = '<a href="javascript:elimina_profilo(' + data[0] + ');" data-toggle="tooltip" data-original-title="Elimina"> <i class="fa fa-close text-danger"></i> </a>';
                        }
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
        $('#btn_add_profilo_domanda_esep').click(function () {
            if (table_profili.rows().count() >= 5) {
                swal("Attenzione", "E' possibile inserire fino ad un massimo di 5 qualificazioni", "warning");
            } else {
                $("input[name='id_domanda_sep']").val('0');
                $('#frm_profilo_domanda_esep')[0].reset();
                $('#id_sep').val('').trigger('change'); //select2 reset
                $('#div_salva_profilo_domanda_esep').slideDown();
            }
        });
        $('#btn_chiudi_profilo').click(function () {
            $('#div_salva_profilo_domanda_esep').slideUp();
        });
        $('#frm_profilo_domanda_esep').on('submit', function (form) {
            form.preventDefault();
            if (!$('#frm_profilo_domanda_esep').jqBootstrapValidation("hasErrors"))
            {
                //VERIFICA SE GIA PRESENTE IN TABELLA
                if (controlla_profilo($('#id_profilo').val())) {
                    swal("Attenzione", "La qualificazione è già presente in tabella", "warning");
                } else {
                    var formData = $("#frm_profilo_domanda_esep").serialize();

                    $.ajax({
                        type: 'POST',
                        url: baseURL + 'ws/candidatura_ajax/salva_profilo',
                        cache: false,
                        data: formData,
                        success: function (data) {
                            if (data > 0) {
                                swal("Salva dati", "Operazione effettuata con successo", "success");
                                table_profili.ajax.reload(); //just reload table
                                $('#div_salva_profilo_domanda_esep').slideUp();
                            }
                        },
                        error: function () {
                            swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
                        }
                    });
                }
            }
        });

        /* ALLEGATI */
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
                        if (parseInt(id_stato_domanda_esep) < 2) {
                            action_link += '<a href="javascript:elimina_allegato(' + data[0] + ');" data-toggle="tooltip" data-original-title="Elimina"> <i class="fa fa-close text-danger"></i> </a>';
                        }
                        return action_link;
                    }
                }
            ],
            "drawCallback": function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('[data-toggle="popover"]').popover();
            }
        });
        $('#btn_add_allegato_domanda_esep').click(function () {
            $("input[name='id_allegato']").val('0');
            $('#frm_allegato_domanda_esep')[0].reset();
            $('#id_tipo_allegato_esep').val('').trigger('change'); //select2 reset
            $('#div_salva_allegato_domanda_esep').slideDown();
        });
        $('#btn_chiudi_allegato').click(function () {
            $('#div_salva_allegato_domanda_esep').slideUp();
        });
        $('#frm_allegato_domanda_esep').on('submit', function (form) {
            form.preventDefault();
            if (!$('#frm_allegato_domanda_esep').jqBootstrapValidation("hasErrors"))
            {
                if (controlla_allegato($('#id_tipo_allegato_esep').val())) {
                    swal("Attenzione", "L'allegato è già presente in tabella", "warning");
                } else {
                    var file_data = $('#file_allegato_domanda').prop('files')[0];
                    var form_data = new FormData($("#frm_allegato_domanda_esep")[0]);
                    form_data.append('file', file_data);
                    $.ajax({
                        url: baseURL + 'ws/candidatura_ajax/salva_allegato',
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
                        success: function (data) {
                            if (parseInt(data) > 0) {
                                swal("Salva dati", "Caricamento effettuato con successo", "success");
                                table_allegati.ajax.reload(); //just reload table
                                $('#div_salva_allegato_domanda_esep').slideUp();
                            } else {
                                swal('Attenzione', data, 'error');
                            }
                        },
                        error: function (data) {
                            swal('Attenzione', data, 'error');
                        }
                    });
                }
            }
        });
    }

});

/* *
 * UTILIZZA LEGGI DOMANDA AJAX POICHE' E' IL CONTROLLER CHE 
 * INTERCETTA L'ID DOMANDA ASSOCIATO ALL'USER ID 
 * */
function leggi_candidatura()
{
    $.ajax({
        type: 'POST',
        url: baseURL + 'ws/candidatura_ajax/leggi_domanda',
        cache: false,
        async: false,
        data: {id_domanda: $("input[name='id_domanda']").val()},
        success: function (data) {
            id_stato_domanda_esep = parseInt(data.id_stato_domanda_esep);
            if (parseInt(id_stato_domanda_esep) > 1)
            {
                $('#btn_salva_domanda').hide();
                $('#btn_add_profilo_domanda_esep').hide();
                $('#btn_add_allegato_domanda_esep').hide();
                $('#div_allegato_B').hide();
            }
            $('#frm_domanda_esep').loadJSON(data);
            $('#data_nascita').datepicker('update', data.data_nascita);
            cascade_nascita.then(function (parent, child, items) {
                child.val(data.id_comune_nascita).trigger("change");
            });
            cascade_residenza.then(function (parent, child, items) {
                child.val(data.id_comune_residenza).trigger("change");
            });
            $('#provincia_nascita').val(data.istat_provincia_nascita).trigger("change");
            $('#provincia_residenza').val(data.istat_provincia_residenza).trigger("change");
        },
        error: function () {
            swal('Attenzione', 'Si sono verificati degli errori nel recupero dei dati', 'error');
        }
    });
}

//VERIFICA SE IL CODICE FISCALE  E' GIA' PRESENTE IN DB
function esiste_candidatura(codice_fiscale)
{
    var trovato = false;
    if ($("input[name='action']").val() === 'add')
    {
        $.ajax({
            type: 'POST',
            url: baseURL + 'ws/candidatura_ajax/esiste_candidatura',
            cache: false,
            async: false,
            data: {codice_fiscale: codice_fiscale},
            success: function (data) {
                if (data === true)
                    trovato = true;
            },
            error: function () {
                swal('Attenzione', 'Si sono verificati degli errori nel recupero dei dati', 'error');
            }
        });
    }
    if (trovato)
        return true;
    else
        return false;
}

//VERIFICA SE LA QUALIFICAZIONE E' GIA' PRESENTE IN LISTA
function controlla_profilo(id_qualificazione)
{
    var trovato = false;

    table_profili.column(2).data().each(function (value, index) {
        if (parseInt(id_qualificazione) === parseInt(value)) {
            trovato = true;
        }
    });

    if (trovato)
        return true;
    else
        return false;
}

//VERIFICA SE L'ALLEGATO E' GIA' PRESENTE IN LISTA
function controlla_allegato(id_tipo_allegato)
{
    var trovato = false;

    table_allegati.column(1).data().each(function (value, index) {
        if (parseInt(id_tipo_allegato) === parseInt(value)) {
            trovato = true;
        }
    });

    if (trovato)
        return true;
    else
        return false;
}


function elimina_profilo(id_domanda_sep)
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
                url: baseURL + 'ws/candidatura_ajax/elimina_profilo',
                cache: false,
                data: {id_domanda_sep: id_domanda_sep},
                success: function (data) {
                    switch (data) {
                        case true:
                            table_profili.ajax.reload();
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

function elimina_allegato(id_allegato)
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
                url: baseURL + 'ws/candidatura_ajax/elimina_allegato',
                cache: false,
                data: {id_allegato: id_allegato},
                success: function (data) {
                    switch (data) {
                        case true:
                            table_allegati.ajax.reload();
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


function verifica_area_geografica()
{
    if ($('#flag_disp_AV').is(':checked'))
        return true;
    if ($('#flag_disp_BN').is(':checked'))
        return true;
    if ($('#flag_disp_CE').is(':checked'))
        return true;
    if ($('#flag_disp_NA').is(':checked'))
        return true;
    if ($('#flag_disp_SA').is(':checked'))
        return true;
    return false;
}