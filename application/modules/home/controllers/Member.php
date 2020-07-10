<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('home_model');
		$this->load->model('admin/member_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function clear_list()
	{
		$this->load->view('member/index');
	}

	public function daftar()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';

		$role_siswa = $this->member_model->member_role('siswa');

		$this->load->view('index',['name'=>$name,'id'=>$id,'role_siswa'=>$role_siswa]);
	}
}