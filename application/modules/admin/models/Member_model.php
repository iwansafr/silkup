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
}