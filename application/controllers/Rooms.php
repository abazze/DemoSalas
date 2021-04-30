<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('rooms_model', 'rooms', true);

		$this->data['titulo'] = 'Maestro de Salas';
		$this->data['description'] = 'Salas';
	}

	public function index(){
		$this->data['rooms'] = NULL;
		$this->data['count'] = $this->rooms->countRooms();

		if(intval($this->data['count']) > 0)
			$this->data['rooms'] = $this->rooms->getRooms();

		$this->data['view'] = 'rooms';
		$this->load->view('base', $this->data);
	}

	public function addRooms(){
		$id     = $this->input->post('idRooms');  
		$nombre = $this->input->post('nombre');

		$msgOk    = ($id == 0) ? 'agregada' : 'actualizada';
		$msgError = ($id == 0) ? 'agregar' : 'actualizar';

		if($nombre){
			$data = array("nombre" => $nombre);
			if($this->rooms->addRooms($id, $data))
				$this->session->set_flashdata('success', 'Sala '.$msgOk.' de manera correcta');
			else
				$this->session->set_flashdata('error', 'No se ha podido '.$msgError.' la sala. Por favor inténtelo de nuevo');
		}
		else
			$this->session->set_flashdata('error', 'El nombre es un campo obligatorio');

		redirect('rooms');
	}

	public function deleteRoom(){
		$id = $this->uri->segment(3);

		if($this->rooms->validateDeleteRoom($id)){
			if($this->rooms->deleteRoom($id))
				$this->session->set_flashdata('success', 'Sala eliminada');
			else
				$this->session->set_flashdata('error', 'No se ha podido eliminar la sala. Por favor inténtelo nuevamente');
		}
		else
			$this->session->set_flashdata('error', 'No se puede eliminar la sala porque se encuentra asignada a una persona');

		redirect('rooms');
	}
}