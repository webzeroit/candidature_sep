<html>
    <body>
        <p>
            Gentile utente,<br/>
            <?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
        <br/>    
        <br/>    
        <br/>        
        <hr/>
        <p>
            <b>ATTENZIONE</b>   
            <br/> 
            <small>
                Questo messaggio e' stato inviato per conto di Regione Campania da un indirizzo non abilitato a ricevere e‑mail. 
                Qualora non fosse il destinatario si prega di non rispondere alla presente ma di informarci immediatamente 
                all'indirizzo scrivere@pec.regione.campania.it ed eliminare il messaggio, 
                con gli eventuali allegati, senza trattenerne copia. Qualsiasi utilizzo non autorizzato 
                del contenuto di questo messaggio costituisce violazione dell'obbligo di non prendere 
                cognizione della corrispondenza tra altri soggetti, salvo più grave illecito, ed espone 
                il responsabile alle relative conseguenze civili e penali.
            </small>
        </p>
    </body>
</html>