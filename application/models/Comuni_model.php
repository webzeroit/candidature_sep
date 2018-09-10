<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comuni_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lista_comuni($istat_provincia = null)
    {
        $this->db->select('id_comune as id , des_comune as text');
        $this->db->from('ar_comune');
        if (!is_null($istat_provincia))
        {
            $this->db->where('istat_provincia', $istat_provincia);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function lista_province()
    {
        $this->db->select('istat_provincia as id , des_provincia as text');
        $this->db->from('ar_provincia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lista_professionalita()
    {
        $this->db->select('id_professionalita as id , des_professionalita as text');
        $this->db->from('ar_professionalita');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lista_sep()
    {
        $this->db->select('id_sep as id , CONCAT(tag_sep, " - ", des_sep) as text');
        $this->db->from('ar_sep');
        $this->db->order_by('id_sep', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lista_profili_sep($id_sep = null)
    {
        $this->db->select('id_profilo as id, titolo_profilo as text');
        $this->db->from('ar_profilo');
        if (!is_null($id_sep))
        {
            $this->db->where('id_sep', $id_sep);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function lista_tipo_allegato()
    {
        $this->db->select('id_tipo_allegato_esep as id , des_allegato_esep as text');
        $this->db->from('esep_tipo_allegato');
        $this->db->order_by('id_tipo_allegato_esep', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lista_stato_domanda($is_tecnico = TRUE)
    {
        $this->db->select('id_stato_domanda_esep as id , des_stato_domanda_esep as text');
        $this->db->from('esep_stato_domanda');
        if ($is_tecnico === TRUE)
        {
            $this->db->where('id_stato_domanda_esep >', 2);
        }
        else
        {
            $this->db->where('id_stato_domanda_esep >', 5);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

}
