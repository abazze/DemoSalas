<?php
class People_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function countPeople(){
		$sql = "SELECT COUNT(*) c FROM personas";
		$res = $this->db->query($sql)->row();

		return $res->c;
	}

	public function getPeople(){
		$sql = "SELECT id, nombre, apellido FROM personas";
		$res = $this->db->query($sql)->result();

		return $res;
	}

	public function addPeople($id, $data){
		if($id == 0)
			$this->db->insert('personas', $data);
		else{
			$this->db->where('id', $id);
			$this->db->update('personas', $data);
		}

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}

	public function validateDeletePeople($id){
		$sql = "SELECT COUNT(*) c FROM salas_personas WHERE idPersona = $id";
		$res = $this->db->query($sql)->row();

		if($res->c > 0)
			return false;

		return true;
	}

	public function deletePeople($id){
		$this->db->where('id', $id);
		$this->db->delete('personas');

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}
}