<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- SALVA DOMANDA -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Dati Anagrafici</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_istruttoria_domanda_esep" novalidate'); ?>
                    <div class="row p-t-10">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Codice Fiscale</label>
                                    <input type="text" id="codice_fiscale" name="codice_fiscale"  maxlength="16" class="form-control" readonly>                                           
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Nome</label>
                                    <input type="text" id="nome" name="nome" maxlength="255" class="form-control" readonly> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Cognome</label>
                                    <input type="text" id="cognome" name="cognome" maxlength="255" class="form-control" readonly> 
                                </div>
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Sesso <span class="text-danger">*</span></label>
                                    <input type="text" id="sesso" name="sesso" class="form-control" readonly> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Data di nascita</label>
                                    <input type="text" id="data_nascita" name="data_nascita" class="form-control" readonly> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Provincia di nascita</label>
                                    <input type="text" id="des_provincia_nascita" name="des_provincia_nascita" class="form-control" readonly>                                     
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Comune di nascita</label>
                                    <input type="text" id="des_comune_nascita" name="des_comune_nascita" class="form-control" readonly>                                     
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Indirizzo di residenza</label>
                                    <input type="text" id="residenza_indirizzo" name="residenza_indirizzo" maxlength="255" class="form-control" readonly> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Provincia di residenza</label>
                                    <input type="text" id="des_provincia_residenza" name="des_provincia_residenza" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Comune di residenza</label>
                                    <input type="text" id="des_comune_residenza" name="des_comune_residenza" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Telefono</label>
                                <input type="text" id="telefono" name="telefono" maxlength="50" class="form-control" readonly> 
                            </div>
                        </div>   
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Cellulare</label>
                                <input type="text" id="cellulare" name="cellulare" maxlength="50" class="form-control" readonly>
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">PEC</label>
                                    <input type="text" id="pec" name="pec" maxlength="50" class="form-control" readonly>                                    
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Data Ricezione</label>
                                <input type="text" id="data_ricezione" name="data_ricezione" maxlength="20" class="form-control" readonly>
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Area geografica coperta</label>
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="flag_disp_AV" value="1" name="flag_disp_AV" class="filled-in chk-col-light-blue" disabled />
                                    <label for="flag_disp_AV">Avellino</label>
                                    <input type="checkbox" id="flag_disp_BN" value="1" name="flag_disp_BN" class="filled-in chk-col-light-blue" disabled/>
                                    <label for="flag_disp_BN">Benevento</label>
                                    <input type="checkbox" id="flag_disp_CE" value="1" name="flag_disp_CE" class="filled-in chk-col-light-blue" disabled/>
                                    <label for="flag_disp_CE">Caserta</label>
                                    <input type="checkbox" id="flag_disp_NA" value="1" name="flag_disp_NA" class="filled-in chk-col-light-blue" disabled/>
                                    <label for="flag_disp_NA">Napoli</label>
                                    <input type="checkbox" id="flag_disp_SA" value="1" name="flag_disp_SA" class="filled-in chk-col-light-blue" disabled/>
                                    <label for="flag_disp_SA">Salerno</label>
                                </div> 
                            </div>
                        </div>   
                    </div>                    
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>                    
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- TABELLA ALLEGATI-->
<div id="tabella_allegati_domanda_esep" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-inverse">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Allegati domanda</h4>
            </div>            
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="dtbl_allegati_domanda" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id_allegato</th>
                                <th>id_tipo_allegato_esep</th>
                                <th>Descrizione</th>
                                <th>id_domanda</th>                                
                                <th>path_file</th>    
                                <th>Data caricamento</th>
                                <th>Azione</th> 
                            </tr>                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>                             
            </div>
        </div>
    </div>
</div>



<!-- SALVA PROFESSIONALITA-->
<div id="div_salva_professionalita" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-warning">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Istruzione, Formazione e Lavoro del candidato</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_professionalita_esep" novalidate'); ?>
                    <div class="row p-t-10">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Descrizione <span class="text-danger">*</span></label>
                                    <select id="id_professionalita" name="id_professionalita" class="select2 form-control custom-select" 
                                            style="width: 100%; height:36px;" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value=""></option>
                                        <?php
                                        foreach ($professionalita as $elemento)
                                        {
                                            ?>
                                            <option value="<?= $elemento['id'] ?>"><?= $elemento['text'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Specifica</label>
                                    <input type="text" id="des_specifica_professionalita" name="des_specifica_professionalita" maxlength="255" class="form-control"> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Livello EQF</label>
                                    <input type="number" min="1" max="8" id="livello_EQF_professionalita" name="livello_EQF_professionalita" maxlength="1" class="form-control"
                                           data-validation-number-message="<?php echo lang('validator_numeric_field') ?>"> 
                                </div>
                            </div>
                        </div>                            
                    </div>  
                    <div class="form-actions">
                        <button id="btn_salva_professionalita" name="btn_salva_professionalita" type="submit" class="btn btn-info">Salva</button>  
                        <button type="button" id="btn_chiudi_professionalita" class="btn btn-inverse">Chiudi</button>   
                    </div>
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_professionalita_domanda', 0); ?>
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TABELLA PROFESSIONALITA-->
<div id="tabella_professionalita_studio" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Istruzione, Formazione e Lavoro del candidato</h4>
            </div>            
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="dtbl_professionalita" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id_professionalita_domanda</th>
                                <th>id_domanda</th>
                                <th>id_professionalita</th>
                                <th>Descrizione</th>
                                <th>Specifica</th>
                                <th>Livello EQF</th>
                                <th>Azione</th> 
                            </tr>                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="button-group">                    
                    <button id="btn_add_professionalita" name="btn_add_professionalita" class="btn btn-info">Aggiungi</button>      
                </div>                
            </div>
        </div>
    </div>
</div>

<!-- SALVA ISTRUTTORIA PROFILO -->
<div id="div_salva_istr_profilo_domanda_esep" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-warning">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Istruttoria profilo</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_istr_profilo_domanda_esep" novalidate'); ?>
                    <div class="row p-t-10">                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">S.E.P</label>
                                    <input type="text" id="des_sep" name="des_sep" class="form-control" readonly>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Qualificazione</label>
                                    <input type="text" id="titolo_profilo" name="titolo_profilo" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Livello EQF</label>
                                    <input type="number" min="0" max="8" id="livello_EQF_profilo" name="livello_EQF_profilo" maxlength="1" class="form-control" readonly> 
                                </div>
                            </div>                            
                        </div>                           
                    </div>                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Sintesi dell'esperienza professionale, di almeno 5 anni, inerente la qualificazione selezionata negli ultimi 10 anni</label>
                                    <textarea class="form-control" rows="10" id="sintesi_esperienza" name="sintesi_esperienza" maxlength="4000" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                     
                    <div class="row">                         
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="flag_5_anni_esperienza" value="1" name="flag_5_anni_esperienza" class="filled-in chk-col-light-blue" />
                                    <label for="flag_5_anni_esperienza">Esperienza formativa e professionale pari ad almeno 5 anni</label>
                                    <br/>
                                    <input type="checkbox" id="flag_coerenza_attiviata" value="1" name="flag_coerenza_attiviata" class="filled-in chk-col-light-blue" />
                                    <label for="flag_coerenza_attiviata">Coerenza con le attività svolte o supervisionate</label>
                                    <br/>
                                    <input type="checkbox" id="flag_attestazione" value="1" name="flag_attestazione" class="filled-in chk-col-light-blue" />
                                    <label for="flag_attestazione">Candidatura avallata da Ordine Professionale / Associazione di Categoria</label>
                                    <br/>
                                    <input type="checkbox" id="flag_possesso_qualificazione" value="1" name="flag_possesso_qualificazione" class="filled-in chk-col-light-blue" />
                                    <label for="flag_possesso_qualificazione">Il candidato è in possesso di qualificazione specifica</label>
                                </div> 
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Note</label>
                                    <textarea class="form-control" rows="5" id="note" name="note" maxlength="4000" class="form-control"></textarea>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <div class="controls">
                                    <label class="control-label ">Esito valutazione <span class="text-danger">*</span></label>
                                    <select name="esito_valutazione" id="esito_valutazione" class="form-control custom-select" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">>
                                        <option value=""></option>
                                        <option value="0">Negativo</option>
                                        <option value="1">Positivo</option>
                                        <option value="2">Sospesa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-actions">
                        <button id="btn_salva_istr_profilo" name="btn_salva_istr_profilo" type="submit" class="btn btn-info">Salva</button>  
                        <button type="button" id="btn_chiudi_istr_profilo" name="btn_chiudi_istr_profilo" class="btn btn-inverse">Chiudi</button>   
                    </div>
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_domanda_sep', 0); ?>
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TABELLA PROFILI-->
<div id="tabella_istr_profilo_domanda_esep" class="row m-t-10">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Elenco qualificazioni </h4>
            </div>            
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="dtbl_istr_profilo_domanda" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id_domanda_sep</th>
                                <th>id_domanda</th>
                                <th>id_profilo</th>
                                <th>Profilo</th>
                                <th>Esito valutazione</th>
                                <th>Note</th>
                                <th>Azione</th> 
                            </tr>                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>              
            </div>
        </div>
    </div>
</div>


<!-- ESITO VALUTAZIONE -->
<!-- SALVA PROFESSIONALITA-->
<div id="div_esito_istruttoria" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Esito verifica</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_esito_istruttoria_esep" novalidate'); ?>
                    <div class="row p-t-10">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Esito <span class="text-danger">*</span></label>
                                    <select name="id_esito_domanda_esep" id="id_esito_domanda_esep" class="form-control custom-select" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">>
                                        <option value=""></option>
                                        <?php
                                        foreach ($esiti as $esito)
                                        {
                                            ?>
                                            <option value="<?= $esito['id'] ?>"><?= $esito['text'] ?></option>
                                            <?php
                                        }
                                        ?>                                       
                                    </select>                                    
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Data <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="data_istruttoria" name="data_istruttoria" class="form-control mydatepicker" required 
                                               data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                                        <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Note</label>
                                    <textarea class="form-control" rows="5" id="note_istruttoria" name="note_istruttoria" maxlength="4000" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>                                                  
                    </div>  
                    <div class="form-actions">
                        <button id="btn_salva_istruttoria" name="btn_salva_istruttoria" type="submit" class="btn btn-info">Salva</button>                          
                    </div>
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>