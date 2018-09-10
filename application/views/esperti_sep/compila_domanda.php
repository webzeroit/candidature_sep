<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- SALVA DOMANDA -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">1. Dati Anagrafici</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_domanda_esep" novalidate'); ?>
                    <div class="row p-t-10">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Codice Fiscale <span class="text-danger">*</span></label>
                                    <input type="text" id="codice_fiscale" name="codice_fiscale"  maxlength="16"                                          
                                           class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"
                                           data-validation-regex-regex="([A-Za-z]{6}[0-9lmnpqrstuvLMNPQRSTUV]{2}[abcdehlmprstABCDEHLMPRST]{1}[0-9lmnpqrstuvLMNPQRSTUV]{2}[A-Za-z]{1}[0-9lmnpqrstuvLMNPQRSTUV]{3}[A-Za-z]{1})" 
                                           data-validation-regex-message="<?php echo lang('validator_cf_field') ?>" >                                           
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Nome <span class="text-danger">*</span></label>
                                    <input type="text" id="nome" name="nome" maxlength="255"  
                                           class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Cognome <span class="text-danger">*</span></label>
                                    <input type="text" id="cognome" name="cognome" maxlength="255"
                                           class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                                </div>
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Sesso <span class="text-danger">*</span></label>
                                    <select name="sesso" id="sesso" class="form-control" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">>
                                        <option value=""></option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Data di nascita <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="data_nascita" name="data_nascita" class="form-control mydatepicker" required 
                                               data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                                        <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Provincia di nascita <span class="text-danger">*</span></label>
                                    <select id="provincia_nascita" name="provincia_nascita" class="select2 form-control custom-select" style="width: 100%; height:36px;" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value="">Tutte</option>
                                        <?php
                                        foreach ($province as $provincia)
                                        {
                                            ?>
                                            <option value="<?= $provincia['id'] ?>"><?= $provincia['text'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <small>Per i nati all'estero digitare <b>Estero</b></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Comune di nascita <span class="text-danger">*</span></label>
                                    <select id="comune_nascita" name="comune_nascita" class="select2 form-control custom-select" style="width: 100%"  required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value="">Tutte</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Indirizzo di residenza <span class="text-danger">*</span></label>
                                    <input type="text" id="residenza_indirizzo" name="residenza_indirizzo" maxlength="255" 
                                           class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Provincia di residenza <span class="text-danger">*</span></label>
                                    <select id="provincia_residenza" name="provincia_residenza" class="select2 form-control custom-select" style="width: 100%; height:36px;" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value="">Tutte</option>
                                        <?php
                                        foreach ($province as $provincia)
                                        {
                                            ?>
                                            <option value="<?= $provincia['id'] ?>"><?= $provincia['text'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Comune di residenza <span class="text-danger">*</span></label>
                                    <select id="comune_residenza" name="comune_residenza" class="select2 form-control custom-select" style="width: 100%" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value="">Tutte</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Telefono</label>
                                <input type="text" id="telefono" name="telefono" maxlength="50" class="form-control"> 
                            </div>
                        </div>   
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Cellulare <span class="text-danger">*</span></label>
                                    <input type="text" id="cellulare" name="cellulare" maxlength="50" class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                </div>
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">PEC <span class="text-danger">*</span></label>
                                    <input type="email" id="pec" name="pec" maxlength="150"
                                           class="form-control" required 
                                           data-validation-required-message="<?php echo lang('validator_required_field') ?>"
                                           data-validation-email-message="<?php echo lang('validator_email_field') ?>">
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Area geografica coperta <span class="text-danger">*</span></label>
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="flag_disp_AV" value="1" name="flag_disp_AV" class="filled-in chk-col-light-blue" />
                                    <label for="flag_disp_AV">Avellino</label>
                                    <input type="checkbox" id="flag_disp_BN" value="1" name="flag_disp_BN" class="filled-in chk-col-light-blue" />
                                    <label for="flag_disp_BN">Benevento</label>
                                    <input type="checkbox" id="flag_disp_CE" value="1" name="flag_disp_CE" class="filled-in chk-col-light-blue" />
                                    <label for="flag_disp_CE">Caserta</label>
                                    <input type="checkbox" id="flag_disp_NA" value="1" name="flag_disp_NA" class="filled-in chk-col-light-blue" />
                                    <label for="flag_disp_NA">Napoli</label>
                                    <input type="checkbox" id="flag_disp_SA" value="1" name="flag_disp_SA" class="filled-in chk-col-light-blue" />
                                    <label for="flag_disp_SA">Salerno</label>
                                </div> 
                                <small>Selezionare almeno una provincia</small>
                            </div>
                        </div>   
                    </div>                   
                    <div class="form-actions">
                        <button id="btn_salva_domanda" name="btn_salva_domanda" type="submit" class="btn btn-info">Salva</button>                        
                    </div>   
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php echo form_hidden('action', $action); ?>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SALVA PROFILO -->
<div id="div_salva_profilo_domanda_esep" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-warning">
            <div class="card-header">
                <h4 class="m-b-0 text-white">2.1 Scelta profilo</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_profilo_domanda_esep" novalidate'); ?>
                    <div class="row p-t-10">                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">S.E.P <span class="text-danger">*</span></label>
                                    <select id="id_sep" name="id_sep" class="select2 form-control custom-select" style="width: 100%; height:36px;" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value=""></option>
                                        <?php
                                        foreach ($lista_sep as $sep)
                                        {
                                            ?>
                                            <option value="<?= $sep['id'] ?>"><?= $sep['text'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Qualificazione <span class="text-danger">*</span></label>
                                    <select id="id_profilo" name="id_profilo" class="select2 form-control custom-select" style="width: 100%" required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value="">Tutte</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Sintesi dell'esperienza professionale, di almeno 5 anni, inerente la qualificazione selezionata negli ultimi 10 anni <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="10" id="sintesi_esperienza" name="sintesi_esperienza" maxlength="4000" class="form-control"required 
                                            data-validation-required-message="<?php echo lang('validator_required_field') ?>"></textarea>
                                    <small>Max. 4000 caratteri</small>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-actions">
                        <button id="btn_salva_profilo" name="btn_salva_profilo" type="submit" class="btn btn-info">Salva</button>  
                        <button type="button" id="btn_chiudi_profilo" class="btn btn-inverse">Chiudi</button>   
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
<div id="tabella_profilo_domanda_esep" class="row m-t-10">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">2. Elenco qualificazioni </h4>
            </div>            
            <div class="card-body">                
                <div class="table-responsive">
                    <table id="dtbl_profilo_domanda" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id_domanda_sep</th>
                                <th>id_domanda</th>
                                <th>id_profilo</th>
                                <th>Profilo</th>
                                <th>Sintesi Esperienza</th>
                                <th>Azione</th> 
                            </tr>                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="button-group">                    
                    <button id="btn_add_profilo_domanda_esep" name="btn_add_profilo_domanda_esep" class="btn btn-info">Aggiungi qualificazione</button>      
                </div>                
            </div>
        </div>
    </div>
</div>


<div id="div_allegato_B" class="row m-t-10">
    <div class="col-lg-12">
        <!-- Card Download Allegato B-->
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">3. Allegato B - Istanza di candidatura</h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">Scarica l'allegato B precompilato</h4>
                <p class="card-text">Prima di scaricare il file assicurarsi di aver compilato tutti i dati anagrafici ed aver selezionalto le qualificazioni d'interesse.</p>
                <a href="<?php echo base_url(); ?>candidatura/genera_pdf_allegato_B" target='_blank' class="btn btn-outline-info"><i class="fa fa-file-pdf-o"></i> Scarica Allegato B</a>
            </div>
        </div>
        <!-- Card -->
    </div>
</div>

<!-- SALVA ALLEGATO -->
<div id="div_salva_allegato_domanda_esep" class="row">
    <div class="col-lg-12">
        <div class="card card-outline-warning">
            <div class="card-header">
                <h4 class="m-b-0 text-white">4.1 Allegato</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <?php echo form_open('', 'id="frm_allegato_domanda_esep" novalidate'); ?>
                    <div class="row p-t-10">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Tipologia allegato <span class="text-danger">*</span></label>
                                    <select id="id_tipo_allegato_esep" name="id_tipo_allegato_esep" class="select2 form-control custom-select" style="width: 100%; height:36px;" 
                                            required data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <option value=""></option>
                                        <?php
                                        foreach ($tipo_allegati as $tipo_allegato)
                                        {
                                            ?>
                                            <option value="<?= $tipo_allegato['id'] ?>"><?= $tipo_allegato['text'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>                                                
                    </div>                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label class="control-label">Carica allegato <span class="text-danger">*</span></label>
                                    <label class="custom-file d-block">
                                        <input type="file" id="file_allegato_domanda" name="file_allegato_domanda" class="custom-file-input" required 
                                               data-validation-required-message="<?php echo lang('validator_required_field') ?>">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                            </div>
                        </div> 
                    </div>                     
                    <div class="form-actions">
                        <button id="btn_salva_allegato" name="btn_salva_allegato" type="submit" class="btn btn-info">Salva</button>  
                        <button type="button" id="btn_chiudi_allegato" class="btn btn-inverse">Chiudi</button>   
                    </div>
                    <!-- HIDDEN FIELD-->
                    <?php echo form_hidden('id_allegato', 0); ?>
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TABELLA ALLEGATI-->
<div id="tabella_allegati_domanda_esep" class="row m-t-10">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">4. Allegati domanda</h4>
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
                <div class="button-group">                    
                    <button id="btn_add_allegato_domanda_esep" name="btn_add_allegato_domanda_esep" class="btn btn-info">Aggiungi allegato</button>      
                </div>                
            </div>
        </div>
    </div>
</div>


