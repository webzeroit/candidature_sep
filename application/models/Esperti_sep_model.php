<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esperti_sep_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // GESTIONE CANDIDATURA DOMANDA
    public function leggi_candidatura()
    {
        $id = $this->ion_auth->user()->row()->id;
        $this->db->select('*');
        $this->db->from('v_esep_domanda');
        $this->db->where('id_ins', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }

    public function salva_candidatura($data, $id)
    {
        if ($id === "0")
        {
            $this->db->set('id_ins', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('ultima_modifica', 'NOW()', FALSE);
            $this->db->set('data_ricezione', 'NOW()', FALSE);
            $this->db->insert('esep_domanda', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return $db_error["message"];
            }
            return $this->db->insert_id();
        }
        else
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('data_ricezione', 'NOW()', FALSE);
            $this->db->where('id_domanda', $id);
            $this->db->update('esep_domanda', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
    }

    public function esiste_candidatura($codice_fiscale)
    {
        $this->db->where('codice_fiscale', $codice_fiscale);
        $query = $this->db->get('esep_domanda');
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->db->where('codice_fiscale', $codice_fiscale);
            $query_pec = $this->db->get('tbl_candidati_pec');
            if ($query_pec->num_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function verifica_candidatura($id_domanda)
    {
        $output = array(
            'n_profili' => 0,
            'n_allegati' => 0,
            'procedi' => TRUE
        );

        //PROFILI
        $this->db->where('id_domanda', $id_domanda);
        $this->db->from('esep_domanda_profilo');
        $n_profili = $this->db->count_all_results();
        $output['n_profili'] = $n_profili;
        if ($n_profili === 0)
        {
            $output['procedi'] = FALSE;
        }

        //ALLEGATI
        $this->db->where('id_domanda', $id_domanda);
        $tipo_allegato = array(1, 2, 4, 5);
        $this->db->where_in('id_tipo_allegato_esep', $tipo_allegato);
        $this->db->from('esep_domanda_allegato');
        $n_allegati = $this->db->count_all_results();
        $output['n_allegati'] = $n_allegati;
        if ($n_allegati < 4)
        {
            $output['procedi'] = FALSE;
        }
        return $output;
    }

    public function invia_candidatura($id_domanda)
    {
        if ($id_domanda != "0")
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('data_ricezione', 'NOW()', FALSE);
            $this->db->set('id_stato_domanda_esep', 2);
            $this->db->where('id_domanda', $id_domanda);
            $this->db->update('esep_domanda');
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
    }

    // GESTIONE CANDIDATURA PROFILO E GESTIONE ISTRUTTORIA PROFILI    
    public function crea_datatables_profilo()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->db->where('id_domanda', $this->input->post('id_domanda'));
            $this->db->from('v_esep_domanda_profilo');
            $query = $this->db->get();
            return $query->result();
        }
    }

    // GESTIONE CANDIDATURA PROFILO 
    public function salva_profilo($data, $id)
    {
        if ($id === "0")
        {
            $this->db->set('id_ins', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('ultima_modifica', 'NOW()', FALSE);
            $this->db->insert('esep_domanda_profilo', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return $db_error["message"];
            }
            return $this->db->insert_id();
        }
        else
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->where('id_domanda_sep', $id);
            $this->db->update('esep_domanda_profilo', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
    }

    public function leggi_lista_profili($id_domanda)
    {
        $this->db->select('*');
        $this->db->from('v_esep_domanda_profilo');
        $this->db->where('id_domanda', $id_domanda);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;
    }

    public function leggi_profilo($id)
    {
        $this->db->select('*');
        $this->db->from('v_esep_domanda_profilo');
        $this->db->where('id_domanda_sep', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }

    public function elimina_profilo($id)
    {
        $this->db->where('id_domanda_sep', $id);
        $this->db->delete('esep_domanda_profilo');
        $db_error = $this->db->error();
        if (!$db_error["code"] === 0)
        {
            return $db_error["message"];
        }
        return TRUE;
    }

    // GESTIONE CANDIDATURA ALLEGATI
    public function crea_datatables_allegati()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->db->where('id_domanda', $this->input->post('id_domanda'));
            $this->db->from('v_esep_domanda_allegato');
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function salva_allegato($data, $id)
    {
        if ($id === "0")
        {
            $this->db->set('id_ins', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('data_caricamento', 'NOW()', FALSE);
            $this->db->insert('esep_domanda_allegato', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return $db_error["message"];
            }
            return $this->db->insert_id();
        }
    }

    public function elimina_allegato($id)
    {
        $file = $this->leggi_allegato($id);

        $this->db->where('id_allegato', $id);
        $this->db->delete('esep_domanda_allegato');
        $db_error = $this->db->error();
        if (!$db_error["code"] === 0)
        {
            return $db_error["message"];
        }
        if ($file != FALSE)
        {
            unlink(FCPATH . $file["path_file"]);
        }
        return TRUE;
    }

    public function leggi_allegato($id)
    {
        $this->db->select('*');
        $this->db->from('v_esep_domanda_allegato');
        $this->db->where('id_allegato', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }

    //  GESTIONE ISTRUTTORIA DOMANDA
    private function _get_datatables_domande_query()
    {
        $column_order = array(
            'id_domanda',
            'codice_fiscale',
            'nome',
            'cognome',
            'data_nascita',
            'sesso',
            'id_comune_nascita',
            'des_comune_nascita',
            'istat_provincia_nascita',
            'des_provincia_nascita',
            'sigla_provincia_nascita',
            'residenza_indirizzo',
            'id_comune_residenza',
            'des_comune_residenza',
            'istat_provincia_residenza',
            'des_provincia_residenza',
            'sigla_provincia_residenza',
            'telefono',
            'cellulare',
            'pec',
            'data_ricezione',
            'flag_disp_AV',
            'flag_disp_BN',
            'flag_disp_CE',
            'flag_disp_NA',
            'flag_disp_SA',
            'flag_ultima_domanda',
            'id_stato_domanda_esep',
            'des_stato_domanda_esep'
        );
        $column_search = array(
            'nome',
            'cognome',
            'sesso',
            'data_nascita',
            'istat_provincia_residenza',
            'id_comune_residenza',
            'flag_disp_AV',
            'flag_disp_BN',
            'flag_disp_CE',
            'flag_disp_NA',
            'flag_disp_SA'
        ); //set column field database for datatable searchable 

        $order = array('id_domanda' => 'asc'); // default order 
        //aggiungo qui i filtri per la ricerca
        if ($this->input->post('nome'))
        {
            $this->db->like('nome', $this->input->post('nome'));
        }
        if ($this->input->post('cognome'))
        {
            $this->db->like('cognome', $this->input->post('cognome'));
        }
        if ($this->input->post('sesso'))
        {
            $this->db->where('sesso', $this->input->post('sesso'));
        }
        if ($this->input->post('data_nascita'))
        {
            $this->db->where('data_nascita', $this->input->post('data_nascita'));
        }
        if ($this->input->post('istat_provincia_residenza'))
        {
            $this->db->where('istat_provincia_residenza', $this->input->post('istat_provincia_residenza'));
        }
        if ($this->input->post('id_comune_residenza'))
        {
            $this->db->where('id_comune_residenza', $this->input->post('id_comune_residenza'));
        }
        if ($this->input->post('flag_disp_AV'))
        {
            $this->db->where('flag_disp_AV', $this->input->post('flag_disp_AV'));
        }
        if ($this->input->post('flag_disp_BN'))
        {
            $this->db->where('flag_disp_BN', $this->input->post('flag_disp_BN'));
        }
        if ($this->input->post('flag_disp_CE'))
        {
            $this->db->where('flag_disp_CE', $this->input->post('flag_disp_CE'));
        }
        if ($this->input->post('flag_disp_NA'))
        {
            $this->db->where('flag_disp_NA', $this->input->post('flag_disp_NA'));
        }
        if ($this->input->post('flag_disp_SA'))
        {
            $this->db->where('flag_disp_SA', $this->input->post('flag_disp_SA'));
        }
        if ($this->input->post('id_profilo') && ($this->input->post('id_profilo') !== ""))
        {
            $this->db->where('id_domanda in (SELECT DISTINCT id_domanda FROM v_esep_domanda_profilo WHERE id_profilo=' . $this->input->post('id_profilo') . ')', NULL, FALSE);
        }
        elseif ($this->input->post('id_sep') && ($this->input->post('id_sep') !== ""))
        {
            $this->db->where('id_domanda in (SELECT DISTINCT id_domanda FROM v_esep_domanda_profilo WHERE id_sep=' . $this->input->post('id_sep') . ')', NULL, FALSE);
        }
        $this->db->from('v_esep_domanda');
        $i = 0;

        foreach ($column_search as $item)
        { // loop column 
            if ($_POST['search']['value'])
            { // if datatable send POST for search
                if ($i === 0)
                { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                { //last loop
                    $this->db->group_end(); //close bracket
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if (isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function crea_datatables_domande()
    {
        $this->_get_datatables_domande_query();
        if ($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        log_message('debug', $this->db->last_query());
        return $query->result();
    }

    public function tot_domande_filtrate()
    {
        $this->_get_datatables_domande_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function tot_domande()
    {
        $this->db->from('v_esep_domanda');
        return $this->db->count_all_results();
    }

    public function leggi_domanda($id)
    {
        $this->db->select('*');
        $this->db->from('v_esep_domanda');
        $this->db->where('id_domanda', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }
    
    public function leggi_utente_domanda($id)
    {
        $this->db->select('id_ins');
        $this->db->from('esep_domanda');
        $this->db->where('id_domanda', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return 0;
    }
    

    public function salva_domanda($data, $id)
    {
        if ($id != "0")
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->where('id_domanda', $id);
            $this->db->update('esep_domanda', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function elimina_domanda($id)
    {
        $this->db->where('id_domanda', $id);
        $this->db->delete('esep_domanda');
        $db_error = $this->db->error();
        if (!$db_error["code"] === 0)
        {
            return $db_error["message"];
        }
        return TRUE;
    }

    public function sblocca_domanda($id)
    {
        $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
        $this->db->set('id_stato_domanda_esep', 1, FALSE);
        $this->db->where('id_domanda', $id);
        $this->db->update('esep_domanda');
        $db_error = $this->db->error();
        if (!$db_error["code"] === 0)
        {
            return FALSE;
        }
        return TRUE;
    }

    //  GESTIONE ISTRUTTORIA PROFESSIONALITA
    public function crea_datatables_professionalita()
    {
        if ($this->input->post('id_domanda'))
        {
            $this->db->where('id_domanda', $this->input->post('id_domanda'));
            $this->db->from('v_esep_domanda_professionalita');
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function salva_professionalita($data, $id)
    {
        if ($id === "0")
        {
            $this->db->set('id_ins', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->set('ultima_modifica', 'NOW()', FALSE);
            $this->db->insert('esep_domanda_professionalita', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return $db_error["message"];
            }
            return $this->db->insert_id();
        }
        else
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->where('id_professionalita_domanda', $id);
            $this->db->update('esep_domanda_professionalita', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
    }

    public function leggi_professionalita($id)
    {
        $this->db->select('*');
        $this->db->from('v_esep_domanda_professionalita');
        $this->db->where('id_professionalita_domanda', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }

    public function elimina_professionalita($id)
    {
        $this->db->where('id_professionalita_domanda', $id);
        $this->db->delete('esep_domanda_professionalita');
        $db_error = $this->db->error();
        if (!$db_error["code"] === 0)
        {
            return $db_error["message"];
        }
        return TRUE;
    }

    //GESTIONE ISTRUTTORIA PROFILI
    public function salva_istruttoria_profilo($data, $id)
    {
        if ($id != "0")
        {
            $this->db->set('id_mod', $this->ion_auth->user()->row()->id, FALSE);
            $this->db->where('id_domanda_sep', $id);
            $this->db->update('esep_domanda_profilo', $data);
            $db_error = $this->db->error();
            if (!$db_error["code"] === 0)
            {
                return FALSE;
            }
            return TRUE;
        }
    }

}
