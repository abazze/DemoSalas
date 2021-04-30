<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->data['titulo'] = 'Asignación de Salas';
		$this->data['description'] = 'Bienvenido al sistema de asignación de salas';
		$this->data['view'] = 'home';
		$this->load->view('base', $this->data);
	}
}
