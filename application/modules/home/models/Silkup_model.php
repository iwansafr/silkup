<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Silkup_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->set_popular_lpk();
	}
	public function get_popular_lpk()
	{
		$data = $this->db->query('SELECT param->>"$.lpk_id" AS lpk_id,count(param->>"$.lpk_id") AS total,lpk.* FROM member INNER JOIN lpk ON(lpk.id=param->>"$.lpk_id") WHERE param->>"$.lpk_id" > 0 GROUP BY param->>"$.lpk_id" ORDER BY total DESC LIMIT 6')->result_array();
		if(!empty($data))
		{
			return $data;
		}
	}
	public function set_popular_lpk()
	{
		$data = $this->get_popular_lpk();
		if(!empty($data))
		{
			$this->esg->set_esg('popular_lpk',$data);
		}
	}
}