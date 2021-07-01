<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
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
		$role_member = $this->member_model->member_role('member');
		$this->load->view('index',['role_member'=>$role_member]);
	}

	public function clear_list()
	{
		$role_member = $this->member_model->member_role('member');
		$this->load->view('member/index',['role_member'=>$role_member]);
	}

	public function edit()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM user_member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';

		$role_member = $this->member_model->member_role('member');
		$this->load->view('index',['name'=>$name,'id'=>$id,'role_member'=>$role_member]);
	}

	public function siswa($id = 0)
	{
		$role_member = $this->member_model->member_role('siswa');
		$title = !empty($id) ? $this->db->query('SELECT title FROM lpk WHERE id = ?',$id)->row_array() : '';
		if(!empty($title))
		{
			$this->esg_model->set_nav_title('data siswa '.$title['title']);
		}
		$this->load->view('index',['role_member'=>$role_member,'id'=>$id]);
	}

	public function clear_siswa($id = 0)
	{
		$role_member = $this->member_model->member_role('siswa');
		$title = !empty($id) ? $this->db->query('SELECT title FROM lpk WHERE id = ?',$id)->row_array() : '';
		if(!empty($title))
		{
			$this->esg_model->set_nav_title('data siswa '.$title['title']);
		}
		$this->load->view('member/siswa',['role_member'=>$role_member,'id'=>$id]);
	}

	public function siswa_edit()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM user_member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';

		$role_member = $this->member_model->member_role('siswa');
		$this->load->view('index',['name'=>$name,'id'=>$id,'role_member'=>$role_member]);
	}
	public function detail($kode = '')
	{
		$data = $this->db->get_where('user_member',['name'=>$kode])->row_array();
		$program = $this->db->get_where('lpk_program_member',['user_id'=>@intval($data['user_id'])])->result_array();
		$this->load->view('index', [
			'data'=>$data,
			'program' => $program
		]);
	}
}