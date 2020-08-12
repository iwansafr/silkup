<?php

$is_member = check_role('member');
if($is_member)
{
	$form = new zea();

	$form->init('roll');
	$form->setNumbering();
	$form->setTable('instruktur');
	$form->form();
	$form->search();
	$form->addInput('id','hidden');
	$form->addInput('nama','plaintext');
	$form->addInput('lpk_id','dropdown');
	$form->setAttribute('lpk_id','disabled');
	$form->setLabel('lpk_id','Instansi');
	$form->removeNone('lpk_id');

	if($is_member)
	{
		$user_detail = $this->db->query('SELECT param FROM user_member WHERE user_member.param->>"$.username" = ?',$_SESSION[base_url('_logged_in')]['username'])->row_array();
		if(!empty($user_detail))
		{
			$user_detail = json_decode($user_detail['param'],1);
			$form->tableOptions('lpk_id','lpk','id','title','id = '.$user_detail['lpk_id']);
		}
	}
	$form->addInput('tempat_lahir','plaintext');
	$form->addInput('tgl_lahir','plaintext');
	$form->setType('tgl_lahir','date');
	$form->addInput('alamat','plaintext');
	$form->addInput('jk','dropdown');
	$form->setAttribute('jk','disabled');
	$form->setOptions('jk',['1'=>'Laki-laki','2'=>'Perempuan']);
	$form->setLabel('jk','Jenis Kelamin');
	$form->addInput('hp','plaintext');
	$form->setRequired(['nama']);
	$form->setUrl('admin/instruktur/clear_list');
	$form->setDelete(true);
	$form->setEdit(true);

	$form->form();
}