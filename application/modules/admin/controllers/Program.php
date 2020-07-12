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
		$this->load->model('lpk_admin_model');
		$this->load->model('home/lpk_model');
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

	public function daftar()
	{
		$lpk = $this->lpk_admin_model->my_lpk();
		$program = [];
		if(!empty($lpk['id']))
		{
			$program = $this->lpk_model->get_program_by_lpk($lpk['id']);
		}
		$this->load->view('index',['lpk'=>$lpk,'program'=>$program]);
	}
	public function register($id = '')
	{
		$this->esg_model->set_nav_title('Daftar Program');
		$id = esg_decrypt($id);
		$program = $this->lpk_model->get_program($id);
		$this->load->view('index',['program'=>$program]);
	}
}