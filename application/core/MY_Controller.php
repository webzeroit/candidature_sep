<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller base che centralizza le funzionalità dei controller lato ADMIN:
 * Include:
 *     - A basic template engine
 *     - More readily available 'flash messages'
 *     - autoloading of language and model files
 *     - flexible rendering methods making JSON simple.
 *     - Automatcially migrating.
 */
class MY_Controller extends CI_Controller {
    
     public $check_browser = FALSE;
     
     public function __construct() {
        
        parent::__construct();        
        
        $this->load->library('user_agent');        
        
        if ($this->agent->is_browser())
        {            
            if ($this->agent->browser() === 'Internet Explorer' && $this->agent->version() >= 10)
            {
                $this->check_browser = TRUE;
            }
            else if ($this->agent->browser() === 'Chrome' && $this->agent->version() >= 40)
            {
                $this->check_browser = TRUE;
            }
            else if ($this->agent->browser() === 'Spartan' && $this->agent->version() >= 16)
            {
                $this->check_browser = TRUE;
            }
            else if ($this->agent->browser() === 'Firefox' && $this->agent->version() >= 58)
            {
                $this->check_browser = TRUE;
            }
        }
        elseif ($this->agent->is_robot())
        {           
            $this->check_browser = FALSE;
        }
        elseif ($this->agent->is_mobile())
        {
            $this->check_browser = FALSE;
        }              
        
        
    }
    
    
}

class MY_Admin_Controller extends MY_Controller {
    
    public function __construct() {
        
        parent::__construct();
        //Verifica se l'utente è loggato
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        
        
    }
    
    
}