<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_Rooms extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('assign_rooms_model', 'assign', true);

		$this->data['titulo'] = 'Asignar Salas';
		$this->data['description'] = 'Asignar Salas a Personas';
	}

	public function index(){
		$this->data['people'] = NULL;
		$this->data['rooms']  = NULL;
		$this->data['assign'] = NULL;
		$this->data['countPeople'] = $this->assign->countPeople();
		$this->data['countRooms']  = $this->assign->countRooms();
		$this->data['countAssign'] = $this->assign->countAssign();

		if(intval($this->data['countPeople']) > 0)
			$this->data['people'] = $this->assign->getPeople();
		if(intval($this->data['countRooms']) > 0)
			$this->data['rooms'] = $this->assign->getRooms();
		if(intval($this->data['countAssign']) > 0)
			$this->data['assign'] = $this->assign->getAssignRooms();

		$this->data['view'] = 'assign_rooms';
		$this->load->view('base', $this->data);
	}

	public function add(){
		$id       = $this->input->post('idAssign');
		$persona = $this->input->post('persona');
		$sala    = $this->input->post('sala');
		$fecha   = $this->input->post('fecha');

		$msgOk    = ($id == 0) ? 'agregada' : 'actualizada';
		$msgError = ($id == 0) ? 'agregar' : 'actualizar';

		if($persona && $sala && $fecha){
			$data = array(
				"idPersona"  => $persona,
				"idSala"     => $sala,
				"fechaYHora" => $fecha
			);
			if($this->assign->add($id, $data))
				$this->session->set_flashdata('success', 'Asignación '.$msgOk.' de manera correcta');
			else
				$this->session->set_flashdata('error', 'No se ha podido '.$msgError.' la asignación. Por favor inténtelo de nuevo');
		}
		else
			$this->session->set_flashdata('error', 'Todos los campos son obligatorios');

		redirect('assign_rooms');
	}

	public function delete(){
		$id = $this->uri->segment(3);

			if($this->assign->delete($id))
				$this->session->set_flashdata('success', 'Asignación eliminada');
			else
				$this->session->set_flashdata('error', 'No se ha podido eliminar la asignación. Por favor inténtelo nuevamente');

		redirect('assign_rooms');
	}
}