<?php
class category_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();

	}

	public function get_articles($category_id){

				$this->db->order_by('articles.id', 'DESC');
				$this->db->join('categories', 'categories.id = articles.category_id');
				$query = $this->db->get_where('articles', array('category_id' => $category_id));
				return $query->result_array();
			
	}

	public function get_category($id){
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row();
	}

	public function delete_category($id)	{
		$this->db->where('id', $id);
		$this->db->delete('categories');
		return true;
	}
}