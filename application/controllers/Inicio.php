<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		//carga el head con una hoja de estilos
		$this->load->view("modules/head", array("hojas" => array("inicio")));

		//carga la vista de inicio
		$this->load->view("Inicio_v");
	}
}
