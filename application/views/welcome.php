<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-8 col-xlg-8 col-md-7">
        <div class="card">
            <div class="card-body">     
                <h3>PROCEDURA DI COMPILAZIONE DELLA DOMANDA</h3>
                <p>
                    Attraverso questa piattaforma è possibile inoltrare la manifestazione di interesse all'iscrizione nell'elenco degli Esperti di Settore Economico Professionale di cui agli artt. 3 e 5 della Deliberazione di G.R. 449 del 12/07/2017 (B.U.R.C. n.62 del 07/08/2017).
                </p>                
                <br>
                <h5>1. REGISTRATI</h5>
                <p class="text-justify">
                    Clicca sul pulsante "Registrati" presente nel box sulla destra.
                </p>
                <p class="text-justify">
                    La registrazione si articola in due fasi:
                </p>
                <ol>
                    <li>Compilazione del modulo di registrazione;</li>
                    <li>Attivazione dell'utenza.</li>
                </ol>
                <p class="text-justify">
                    Nella schermata di registrazione compila la scheda con i dati richiesti (nome, cognome, indirizzo e-mail e password) e conferma.
                    Successivamente riceverai una e-mail all'indirizzo che hai indicato, in cui è riportato un link sul quale dovrai cliccare per confermare la tua registrazione. 
                </p>
                
                    Per eventuali problematiche consultare le FAQ sulla barra in alto della pagina.
                </p>
                <br>
                <h5>2. ACCEDI ALL'AREA RISERVATA E COMPILA LA DOMANDA</h5>    
                <p class="text-justify">
                    Accedi tramite le credenziali scelte in fase di registrazione.
                </p>
                <p class="text-justify">
                    Seleziona "Candidatura" sulla barra in alto e procedi alla compilazione dei campi richiesti nel modulo "Dati Anagrafici".
                </p>
                <p class="text-justify">
                    A salvataggio avvenuto, verrà visualizzata una tabella per aggiungere i Titoli / Qualificazioni / Idoneità per le quali ti stai candidando.
                    E' possibile aggiungere le qualificazioni cliccando sul tasto "Aggiungi qualificazione".
                </p>
                <br>
                <h5>3. ALLEGA I DOCUMENTI</h5>
                <p class="text-justify">
                    Nella sezione "Allegato B - Istanza di candidatura" è possibile scaricare l'allegato B precompilato che dovrai stampare, firmare ed allegare nella sezione "Allegati Domanda".
                </p> 
                <p class="text-justify">
                    E' possibile aggiungere gli allegati cliccando sul tasto "Aggiungi allegato", seleziona il file dal tuo computer e quindi salva. I file da caricare nella piattaforma devono essere in formato PDF e della grandezza massima di 2 MB.                    
                </p>
                <p class="text-justify">Alla domanda dovrà essere allegata la seguente documentazione:</p>
                <ul class="list-icons">
                    <li><i class="ti-angle-right"></i>Allegato B "Esperto di S.E.P. Istanza di candidatura - Autocertificazione" <i>(Generato dal sistema)</i></li>
                    <li><i class="ti-angle-right"></i>Allegato C "Esperto di S.E.P. CV Europass"</li>
                    <li><i class="ti-angle-right"></i>Allegato D "Esperto di S.E.P. Validazione Ordine professionale_Associazione categoria_Dirigente"</li>                    
                    <li><i class="ti-angle-right"></i>Fotocopia del Documento di Identità in corso di validità</li>
                    <li><i class="ti-angle-right"></i>Fotocopia della Tessera Sanitaria in corso di validità riportante il Codice fiscale</li>
                </ul>                
                <br>
                <h5>4. INVIA LA CANDIDATURA</h5>
                <p class="text-justify">
                    Se tutti i dati risultano correttamente caricati potrai inviare la candidatura dalla "Home Page" cliccando il tasto "Invia candidatura".                    
                </p> 
                <p class="text-justify">
                    Comparirà un messaggio per la conferma dell'operazione. 
                </p>
                <p class="text-justify">                    
                    Il sistema assegna una marca temporale alla domanda e ti invia una mail di conferma.
                </p>                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xlg-4 col-md-5">                
        <?php if(isset($this->check_browser)) { ?>
            <?php if($this->check_browser === FALSE) { ?>
            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Verifica compatibilità</h4>
                </div>
                <div class="card-body">      
                    <p class="card-text">Il tuo browser non è compatibile per l'utilizzo della piattaforma.</p>
                    <p class="card-text text-center">
                    <span class="label label-light-danger"><?php echo $this->agent->browser() . ' ' . $this->agent->version(); ?></span>
                    </p>
                    <p class="card-text m-t-10">La piattaforma è utilizzabile a partire dalle seguenti versioni del browser.</p>
                    <table class="table browser m-t-5 no-border">
                        <tbody>
                            <tr>
                                <td style="width:40px"><img src="<?php echo base_url() ?>/assets/themes/adminpress/images/browser/chrome-logo.png" alt=logo /></td>
                                <td>Google Chrome 60 o superiore</td>                                        
                            </tr>
                            <tr>
                                <td><img src="<?php echo base_url() ?>/assets/themes/adminpress/images/browser/firefox-logo.png" alt=logo /></td>
                                <td>Mozila Firefox 58 o superiore</td>
                            </tr>
                            <tr>
                                <td><img src="<?php echo base_url() ?>/assets/themes/adminpress/images/browser/internet-logo.png" alt=logo /></td>
                                <td>Internet Explorer 10 o superiore</td>                                        
                            </tr>
                            <tr>
                                <td><img src="<?php echo base_url() ?>/assets/themes/adminpress/images/browser/internet-logo.png" alt=logo /></td>
                                <td>Microsoft edge 40 o superiore</td>                                        
                            </tr>
                        </tbody>
                    </table>                    
                </div>
            </div>   
            <?php } else { ?>
            <!-- VERIFICA LOGIN -->
            <?php if (!$this->ion_auth->logged_in()) { ?>
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Accedi</h4></div>
                <div class="card-body">                
                    <p class="card-text">Se sei già registrato effettua l'accesso per gestire i tuoi dati.</p>
                    <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-info">Accedi</a>
                </div>
            </div>

            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Registrati</h4></div>
                <div class="card-body">                
                    <p class="card-text">Se non sei in possesso delle credenziali effettua la registrazione.</p>
                    <a href="<?php echo base_url('auth/register_user'); ?>" class="btn btn-danger">Registrati</a>
                </div>
            </div>   
            <?php } else if ($this->ion_auth->in_group(3)) {?>  
            <!-- LOGGATO VISUALIZZO STATO COMPILAZIONE -->            
            <div class="card card-outline-warning">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Stato compilazione</h4></div>
                <div class="card-body text-center"> 
                    <?php if (intval($stato_domanda) === 0) { ?> 
                    <p class="card-text">Compila la domanda utilizzando l'apposita voce che compare sulla barra del menu</p>                    
                    <?php } else if (intval($stato_domanda) === 1) { ?> 
                    <p class="card-text">La tua domanda risulta in compilazione</p>
                    <a id="btn_invia_candidatura" name="btn_invia_candidatura" href='javascript:invia_candidatura()' class="btn btn-warning">Invia candidatura</a>
                    <?php echo form_hidden('id_domanda', $id_domanda); ?>
                    <?php } else {  ?>
                    <p class="card-text">La tua candidatura è stata acquisita il</p>
                    <p class="card-text"><b><?php echo $data_ricezione ?></b></p>
                    <?php }  ?>
                </div>
            </div>             
            
            <?php }  ?>
            <?php }  ?>
        <?php } ?>
        
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Contatti</h4>
            </div>
            <div class="card-body">                
                <small class="text-muted p-t-5 db">Email</small>
                <h6>scrivere@pec.regione.campania.it</h6>                
            </div>
        </div>        


    </div>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->