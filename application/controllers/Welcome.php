<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();

        $this->output->set_template('adminpress');
        $this->output->set_title('Benvenuto');
        $this->output->set_page_title('Avviso pubblico - Esperto di S.E.P');
    }

    public function index()
    {      
        $data['id_domanda'] = 0;
        $data['stato_domanda'] = 0;
        $data['data_ricezione'] = "";
        //Verifica se l'utente è loggato
        if ($this->ion_auth->logged_in())
        {
            $this->load->model('esperti_sep_model', 'esperti_sep');
            $esperto_sep = $this->esperti_sep->leggi_candidatura();
            if ($esperto_sep !== FALSE)
            {
                $data['id_domanda'] = $esperto_sep["id_domanda"];;
                $data['stato_domanda'] = $esperto_sep["id_stato_domanda_esep"];
                $data['data_ricezione'] = $esperto_sep["data_ricezione"];
            }
            
        } 
        $this->load->view('welcome',$data);
    }

}
