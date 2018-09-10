<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatura_ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /*     * ********************************************************************
     * GESTIONE CANDIDATURA DOMANDA AJAX
     * ********************************************************************* */

    public function salva_candidatura()
    {
        if ($this->input->post())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');

            $id_domanda = $this->input->post("id_domanda");

            $data = array(
                'codice_fiscale' => strtoupper($this->input->post("codice_fiscale")),
                'nome' => strtoupper($this->input->post("nome")),
                'cognome' => strtoupper($this->input->post("cognome")),
                'data_nascita' => convertsDataInMySQLFormat($this->input->post("data_nascita")),
                'sesso' => $this->input->post("sesso"),
                'id_comune_nascita' => $this->input->post("comune_nascita"),
                'residenza_indirizzo' => $this->input->post("residenza_indirizzo"),
                'id_comune_residenza' => $this->input->post("comune_residenza"),
                'telefono' => $this->input->post("telefono"),
                'cellulare' => $this->input->post("cellulare"),
                'pec' => $this->input->post("pec"),
                'flag_disp_AV' => $this->input->post("flag_disp_AV"),
                'flag_disp_BN' => $this->input->post("flag_disp_BN"),
                'flag_disp_CE' => $this->input->post("flag_disp_CE"),
                'flag_disp_NA' => $this->input->post("flag_disp_NA"),
                'flag_disp_SA' => $this->input->post("flag_disp_SA"),
                'flag_ultima_domanda' => 1,
                'sesso' => $this->input->post("sesso"),
                'id_stato_domanda_esep' => 1
            );

            $output = $this->esperti_sep->salva_candidatura($data, $id_domanda);
            $this->_render_json($output);
        }
    }

    public function esiste_candidatura()
    {
        if ($this->input->post("codice_fiscale"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $output = $this->esperti_sep->esiste_candidatura($this->input->post("codice_fiscale"));
            $this->_render_json($output);
        }
    }

    public function verifica_candidatura()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $output = $this->esperti_sep->verifica_candidatura($this->input->post("id_domanda"));
            $this->_render_json($output);
        }
    }

    public function invia_candidatura()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $output = $this->esperti_sep->invia_candidatura($this->input->post("id_domanda"));
            if ($output === TRUE)
            {
                $user = $this->ion_auth->user()->row();

                $view_email = $this->config->item('email_templates', 'ion_auth') . $this->config->item('email_invio_candidatura', 'ion_auth');
                $message = $this->load->view($view_email, null, TRUE);

                $this->load->library('email');
                $this->email->clear();
                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                $this->email->to($user->email);
                $this->email->subject($this->config->item('site_title', 'ion_auth') . ' - Ricevuta candidatura');
                $this->email->message($message);
                $this->email->send();                                                               
            }
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

    /*     * ********************************************************************
     * PROFILO CANDIDATURA AJAX
     * ********************************************************************* */

    public function crea_datatable_profili()
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
            $esperienza_desc = substr($profilo->sintesi_esperienza,0, 400);
            $esperienza_desc .= strlen($profilo->sintesi_esperienza) > 400 ? " [...] " : "";
            $row[] = $esperienza_desc;
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

    public function salva_profilo()
    {
        if ($this->input->post())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');

            $id_domanda_sep = $this->input->post("id_domanda_sep");

            $data = array(
                'id_domanda' => $this->input->post("id_domanda"),
                'id_sep' => $this->input->post("id_sep"),
                'id_profilo' => $this->input->post("id_profilo"),
                'sintesi_esperienza' => $this->input->post("sintesi_esperienza"),
            );

            $output = $this->esperti_sep->salva_profilo($data, $id_domanda_sep);
            $this->_render_json($output);
        }
    }

    public function elimina_profilo()
    {
        if ($this->input->post("id_domanda_sep"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_domanda_sep = $this->input->post("id_domanda_sep");
            $output = $this->esperti_sep->elimina_profilo($id_domanda_sep);
            $this->_render_json($output);
        }
    }

    public function leggi_profilo()
    {
        if ($this->input->post("id_domanda_sep"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_domanda_sep = $this->input->post("id_domanda_sep");
            $output = $this->esperti_sep->leggi_profilo($id_domanda_sep);
            $this->_render_json($output);
        }
    }

    /*     * ********************************************************************
     * ALLEGATI DOMANDA SEP AJAX
     * ********************************************************************* */

    public function crea_datatables_allegati()
    {
        $action_row = null;
        $this->load->model('esperti_sep_model', 'esperti_sep');
        $list = $this->esperti_sep->crea_datatables_allegati();
        $data = array();
        foreach ($list as $profilo)
        {

            $row = array();
            $row[] = $profilo->id_allegato;
            $row[] = $profilo->id_tipo_allegato_esep;
            $row[] = $profilo->des_allegato_esep;
            $row[] = $profilo->id_domanda;
            $row[] = base_url($profilo->path_file);
            $row[] = $profilo->data_caricamento;
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

    public function salva_allegato()
    {
        if ($this->input->post())
        {
            $id_domanda = $this->input->post("id_domanda");
            $upload_file_path = $this->config->item('esep_upload_path') . $id_domanda;
            $config['upload_path'] = $upload_file_path;
            $config['allowed_types'] = $this->config->item('esep_allowed_types');
            $config['file_ext_tolower'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['max_size'] = $this->config->item('esep_max_size');
            $config['max_filename'] = '255';
            $config['remove_spaces'] = TRUE;

            if (isset($_FILES['file']['name']))
            {
                if (0 < $_FILES['file']['error'])
                {
                    $output = 'Errore caricamento file: ' . $_FILES['file']['error'];
                    $this->_render_text($output);
                }
                else
                {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file'))
                    {
                        $this->_render_text($this->upload->display_errors('', ''));
                    }
                    else
                    {
                        $this->load->model('esperti_sep_model', 'esperti_sep');

                        $id_allegato = $this->input->post("id_allegato");
                        $file_data = $this->upload->data();
                        $data = array(
                            'id_domanda' => $id_domanda,
                            'id_tipo_allegato_esep' => $this->input->post("id_tipo_allegato_esep"),
                            'path_file' => $upload_file_path . "/" . $file_data["file_name"]
                        );

                        $output = $this->esperti_sep->salva_allegato($data, $id_allegato);
                        $this->_render_text($output);
                    }
                }
            }
            else
            {
                $output = "Nessun file selezionato";
                $this->_render_text($output);
            }
        }
    }

    public function elimina_allegato()
    {
        if ($this->input->post("id_allegato"))
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $id_allegato = $this->input->post("id_allegato");
            $output = $this->esperti_sep->elimina_allegato($id_allegato);
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

}
