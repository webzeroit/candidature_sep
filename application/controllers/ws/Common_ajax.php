<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_ajax extends CI_Controller
{

    public function lista_comuni()
    {
        $this->load->model('comuni_model', 'comuni');
        $output = null;
        if ($this->input->post('parent_id'))
        {
            $output = $this->comuni->lista_comuni($this->input->post('parent_id'));
        }
        $this->_render_json($output);
    }

    public function lista_profili()
    {
        $this->load->model('comuni_model', 'profili');
        $output = null;
        if ($this->input->post('parent_id'))
        {
            $output = $this->profili->lista_profili_sep($this->input->post('parent_id'));
        }
        $this->_render_json($output);
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

    public function test_email()
    {

        $message = "Test Email";

        $this->load->library('email');
        $this->email->clear();
        $this->email->from('mail@raffaelelanzetta.com');
        $this->email->to('r.lanzetta@gmail.com');
        $this->email->subject('Test Email');
        $this->email->message($message);
        // You need to pass FALSE while sending in order for the email data
        // to not be cleared - if that happens, print_debugger() would have
        // nothing to output.
        $this->email->send(FALSE);

        // Will only print the email headers, excluding the message subject and body
        $this->email->print_debugger();
    }

}
