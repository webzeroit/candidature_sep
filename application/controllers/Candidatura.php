<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Candidatura Esperti Sep.
 */

class Candidatura extends MY_Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comuni_model', 'comuni');
        $this->output->set_template('adminpress');
        $this->output->set_title('Candidatura Esperti SEP');
    }

    public function index()
    {
        
    }

    public function compila_domanda()
    {
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $esperto_sep = $this->esperti_sep->leggi_candidatura();
        $this->load->js('assets/themes/adminpress/js/esperti_sep/compila_domanda.js');
        $this->output->set_page_title('Compila candidatura esperto S.E.P');
        if ($esperto_sep === FALSE)
        {
            $this->output->set_page_title('Nuova candidatura esperto SEP');
            $data['province'] = $this->comuni->lista_province();
            $data['action'] = "add";
            $data['id_domanda'] = 0;
            $this->load->view('esperti_sep/compila_domanda', $data);
        }
        else
        {
            $data['domanda_sep'] = $esperto_sep;
            $data['province'] = $this->comuni->lista_province();
            $data['lista_sep'] = $this->comuni->lista_sep();
            $data['tipo_allegati'] = $this->comuni->lista_tipo_allegato();
            $data['action'] = "edit";
            $data['id_domanda'] = $esperto_sep["id_domanda"];
            $this->load->view('esperti_sep/compila_domanda', $data);
        }
    }

    public function genera_pdf_allegato_B()
    {
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $esperto_sep = $this->esperti_sep->leggi_candidatura();
        if ($esperto_sep != FALSE)
        {

            $this->load->library('Pdf');
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Allegato B');
            $pdf->SetAuthor('Regione Campania');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);


            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            // set font
            $pdf->SetFont('helvetica', '', 10);

            $pdf->AddPage();

            $this->output->unset_template();



            $data['domanda_sep'] = $esperto_sep;
            $data['domanda_profili'] = $this->esperti_sep->leggi_lista_profili($esperto_sep["id_domanda"]);
            $html = $this->load->view('esperti_sep/pdf_allegatoB', $data, TRUE);


            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Allegato_B_' . $esperto_sep["codice_fiscale"] . '.pdf', 'I');
        }
    }

}
