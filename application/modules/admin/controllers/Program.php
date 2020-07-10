<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('member_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function list()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('index',['lpk_id'=>$lpk_id]);
	}

	public function clear_list()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('program/list',['lpk_id'=>$lpk_id]);
	}
	public function edit()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('index',['lpk_id'=>$lpk_id]);
	}
}