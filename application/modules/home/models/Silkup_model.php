<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Silkup_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->get_popular_lpk();
	}
	public function get_popular_lpk()
	{
		$data = $this->db->query('SELECT param->>"$.lpk_id" AS lpk_ids,count(param->>"$.lpk_id") AS total FROM member GROUP BY param->>"$.lpk_id"')->result_array();
		pr($data);
	}
}