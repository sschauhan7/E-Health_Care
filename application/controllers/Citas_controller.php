<?php
defined('BASEPATH') or exit('No direct script access allowed');

//A esta clase solo está permitido el acceso por ajax.
class Citas_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
            return;
        }

        $this->load->model("Citas_model");
    }

    public function borrarCita()
    {
        $cita = $this->input->post("cita");

        $paciente = null;

        if ($this->input->post("propia") == true) {
            $paciente = $this->session->userdata("ciu");
        } else {
            $paciente = $this->input->post("ciu");
        }

        echo ($this->Citas_model->borrarCita($cita, $paciente)) ? true : false;
    }

    //metodo para buscar huecos para un medico
    public function buscarLibres()
    {
        $medico = $this->input->post("medico");
        $fecha = $this->input->post("fecha");
        $hora = $this->input->post("hora");
        $minuto = $this->input->post("minuto");

        //============================================
        //generamos un array con todas las horas posibles en las cuales se puede pedir cita
        $listaHoras = array();

        //horas. de 9 a 14 de la tarde
        for ($h = $hora; $h <= 14; $h++) {

            //la hora debe tener ceros a la izquierda si el numero es menor a 10
            if ($h < 10) $h = "0" . $h;

            //minutos. de 5 en 5 (max 14:55)
            for ($m = $minuto; $m <= 55; $m += 5) {

                //hacemos una string con la hora. los minutos deben tener ceros a la izquierda si el numero es menor a 10
                if ($m < 10) $m = "0" . $m;

                $horaCompleta = $h . ":" . $m . ":00";
                array_push($listaHoras, $horaCompleta);
            }
        }
        //============================================

        //cargamos el modelo de la base de datos
        $this->load->model("Citas_model");

        //convertimos la fecha a un objeto de tipo fecha
        $fecha = new DateTime($fecha);

        //array que contiene las horas que hay libres
        $libres = array();

        //mientras no haya al menos 10 huecos libres. puede mostrar mas, ya que va leyendo por dia
        while (count($libres) < 10) {

            //array que guardará las citas ocupadas para este dia
            $listaCitas = array();

            //leemos las horas de las citas de un medico, un dia concreto desde una hora
            $horas = $this->Citas_model->leerCitasDia($medico, $fecha->format("Y-m-d"), $hora . ":" . $minuto);

            //guardamos las horas ocupadas de este dia en listaCitas
            foreach ($horas->result() as $horaCita) {
                array_push($listaCitas, $horaCita->hora);
            }

            //comparamos todas las horas posibles con las horas ocupadas este dia
            foreach ($listaHoras as $horaLista) {

                //si la hora no está en la lista de horas generadas, es una posible cita
                if (!in_array($horaLista, $listaCitas)) {
                    array_push($libres, array($horaLista, $fecha->format("d-m-Y")));
                }
            }

            //aumentamos un dia la busqueda
            $fecha->add(new DateInterval("P1D"));
        }

        echo json_encode($libres);
    }

    public function seleccionarCita()
    {
        $medico = $this->input->post("medico");
        $info = $this->input->post("info"); //formato de info: 12:30:00,02-03-2020


        //tenemos que separar info en 2 partes, fecha y hora
        $datos = explode(",", $info);

        $hora = $datos[0];

        //tenemos que cambiar el formato de la fecha, pasarlo de dia-mes-año a año-mes-dia
        $fecha = new Datetime($datos[1]);
        $fecha = new Datetime($fecha->format("Y-m-d"));

        $paciente = $this->session->userdata("ciu");

        $this->load->model("Citas_model");

        if ($this->Citas_model->seleccionarCita($medico, $paciente, $fecha->format("Y-m-d"), $hora)) {
            echo true;
        }
    }
}
