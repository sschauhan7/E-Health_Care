<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paciente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //si no tiene ciu es que no ha pasado por el login, lo redirigimos al mismo
        if (!$this->session->userdata("ciu")) {
            //redirigimos al login
            redirect(base_url() . "login");
            return;
        }

        //si no tiene nombre, carga los datos
        if ($this->session->userdata("ciu")) {

            //cargamos los datos del usuario llamando al modelo
            $this->load->model("Paciente_m");

            $datos = $this->Paciente_m->leerDatos($this->session->userdata("ciu"));

            $this->session->set_userdata($datos);
        }
    }

    public function logout()
    {
        //el propio login borra la sesion
        redirect(base_url() . "login");
    }

    public function inicio()
    {
        //carga el modelo de la base de datos
        $this->load->model("Paciente_m");

        //leemos los datos de inicio
        $datos = $this->Paciente_m->leerDatosInicio($this->session->userdata("ciu"));


        //carga el head con las hojas de estilos y scripts necesarios
        $this->load->view("modules/head", array(
            "hojas" => array("paciente/index", "paciente/inicio", "paciente/panel-paciente-responsive"),
            "scripts" => array("paciente/index", "paciente/inicio")
        ));

        //carga el modulo principal
        $this->load->view("modules/panel-paciente");

        //carga la vista de inicio
        $this->load->view("paciente/Inicio_v", array("datos" => $datos));
    }

    public function citas()
    {
        $this->load->model("Paciente_m");
        $citas = $this->Paciente_m->leerCitas($this->session->userdata("ciu"));

        $facultativos = $this->Paciente_m->leerFacultativos($this->session->userdata("ciu"));

        //carga el head con las hojas de estilos y scripts necesarios
        $this->load->view("modules/head", array("hojas" => array(
            "paciente/index", "paciente/citas", "paciente/panel-paciente-responsive"),
            "scripts" => array("paciente/index", "paciente/citas")
        ));

        //carga el modulo principal
        $this->load->view("modules/panel-paciente");

        //carga la vista de inicio
        $this->load->view("paciente/Citas_v", array(
            "citas" => $citas, "facultativos" => $facultativos
        ));
    }

    public function tratamientos()
    {
        //carga el head con las hojas de estilos y scripts necesarios
        $this->load->view("modules/head", array(
            "hojas" => array("paciente/index", "paciente/tratamientos", "paciente/panel-paciente-responsive"),
            "scripts" => array("paciente/index", "paciente/tratamientos")
        ));

        //carga el modulo principal
        $this->load->view("modules/panel-paciente");

        //carga la vista de inicio
        $this->load->view("paciente/Tratamientos_v");
    }

    public function informes()
    {
        //carga el head con las hojas de estilos y scripts necesarios
        $this->load->view("modules/head", array("hojas" => array(
            "paciente/index", "paciente/informes", "paciente/panel-paciente-responsive"),
            "scripts" => array("paciente/index", "paciente/informes", "lib/pagination")
        ));

        //carga el modulo principal
        $this->load->view("modules/panel-paciente");

        //carga la vista de inicio
        $this->load->view("paciente/Informes_v");
    }

    public function misdatos()
    {
        //carga el head con las hojas de estilos y scripts necesarios
        $this->load->view("modules/head", array("hojas" => array(
            "paciente/index", "paciente/misdatos", "paciente/panel-paciente-responsive"),
            "scripts" => array("paciente/index", "paciente/misdatos")
        ));

        //carga el modulo principal
        $this->load->view("modules/panel-paciente");

        //carga la vista de inicio
        $this->load->view("paciente/MisDatos_v");
    }


    public function actualizarDatos()
    {
        //si no hay datos POST es que ha accedido directamente por la URL, lo redirigimos a inicio
        if (count($_POST) == 0) {
            redirect(base_url() . "paciente/inicio");
            return;
        }

        //añadimos la clave al array solo si el usuario ha introducido una nueva y ha cambiado el campo
        if ($this->input->post("clave") != "null") {
            if ($this->input->post("clave") != "") {
                $datos['clave'] = hash("sha512", $this->input->post("clave"));
            } else {
                //sesion temporal que servirá para mostrar un mensaje de error
                $this->session->set_flashdata("info", "error_clave");
                redirect(base_url() . "paciente/misdatos");
            }
        }


        $datos['correo'] = $this->input->post("correo");
        $datos['telefono'] = $this->input->post("telefono");
        $datos['fijo'] = $this->input->post("fijo");
        $datos['direccion'] = $this->input->post("direccion");


        //leemos de la session para usarlo en la clausula where
        $ciu = $this->session->userdata("ciu");
        $this->load->model("Paciente_m");

        if ($this->Paciente_m->actualizarDatos($datos, $ciu)) {
            //sesion temporal que servirá para mostrar un mensaje de informacion
            $this->session->set_flashdata("info", "ok");
            redirect(base_url() . "paciente/misdatos");
        } else {
            //sesion temporal que servirá para mostrar un mensaje de error
            $this->session->set_flashdata("info", "error_unk");
            redirect(base_url() . "paciente/misdatos");
        }
    }
}
