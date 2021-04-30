<?php
class Assign_Rooms_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function countPeople(){
		$sql = "SELECT COUNT(*) c FROM personas";
		$res = $this->db->query($sql)->row();

		return $res->c;
	}

	public function countRooms(){
		$sql = "SELECT COUNT(*) c FROM salas";
		$res = $this->db->query($sql)->row();

		return $res->c;
	}

	public function countAssign(){
		$sql = "SELECT COUNT(*) c FROM salas_personas";
		$res = $this->db->query($sql)->row();

		return $res->c;
	}

	public function getPeople(){
		$sql = "SELECT id, CONCAT(nombre, ' ', apellido) persona FROM personas";
		$res = $this->db->query($sql)->result();

		return $res;
	}

	public function getRooms(){
		$sql = "SELECT id, nombre FROM salas";
		$res = $this->db->query($sql)->result();

		return $res;
	}

	public function getAssignRooms(){
		$sql = "SELECT sp.id, sp.idPersona, sp.idSala, sp.fechaYHora fecha, CONCAT(p.nombre, ' ', p.apellido) persona, ";
		$sql .= "s.nombre sala FROM salas_personas sp INNER JOIN personas p ON(sp.idPersona = p.id) INNER JOIN salas s  ";
		$sql .= "ON(sp.idSala = s.id)";
		$res = $this->db->query($sql)->result();

		return $res;
	}

	public function add($id, $data){
		if($id == 0)
			$this->db->insert('salas_personas', $data);
		else{
			$this->db->where('id', $id);
			$this->db->update('salas_personas', $data);
		}

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('salas_personas');

		if($this->db->affected_rows() > 0)
			return true;

		return false;
	}
}