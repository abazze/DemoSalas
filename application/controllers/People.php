<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('people_model', 'people', true);

		$this->data['titulo'] = 'Maestro de Personas';
		$this->data['description'] = 'Personas';
	}

	public function index(){
		$this->data['people'] = NULL;
		$this->data['count'] = $this->people->countPeople();

		if(intval($this->data['count']) > 0)
			$this->data['people'] = $this->people->getPeople();

		$this->data['view'] = 'people';
		$this->load->view('base', $this->data);
	}

	public function addPeople(){
		$id       = $this->input->post('idPeople');
		$nombre   = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');

		$msgOk    = ($id == 0) ? 'agregada' : 'actualizada';
		$msgError = ($id == 0) ? 'agregar' : 'actualizar';

		if($nombre && $apellido){
			$data = array(
				"nombre"   => $nombre,
				"apellido" => $apellido
			);

			if($this->people->addPeople($id, $data))
				$this->session->set_flashdata('success', 'Persona '.$msgOk.' de manera correcta');
			else
				$this->session->set_flashdata('error', 'No se ha podido '.$msgError.' la persona. Por favor inténtelo de nuevo');
		}
		else
			$this->session->set_flashdata('error', 'El nombre y el apellido son campos obligatorios');

		redirect('people');
	}

	public function deletePeople(){
		$id = $this->uri->segment(3);

		if($this->people->validateDeletePeople($id)){
			if($this->people->deletePeople($id))
				$this->session->set_flashdata('success', 'Persona eliminada');
			else
				$this->session->set_flashdata('error', 'No se ha podido eliminar la persona. Por favor inténtelo nuevamente');
		}
		else
			$this->session->set_flashdata('error', 'No se puede eliminar la persona porque se encuentra asignada a una sala');

		redirect('people');
	}
}