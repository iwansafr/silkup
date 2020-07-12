<?php

class Lpk_admin_model extends CI_Model
{
	public function my_lpk()
	{
		if(!empty($_SESSION))
		{
			$lpk = $this->db->query('SELECT param->>"$.lpk_id" AS id FROM member WHERE user_id = ?',$_SESSION[base_url().'_logged_in']['id'])->row_array();
			$lpk_id = !empty($lpk['id']) ? $lpk['id'] : 0;
			if(!empty($lpk_id))
			{
				return $this->db->query('SELECT * FROM lpk WHERE id = ?',$lpk_id)->row_array();
			}
		}
	}
	public function get_doc_id()
	{
		if(!empty($_SESSION))
		{
			$lpk = $this->db->query('SELECT param->>"$.lpk_id" AS id FROM member WHERE user_id = ?',$_SESSION[base_url().'_logged_in']['id'])->row_array();
			$lpk_id = !empty($lpk['id']) ? $lpk['id'] : 0;
			if(!empty($lpk_id))
			{
				$doc = $this->db->query('SELECT id FROM lpk_data_dok WHERE lpk_id = ?',$lpk_id)->row_array();
				$dok_id = !empty($doc['id']) ? $doc['id'] : 0;
				return $dok_id;
			}
		}
	}
}