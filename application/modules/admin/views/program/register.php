<?php
pr($program);
if(!empty($program))
{
	$form = new zea();
	$form->init('edit');
	$form->setTable('lpk_program_member');
	
	$form->setHeading('Daftar Program '.$program['title']);
	$form->setEditStatus(false);
	$form->addInput('user_id','static');
	$form->setValue('user_id',$user['id']);

	$form->form();	
}