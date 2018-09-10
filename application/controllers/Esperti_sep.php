<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Gestione Esperti Sep.
 */

class Esperti_sep extends MY_Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comuni_model', 'comuni');
        $this->output->set_template('adminpress');
        $this->output->set_title('Gestione esperti SEP');
    }

    public function index()
    {
        $this->output->set_page_title('Elenco candidature esperti SEP');
        $this->load->js('assets/themes/adminpress/js/esperti_sep/index.js');
        $data['province'] = $this->comuni->lista_province();
        $data['lista_sep'] = $this->comuni->lista_sep();
        $this->load->view('esperti_sep/index', $data);
    }

    public function gestione_domanda($id)
    {
        $this->output->set_page_title('Gestione candidatura esperto SEP');
        $this->load->js('assets/themes/adminpress/js/esperti_sep/gestione_domanda.js');
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $esperto_sep = $this->esperti_sep->leggi_domanda($id);
        if ($esperto_sep === FALSE)
        {
            redirect('esperti_sep/index', 'refresh');
        }
        else
        {
            $data['domanda_sep'] = $esperto_sep;
            $data['province'] = $this->comuni->lista_province();
            $data['professionalita'] = $this->comuni->lista_professionalita();
            $data['esiti'] = $this->comuni->lista_stato_domanda();
            $data['action'] = "edit";
            $data['id_domanda'] = $id;
            $this->load->view('esperti_sep/gestione_domanda', $data);
        }
    }



}
