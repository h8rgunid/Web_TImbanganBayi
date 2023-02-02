<?php

class M_baby extends CI_Model{
	protected $_table_baby = 'baby';
	protected $_table_users = 'users';

	public function read(){
		$this->db->select('*');
		return $this->db->get($this->_table_baby)->result();
	}
	public function read_by_user(){
		$query = 'SELECT * FROM `baby` b, users u WHERE b.id_user = u.id';
		return $this->db->query($query)->result();
	}

	public function group_by_user(){
		$query = 'SELECT * FROM `baby` b, users u WHERE b.id_user = u.id group by u.id';
		return $this->db->query($query)->result();
	}
	public function read_by_id($id){
		$this->db->where('id_baby', $id);
		return $this->db->get($this->_table_baby)->row();
	}

	public function create($data){
		return $this->db->insert($this->_table_baby, $data);
	}

	public function update($data, $id){
		$this->db->set($data);
		$this->db->where(['id_baby' => $id]);
		return $this->db->update($this->_table_baby);
	}

	public function delete($id){
		return $this->db->delete($this->_table_baby, ['id_baby' => $id]);
	}

	public function count(){
		return $this->db->get($this->_table_baby)->num_rows();
	}
	
	// public function count_by_email($id){
	// 	$this->db->select('a.*, u.name user_name');
	// 	$this->db->join($this->_table_users . ' u', 'a.user_id = u.id');
	// 	$this->db->where('u.email', $email);
	// 	return $this->db->get($this->_table . ' a')->num_rows();
	// }
}
