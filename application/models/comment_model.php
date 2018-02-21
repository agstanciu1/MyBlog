<?php

class Comment_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function create_comment($article_id){
		$data = array (
			'article_id' => $article_id,
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'body' => $this->input->post('body'),
		);

		return $this->db->insert('comments', $data);
	}

	public function get_comments($article_id){
		$query = $this->db->get_where('comments', array('article_id' => $article_id));
		return $query->result_array();
	}
}