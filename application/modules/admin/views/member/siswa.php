<?php
if(!empty($role_member))
{
	$id = !empty($id) ? intval($id) : 0;
	$form = new zea();

	$form->init('roll');

	if(check_role('member'))
	{
		$lpk = $this->db->query('SELECT member.param->>"$.lpk_id" AS id FROM member WHERE user_id = ?',$user['id'])->row_array();
		if(!empty($lpk))
		{
			$id = $lpk['id'];
		}
	}

	$form->setTable('member');
	$form->search();
	$form->join('user','ON(member.user_id = user.id)',
		'member.id, member.name, member.param->>"$.nama" AS nama,
		 member.param->>"$.alamat" AS alamat,
		 user.username,
		 member.param->>"$.email" AS email,
		 member.param->>"$.user_role_id" AS user_role_id
		 ');
	$where = '';
	if(!empty($id))
	{
		$where = ' AND member.param->>"$.lpk_id" = '.$id;
	}
	$form->setWhere('member.param->>"$.user_role_id" = '.$role_member['id'].' '.$where);
	$form->setParamName(uniqid());
	$form->param_field = 'param';
	$form->addInput('id','plaintext');
	$form->setLabel('id','action');
	$form->setPlaintext('id',
		[base_url('admin/member/detail/{name}')=>'detail'],
		[base_url('admin/member/edit?id={id}')=>'edit']
	);
	$form->addInput('nama','plaintext');
	$form->addInput('name','plaintext');
	$form->setLabel('name','kode');
	$form->addInput('alamat','plaintext');

	$form->addInput('username','plaintext');
	$form->addInput('email','plaintext');
	$form->setType('email','email');

	$form->addInput('user_role_id','dropdown');
	$form->setOptions('user_role_id',[$role_member['id']=>$role_member['title']]);
	$form->setLabel('user_role_id','group');
	$form->setAttribute('user_role_id','disabled');


	$form->startCollapse('username','User Detail');
	$form->endCollapse('user_role_id');
	$form->setCollapse('username',FALSE);

	$form->setDelete(true);
	$form->setEdit(true);
	$form->setEditLink('siswa_edit?id=');

	$form->setEnableDeleteParam(false);
	$form->setNumbering(true);
	$form->setUrl('admin/member/clear_siswa/'.$id);

	$form->form();
}else{
	msg('mohon maaf group member tidak tersedia','danger');
}