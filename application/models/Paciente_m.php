<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paciente_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function leerDatos($ciu)
    {
        $consulta = $this->db->query("SELECT ciu, nombre, apellidos, dni, sexo, nacionalidad, direccion, telefono, fijo, fecha_nacimiento, correo FROM usuarios WHERE ciu = ?", array($ciu));

        //como queremos leer solo una fila, usamos ->row()
        $row = $consulta->row_array();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function leerCitas($ciu)
    {
        //buscamos todas las citas de este paciente
        $consulta = $this->db->query("SELECT * FROM vista_citas_pacientes_medicos WHERE CIU_paciente = ? AND estado = '0'", array($ciu));

        //ejecutamos la consulta y devolvemos el array de citas
        $citas = $consulta->result_array();

        return $citas;
    }

    public function leerFacultativos($ciu)
    {
        $consulta = $this->db->query("SELECT (SELECT nombre_completo FROM vista_usuarios_medicos WHERE CIU = pacientes.CIU_medico_referencia) AS medico, CIU_medico_referencia AS CIU_medico FROM pacientes WHERE CIU_paciente = ?", array($ciu));

        //como queremos leer solo una fila, usamos ->row()
        $facultativos = $consulta->result_array();

        return $facultativos;
    }

    public function actualizarDatos($datos, $ciu) {
        
        foreach($datos as $campo => $valor) {
            $this->db->set($campo, $valor);
        }

        $this->db->where('ciu', $ciu);

        if($this->db->update("usuarios")) {
            return true;
        } else {
            return false;
        }
    }

    public function leerDatosInicio($ciu) {
        $datos = array();

        $consulta = $this->db->query("SELECT COUNT(id) AS cantidad FROM notificaciones WHERE CIU_usuario = ?", array($ciu));
        $notificaciones = $consulta->row();
        $datos['notificaciones'] = $notificaciones->cantidad;

        $consulta = $this->db->query("SELECT COUNT(id) AS cantidad FROM citas WHERE CIU_paciente = ? AND estado = '0'", array($ciu));
        $notificaciones = $consulta->row();
        $datos['citas'] = $notificaciones->cantidad;
        
        $consulta = $this->db->query("SELECT COUNT(id) AS cantidad FROM tratamientos WHERE CIU_paciente = ?", array($ciu));
        $notificaciones = $consulta->row();
        $datos['tratamientos'] = $notificaciones->cantidad;

        return $datos;
    }
}
