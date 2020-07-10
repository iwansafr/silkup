<?php
if(!empty($lpk_id))
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$form = new zea();

	$form->init('edit');
	$form->setHeading('Program LPK');

	$form->setTable('lpk_program');
	$form->setId($id);
	$form->addInput('title','text');
	$form->setLabel('title','nama program');

	$form->addInput('description','textarea');
	$form->addInput('foto','file');
	$form->setAccept('foto','.jpg,.png,.jpeg');

	$form->addInput('lpk_id','static');
	$form->setValue('lpk_id',$lpk_id);

	$form->setRequired(['title']);
	$form->form();
}else{
	msg('halaman yang anda tuju tidak valid','danger');
}