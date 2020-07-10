<?php

class Member_model extends CI_Model
{
	public function member_role($title = '')
	{
		if(!empty($title))
		{
			return $this->db->query('SELECT id,title FROM user_role WHERE title = ?',$title)->row_array();
		}
	}

	public function get_lpk_id()
	{
		if(check_role('member'))
		{
			$lpk = $this->db->query('SELECT member.param->>"$.lpk_id" AS id FROM member WHERE user_id = ?',$_SESSION[base_url().'_logged_in']['id'])->row_array();
			if(!empty($lpk['id']))
			{
				return $lpk['id'];
			}
		}
		return 0;
	}
}