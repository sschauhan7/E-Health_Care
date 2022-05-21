<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function leerListaInformes($ciu)
    {
        //leemos todos los informes de este usuario
        $this->db->where("CIU_paciente", $ciu);
        $this->db->order_by("fecha", "DESC");
        $query = $this->db->get("vista_resumen_informes");
        
        $informes = $query->result_array();
        
        return $informes;
    }
}
