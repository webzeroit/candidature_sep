<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--RICERCA-->
<div id="form-filter-div" class="row" style="display:none;">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Ricerca </h4>               
            </div>
            <div class="card-body">
                <form id="form-filter" novalidate>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nome</label>
                                    <input type="text" id="nome" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Cognome</label>
                                    <input type="text" id="cognome" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Sesso</label>
                                    <select id="sesso" class="form-control custom-select">
                                        <option value=""></option>
                                        <option value="M">Maschio</option>
                                        <option value="F">Femmina</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Data di nascita</label>
                                    <div class="input-group">
                                        <input type="text" id="data_nascita" class="form-control mydatepicker">
                                        <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>                        
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Provincia residenza</label>
                                    <select id="provincia_residenza" class="select2 form-control custom-select" style="width: 100%; height:36px;" placeholder="Seleziona la provincia">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Comune residenza</label>
                                    <select id="comune_residenza" class="select2 m-b-10 select2-multiple" style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Area geografica coperta</label>
                                    <select id="area_geografica" class="form-control custom-select">
                                        <option value=""></option>
                                        <option value="AV">Avellino</option>
                                        <option value="BN">Benevento</option>
                                        <option value="CE">Caserta</option>
                                        <option value="NA">Napoli</option>
                                        <option value="SA">Salerno</option>
                                    </select>
                                </div>
                            </div>                                                                                  
                        </div>                     
                        <div class="row">                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label class="control-label">S.E.P</label>
                                        <select id="id_sep" name="id_sep" class="select2 form-control custom-select" style="width: 100%; height:36px;">
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
                                        <label class="control-label">Qualificazione</label>
                                        <select id="id_profilo" name="id_profilo" class="select2 form-control custom-select" style="width: 100%">
                                            <option value="">Tutte</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="form-actions">
                        <button type="button" id="btn-filter" class="btn btn-info"><i class="fa fa-search"></i> Cerca</button>
                        <button type="button" id="btn-reset" class="btn btn-inverse">Chiudi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--TABELLA-->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Elenco Domande</h4>               
            </div>            
            <div class="card-body">
                <div class="table-responsive m-t-10 m-b-40">
                    <table id="dtbl_esperti_sep" class="display table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codice Fiscale</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Data Nascita</th>
                                <th>Sesso</th>  
                                <th>id_comune_nascita</th>
                                <th>des_comune_nascita</th>
                                <th>istat_provincia_nascita</th>
                                <th>des_provincia_nascita</th>                     
                                <th>sigla_provincia_nascita</th>
                                <th>residenza_indirizzo</th>
                                <th>id_comune_residenza</th>
                                <th>des_comune_residenza</th>
                                <th>istat_provincia_residenza</th>
                                <th>des_provincia_residenza</th>
                                <th>sigla_provincia_residenza</th>
                                <th>telefono</th>
                                <th>cellulare</th>
                                <th>pec</th>
                                <th>data_ricezione</th>
                                <th>flag_disp_AV</th>
                                <th>flag_disp_BN</th>
                                <th>flag_disp_CE</th>
                                <th>flag_disp_NA</th>
                                <th>flag_disp_SA</th>
                                <th>flag_ultima_domanda</th>
                                <th>id_stato_domanda_esep</th>
                                <th>Stato</th>
                                <th>note</th>                                
                                <th>Azione</th> 
                            </tr>                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="button-group">
                    <button id="ricerca" name="ricerca" class="btn btn-info">Ricerca avanzata</button>      
                </div>                
            </div>
        </div>
    </div>
</div>