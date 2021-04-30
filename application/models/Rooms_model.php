<?php
class Rooms_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function countRooms(){
		$sql = "SELECT COUNT(*) c FROM salas";
		$res = $this->db->query($sql)->row();

		return $res->c;
	}

	public function getRooms(){
		$sql = "SELECT id, nombre FROM salas";
		$res = $this->db->query($sql)->result();

		return $res;
	}

	public function addRooms($id, $data){
		if($id == 0)
			$this->db->insert('salas', $data);
		else{
			$this->db->where('id', $id);
			$this->db->update('salas', $data);
		}

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}

	public function validateDeleteRoom($id){
		$sql = "SELECT COUNT(*) c FROM salas_personas WHERE idSala = $id";
		$res = $this->db->query($sql)->row();

		if($res->c > 0)
			return false;

		return true;
	}

	public function deleteRoom($id){
		$this->db->where('id', $id);
		$this->db->delete('salas');

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}
}