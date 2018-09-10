<p style="text-align: right;"><strong><em>Esperto di S.E.P._Istanza di candidatura<br/>Allegato B</em></strong></p>
<div style="text-align:center;background-color:#DDDDDD">
    <strong>MANIFESTAZIONE DI INTERESSE ISCRIZIONE NELL'ELENCO<br/>ESPERTI DI SETTORE ECONOMICO PROFESSIONALE</strong>
</div>

<p style="text-align: right;"><em>Spett.le Regione Campania &ndash; Direzione Generale<br/>per la Formazione, l'Istruzione, il Lavoro e le Politiche Giovanili - DG11</em></p>
<p style="text-align: right;"><em>PEC: scrivere@pec.regione.campania.it</em></p>
<br/>
<p style="text-align: center;">DICHIARAZIONE SOSTITUTIVA<br/>(artt. 46 e 47 D.P.R. n.445/2000)</p>
<br/>
<p style="text-align: justify;">
    Il/La sottoscritto/a <strong><?php echo $domanda_sep['cognome'] . ' ' . $domanda_sep['nome'] ?></strong> 
    nato/a il <strong><?php echo $domanda_sep['data_nascita'] ?></strong> 
    Comune <strong><?php echo $domanda_sep['des_comune_nascita'] ?></strong>  
    Prov. <strong><?php echo $domanda_sep['sigla_provincia_nascita'] ?></strong> 
    Codice fiscale <strong><?php echo $domanda_sep['codice_fiscale'] ?></strong> 
    residente nel Comune di <strong><?php echo $domanda_sep['des_comune_residenza'] ?></strong>  
    Prov. <strong><?php echo $domanda_sep['sigla_provincia_residenza'] ?></strong> 
    indirizzo <strong><?php echo $domanda_sep['residenza_indirizzo'] ?></strong>     
    tel.fisso <strong><?php echo $domanda_sep['telefono'] ?></strong>
    cell. <strong><?php echo $domanda_sep['cellulare'] ?></strong>     
    Posta Elettronica Certificata (PEC) <strong><?php echo $domanda_sep['pec'] ?></strong>  
    (presso cui elegge domicilio) identificato/a con Documento di riconoscimento allegato in copia alla presente,</p>
<p style="text-align: center;"><strong>PRESENTA</strong></p>
<p>la propria Manifestazione di Interesse per l'iscrizione nell'Elenco degli Esperti di Settore Economico Professionale (SEP) di cui agli artt. 3 e 5 della Deliberazione di G.R. 449 del 12/07/2017 (B.U.R.C. n.62 del 07/08/2017 per il Titolo/Qualificazione/Idoneit&agrave; riferito/i a (massimale pari a cinque):</p>
<table cellspacing="0" cellpadding="3" border="1">
    <tbody>
        <tr style="background-color:#DDDDDD;">
            <td width="10%" align="center">N. PROGR</td>
            <td width="40%" align="center">DENOMINAZIONE S.E.P. / A.E.P.</td>
            <td width="50%" align="center">DENOMINAZIONE QUALIFICAZIONE / IDONEITA'</td>
        </tr>
        <?php 
            if (!empty($domanda_profili)){
            $i = 1;
            foreach ($domanda_profili as $profili){ ?>

        <tr>           
            <td style="text-align: center;"><?php echo $i; ?></td>
            <td><?php echo $profili['tag_sep'] . ' ' . $profili['des_sep']; ?></td>
            <td><?php echo $profili['titolo_profilo']; ?></td>
        </tr>
        <?php  
            $i++;         
            }
            }
        ?>                
    </tbody>
</table>
<p>Ai fini dell'erogazione dell'attivit&agrave;, si richiede di operare presso le Province del territorio regionale, come segue :</p>
<ul>
    <?php if ($domanda_sep['flag_disp_AV'] === "1"){ ?>
        <li>AVELLINO</li>
    <?php } ?>
    <?php if ($domanda_sep['flag_disp_BN'] === "1") { ?>
        <li>BENEVENTO</li>
    <?php } ?>    
    <?php if ($domanda_sep['flag_disp_CE'] === "1"){ ?>
        <li>CASERTA</li>
    <?php } ?>      
    <?php if ($domanda_sep['flag_disp_NA'] === "1"){ ?>
        <li>NAPOLI</li>
    <?php } ?>     
    <?php if ($domanda_sep['flag_disp_SA'] === "1"){ ?>
        <li>SALERNO</li>
    <?php } ?>     


</ul>
<p>A tal uopo, consapevole delle sanzioni penali, nel caso di dichiarazioni non veritiere, di formazione o uso di atti falsi, richiamate dall&rsquo;art. 76 del D.P.R. n.445/2000</p>
<p style="text-align: center;"><strong>DICHIARA DI</strong></p>
<ol style="list-style-type: lower-alpha;">
    <li>essere in possesso di coerente esperienza formativa e professionale nello specifico Titolo/Qualificazione/Idoneit&agrave; di riferimento, pari ad almeno cinque (5) anni di esperienza esercitata anche non continuativamente negli ultimi dieci (10) anni;</li>
    <li>aver ricoperto o supervisionato ruoli professionali riconducibili ad uno o pi&ugrave; percorsi formativi coerenti e svolto o supervisionato le attivit&agrave; che esse prevedono;</li>
    <li>possedere un livello di professionalit&agrave; EQF almeno pari al Titolo/Qualificazione/Idoneit&agrave; da valutare e coerente ai contenuti curricolari e professionali oggetto di valutazione;</li>
    <li>essere in possesso, se del caso, dell'Attestato di Validazione dell'Ordine professionale / Associazione categoria o del Dirigente di Pubblica Amministrazione necessario a ricoprire il ruolo;</li>
    <li>non trovarsi nelle situazioni prescritte dalla lett. a) alla lettera f), comma 1, art.7 del D.Lgs. 31 dicembre 2012 n.235 (ex art.7 &ndash; Incompatibilit&agrave; &ndash; DGR 449/2017);</li>
    <li>non trovarsi in situazioni di incompatibilit&agrave; o conflitto di interesse che ostino, ai sensi della normativa vigente, all'espletamento dell'incarico anzidetto (ex art.7 &ndash; Incompatibilit&agrave; &ndash; DGR 449/2017);</li>
    <li>essere disposto a frequentare percorsi/seminari formativi presso le sedi istituzionali rese disponibili da Regione Campania &ndash; DG 11;</li>
    <li>accettare senza condizione o riserva alcuna tutte le norme e disposizioni contenute nell&rsquo;Avviso;</li>
    <li>non avere riportato condanne penali e non avere procedimenti penali pendenti;</li>
    <li>non aver subito condanne con sentenze passate in giudicato, per qualsiasi reato che incida sulla propria moralit&agrave; professionale, o per delitti finanziari;</li>
    <li>non essere mai incorso in provvedimenti che comportano l&rsquo;incapacit&agrave; a contrattare con la Pubblica Amministrazione;</li>
    <li>essere informato, ai sensi della vigente normativa in materia di protezione dei dati personali, che i dati personali raccolti saranno trattati, anche con strumenti informatici, esclusivamente nell&rsquo;ambito del procedimento per il quale la presente dichiarazione viene resa.</li>
</ol>
<p>Si allega alla presente:</p>
<ol>
    <li>Allegato C "Esperto di S.E.P._CV Europass";</li>
    <li>Allegato D "Esperto di S.E.P._Validazione Ordine professionale_Associazione categoria_Dirigente";</li>
    <li>Fotocopia del Documento di Identit&agrave; in corso di validit&agrave;;</li>
    <li>Fotocopia della Tessera Sanitaria in corso di validit&agrave; riportante il Codice fiscale.</li>
</ol>

<p><em>Il/La sottoscritto/a autorizza al trattamento dei dati personali ai sensi del D.Lgs. n.196/2003 e ss.mm.ii.</em></p>

<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td><p>___________________li, __________ </p></td>
        <td align="center"><p>Il/La Dichiarante</p><br><p>___________________________________</p></td>
    </tr>
</table>


<p><em>A scopo informativo, si elencano di seguito:</em></p>
<p><em>I Ventiquattro (24) Settori Economico Professionali (S.E.P.) in cui &egrave; ripartito il Repertorio regionale ex D.G.R. 223/2014 in coerenza all'Accordo Stato Regioni del 27/07/2011 e successivo Decreto I.M. (M.L.P.S. - M.I.U.R.). In ognuno &egrave;/sono incardinato-i il/i Titolo-i/Qualificazione-i prescelto-i dal candidato come consultabile-i sul sito istituzionale della Regione Campania &ndash; Home Page &ndash; Utilit&agrave; &ndash; Repertorio Qualificazioni.</em></p>
<ul>
    <li><em>AGRICOLTURA, SILVICOLTURA E PESCA</em></li>
    <li><em>PRODUZIONI ALIMENTARI</em></li>
    <li><em>ESTRAZIONE GAS, PETROLIO, CARBONE, MINERALI E LAVORAZIONE PIETRE</em></li>
    <li><em>CHIMICA</em></li>
    <li><em>VETRO, CERAMICA E MATERIALI DA COSTRUZIONE</em></li>
    <li><em>MECCANICA, PRODUZIONE E MANUTENZIONE DI MACCHINE, IMPIANTISTICA</em></li>
    <li><em>TESSILE-ABBIGLIAMENTO E PRODOTTI AFFINI</em></li>
    <li><em>LEGNO E ARREDO</em></li>
    <li><em>CARTA E CARTOTECNICA</em></li>
    <li><em>EDILIZIA</em></li>
    <li><em>STAMPA ED EDITORIA</em></li>
    <li><em>TRASPORTI</em></li>
    <li><em>SERVIZI DI PUBLIC UTILITIES</em></li>
    <li><em>SERVIZI FINANZIARI E ASSICURATIVI</em></li>
    <li><em>SERVIZI DI INFORMATICA</em></li>
    <li><em>SERVIZI DI TELECOMUNICAZIONE E POSTE</em></li>
    <li><em>SERVIZI DI DISTRIBUZIONE COMMERCIALE</em></li>
    <li><em>SERVIZI TURISTICI</em></li>
    <li><em>SERVIZI CULTURALI E DI SPETTACOLO</em></li>
    <li><em>SERVIZI PER LE ATTIVITA&rsquo; RICREATIVE E SPORTIVE</em></li>
    <li><em>SERVI SOCIO-SANITARI</em></li>
    <li><em>SERVIZI DI EDUCAZIONE E FORMAZIONE</em></li>
    <li><em>SERVIZI ALLA PERSONA</em></li>
    <li><em>AREA COMUNE (INCLUSIVA DEI SERVIZI ALLE IMPRESE)</em></li>
</ul>
<p><em>Le</em><em>&nbsp;Tre (3) Aree Economico Professionali (A.E.P.)&nbsp;</em><em>in cui &egrave; ripartito il Catalogo regionale per il rilascio di Idoneit&agrave; ex D.G.R.&nbsp;</em><em>45/2005 e ss.mm.ii..&nbsp;</em><em>In ognuno &egrave;/sono incardinata/e le Idoneit&agrave; prescelta-e dal candidato come consultabile-i sul sito istituzionale della Regione Campania &ndash; Home Page &ndash; Utilit&agrave; &ndash; BURC &ndash; Archivio.</em></p>
<ul>
    <li><em>SERVIZI</em></li>
    <li><em>PRODUZIONE</em></li>
    <li><em>TRASVERSALE</em></li>
</ul>