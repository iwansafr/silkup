<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lpk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('lpk_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}

	public function list()
	{
		$this->home_model->home();
		$data = $this->lpk_model->get_lpk_list();
		$this->load->view('index',['data'=>$data]);
	}

	public function detail($id = 0)
	{
		$this->home_model->home();
		$this->load->view('index',['data'=>$this->lpk_model->get_lpk($id),'program'=>$this->lpk_model->get_program_by_lpk($id)]);
	}
	public function program_detail($id = 0)
	{
		$this->home_model->home();
		$data = $this->lpk_model->get_program($id);
		$lpk = [];
		if(!empty($data))
		{
			$lpk = $this->db->query('SELECT value FROM lpk_data WHERE value->>"$.lpk_id" = ?',$data['lpk_id'])->row_array();
			$lpk = !empty($lpk) ? json_decode($lpk['value'],1) : [];
		}
		$this->load->view('index',['data'=>$data,'lpk'=>$lpk]);
	}

	public function e()
	{
		$this->load->view('error');
	}
}