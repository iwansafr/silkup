<?php

$form = new zea();

$form->init('edit');
$form->setTable('instruktur');
$form->addInput('nama','text');
$form->addInput('lpk_id','dropdown');
$form->setLabel('lpk_id','Instansi');
$form->removeNone('lpk_id');

if(check_role('member'))
{
	$user_detail = $this->db->query('SELECT param FROM member WHERE JSON_EXTRACT(member.param,"$.username") = ?',$user['username'])->row_array();
	if(!empty($user_detail))
	{
		$user_detail = json_decode($user_detail['param'],1);
		$form->tableOptions('lpk_id','lpk','id','title','id = '.$user_detail['lpk_id']);
	}
}
$form->addInput('tempat_lahir','text');
$form->addInput('tgl_lahir','text');
$form->setType('tgl_lahir','date');
$form->addInput('alamat','textarea');
$form->addInput('jk','dropdown');
$form->setOptions('jk',['1'=>'Laki-laki','2'=>'Perempuan']);
$form->setLabel('jk','Jenis Kelamin');
$form->addInput('hp','text');
$form->setRequired(['nama']);

$form->form();