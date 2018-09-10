/**
 * A Javascript module to loadeding/refreshing options of a select2 list box using ajax based on selection of another select2 list box.
 *
 * @url : https://gist.github.com/ajaxray/187e7c9a00666a7ffff52a8a69b8bf31
 * @auther : Anis Uddin Ahmad <anis.programmer@gmail.com>
 *
 * Live demo - https://codepen.io/ajaxray/full/oBPbQe/
 * w: http://ajaxray.com | t: @ajaxray
 */

var Select2Cascade = (function (window, $) {

    function Select2Cascade(parent, child, url, options) {
        var afterActions = [];
        var std_options = {
            language: "it",
            placeholder: "Seleziona",
            allowClear: true
        };
        options = std_options;
        // Register functions to be called after cascading data loading done
        this.then = function (callback) {
            afterActions.push(callback);
            return this;
        };

        parent.select2(options).on("change", function (e) {

            child.prop("disabled", true);
            var _this = this;

            $.ajax({
                cache: true,
                type: "POST",
                url: url,
                data: "parent_id=" + $(this).val(),
                dataType: 'json',
                success: function (items) {
                    var newOptions = '<option value=""></option>';
                    $.each(items, function (idx, obj) {
                        newOptions += '<option value="' + obj.id + '">' + obj.text + '</option>';
                    });

                    child.select2('destroy').html(newOptions).prop("disabled", false)
                            .select2(options);

                    afterActions.forEach(function (callback) {
                        callback(parent, child, items, options);
                    });

                },
                error: function () {
                    alert('Si sono verificati degli errori nel recupero dei dati.');
                }
            });
        });
    }

    return Select2Cascade;

})(window, $);


function invia_candidatura()
{
    $.ajax({
        type: 'POST',
        url: baseURL + 'ws/candidatura_ajax/verifica_candidatura',
        cache: false,
        data: {"id_domanda": $("input[name='id_domanda']").val()},
        success: function (data) {
            //VERIFICA SE TUTTO OK PER L'INVIO
            var err_allega = "";            
            var err_profili = "";
            console.log(data);
            if (data.procedi === false) {
                if (parseInt(data.n_allegati) < 4) {
                    err_allega = "- Non tutti gli allegati richiesti sono stati caricati\n";
                }               
                if (parseInt(data.n_profili) === 0) {
                    err_profili = "- Candidarsi almeno su un repertorio\n";
                }

                swal({
                    title: "Impossibile inviare",
                    text: "La domanda risulta incompleta:\n\n" + err_allega + err_profili,
                    type: "error"
                });
            } else {
                swal({
                    title: "Sei sicuro?",
                    text: "Prima di procedere assicurati che tutti i dati inseriti siano corretti.\n Inviando la candidatura non sarà più possibile modificarla.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        //INVIA CANDIDATURA											
                        $.ajax({
                            type: 'POST',
                            url: baseURL + 'ws/candidatura_ajax/invia_candidatura',
                            cache: false,
                            data: {"id_domanda": $("input[name='id_domanda']").val()},
                            success: function (data) {
                                switch (data) {
                                    case true:
                                        swal({
                                            title: "Domanda inviata",
                                            text: "la tua candidatura è stata acquisita correttamente.",
                                            type: "success"
                                        }, function () {
                                            window.location.href = baseURL;
                                        });
                                        break;
                                    default:
                                        swal('Attenzione', 'Si sono verificati errori nell\'invio della candidatura\nVerificare i dati inseriti e riprovare.', 'error');
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
        },
        error: function () {
            swal("Attenzione", "Si sono verificati degli errori nel salvataggio dei dati", "error");
        }
    });




}