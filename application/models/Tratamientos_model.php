<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tratamientos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function leerTratamientos($ciu)
    {
        $this->db->where("CIU_paciente", $ciu);
        $this->db->where("fecha_fin >=", date("Y-m-d"));
        $tratamientos = $this->db->get("tratamientos")->result_array();

        return $tratamientos;
    }
}
