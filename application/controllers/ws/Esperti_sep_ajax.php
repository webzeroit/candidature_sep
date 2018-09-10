<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esperti_sep_ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    // GESTIONE ISTRUTTORIA DOMANDA AJAX
    public function crea_datatable()
    {
        $action_row = null;
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $list = $this->esperti_sep->crea_datatables_domande();
        $data = array();
        foreach ($list as $esperto)
        {

            $row = array();
            $row[] = $esperto->id_domanda;
            $row[] = $esperto->codice_fiscale;
            $row[] = $esperto->nome;
            $row[] = $esperto->cognome;
            $row[] = $esperto->data_nascita;
            $row[] = $esperto->sesso;
            $row[] = $esperto->id_comune_nascita;
            $row[] = $esperto->des_comune_nascita;
            $row[] = $esperto->istat_provincia_nascita;
            $row[] = $esperto->des_provincia_nascita;
            $row[] = $esperto->sigla_provincia_nascita;
            $row[] = $esperto->residenza_indirizzo;
            $row[] = $esperto->id_comune_residenza;
            $row[] = $esperto->des_comune_residenza;
            $row[] = $esperto->istat_provincia_residenza;
            $row[] = $esperto->des_provincia_residenza;
            $row[] = $esperto->sigla_provincia_residenza;
            $row[] = $esperto->telefono;
            $row[] = $esperto->cellulare;
            $row[] = $esperto->pec;
            $row[] = $esperto->data_ricezione;
            $row[] = $esperto->flag_disp_AV;
            $row[] = $esperto->flag_disp_BN;
            $row[] = $esperto->flag_disp_CE;
            $row[] = $esperto->flag_disp_NA;
            $row[] = $esperto->flag_disp_SA;
            $row[] = $esperto->flag_ultima_domanda;
            $row[] = $esperto->id_stato_domanda_esep;
            $row[] = $esperto->des_stato_domanda_esep;
            $row[] = $esperto->note;
            $row[] = $action_row;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->esperti_sep->tot_domande(),
            "recordsFiltered" => $this->esperti_sep->tot_domande_filtrate(),
            "data" => $data,
        );
        $this->_render_json($output);
        //output to json format
    }

    public function salva_domanda()
    {
        if ($this->input->post())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');

            $id_domanda = $this->input->post("id_domanda");

            $data = array(
                'id_stato_domanda_esep' => $this->input->post("id_esito_domanda_esep"),
                'data_istruttoria' => convertsDataInMySQLFormat($this->input->post("data_istruttoria")),
                'note' => $this->input->post("note_istruttoria")                
            );
            $output = $this->esperti_sep->salva_domanda($data, $id_domanda);
            $this->_render_json($output);
        }
    }

    public function elimina_domanda()
    {
        if ($this->input->post("id_domanda"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_domanda = $this->input->post("id_domanda");
            $output = $this->esperti_sep->elimina_domanda($id_domanda);
            $this->_render_json($output);
        }
    }

    public function sblocca_domanda()
    {
        if ($this->input->post("id_domanda"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_domanda = $this->input->post("id_domanda");
            $output = $this->esperti_sep->sblocca_domanda($id_domanda);
            $this->_render_json($output);
        }
    }

    public function leggi_domanda()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_domanda = $this->input->post("id_domanda");
            $output = $this->esperti_sep->leggi_domanda($id_domanda);
            $this->_render_json($output);
        }
    }

    // TITOLI DI STUDIO AJAX
    public function crea_datatable_professionalita()
    {
        $action_row = null;
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $list = $this->esperti_sep->crea_datatables_professionalita();
        $data = array();
        foreach ($list as $titolo)
        {

            $row = array();
            $row[] = $titolo->id_professionalita_domanda;
            $row[] = $titolo->id_domanda;
            $row[] = $titolo->id_professionalita;
            $row[] = $titolo->des_professionalita;
            $row[] = $titolo->des_specifica_professionalita;
            $row[] = $titolo->livello_EQF_professionalita;
            $row[] = $action_row;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data,
        );
        $this->_render_json($output);
        //output to json format
    }

    public function salva_professionalita()
    {
        if ($this->input->post())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');

            $id_professionalita_domanda = $this->input->post("id_professionalita_domanda");

            $data = array(
                'id_domanda' => $this->input->post("id_domanda"),
                'id_professionalita' => $this->input->post("id_professionalita"),
                'des_specifica_professionalita' => $this->input->post("des_specifica_professionalita"),
                'livello_EQF_professionalita' => $this->input->post("livello_EQF_professionalita")
            );

            $output = $this->esperti_sep->salva_professionalita($data, $id_professionalita_domanda);
            $this->_render_json($output);
        }
    }

    public function elimina_professionalita()
    {
        if ($this->input->post("id_professionalita_domanda"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_professionalita_domanda = $this->input->post("id_professionalita_domanda");
            $output = $this->esperti_sep->elimina_professionalita($id_professionalita_domanda);
            $this->_render_json($output);
        }
    }

    public function leggi_professionalita()
    {
        if ($this->input->post("id_professionalita_domanda"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_professionalita_domanda = $this->input->post("id_professionalita_domanda");
            $output = $this->esperti_sep->leggi_professionalita($id_professionalita_domanda);
            $this->_render_json($output);
        }
    }

    private function _render_json($json)
    {
        if (is_resource($json))
        {
            throw new \RuntimeException('Impossibile convertire l\'oggetto in JSON.');
        }

        $this->output->enable_profiler(FALSE)
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
    }

    private function _render_text($text, $typography = FALSE)
    {
        // Note that, for now anyway, we don't do any cleaning of the text
        // and leave that up to the client to take care of.
        // However, we can auto_typogrify the text if we're asked nicely.
        if ($typography === TRUE)
        {
            $this->load->helper('typography');
            $text = auto_typography($text);
        }

        $this->output->enable_profiler(FALSE)
                ->set_content_type('text/plain')
                ->set_output($text);
    }

    // ISTRUTTORIA PROFILI AJAX
    public function crea_datatable_istruttoria_profili()
    {
        $action_row = null;
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $list = $this->esperti_sep->crea_datatables_profilo();
        $data = array();
        foreach ($list as $profilo)
        {

            $row = array();
            $row[] = $profilo->id_domanda_sep;
            $row[] = $profilo->id_domanda;
            $row[] = $profilo->id_profilo;
            $row[] = $profilo->titolo_profilo;
            $row[] = $profilo->des_esito_valutazione;
            $row[] = $profilo->note;
            $row[] = $action_row;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data,
        );
        $this->_render_json($output);
        //output to json format
    }

    public function salva_istruttoria_profilo()
    {
        if ($this->input->post())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');

            $id_domanda_sep = $this->input->post("id_domanda_sep");

            $data = array(
                'id_domanda' => $this->input->post("id_domanda"),
                'livello_EQF_professionalita' => $this->input->post("livello_EQF_professionalita_profilo"),
                'flag_5_anni_esperienza' => $this->input->post("flag_5_anni_esperienza"),
                'flag_coerenza_attiviata' => $this->input->post("flag_coerenza_attiviata"),
                'flag_attestazione' => $this->input->post("flag_attestazione"),
                'flag_possesso_qualificazione' => $this->input->post("flag_possesso_qualificazione"),
                'esito_valutazione' => $this->input->post("esito_valutazione"),
                'note' => $this->input->post("note")
            );

            $output = $this->esperti_sep->salva_profilo($data, $id_domanda_sep);
            $this->_render_json($output);
        }
    }

}
