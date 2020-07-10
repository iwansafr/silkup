<?php

if(is_admin() || is_root())
{
	$form = new zea();
	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$form->setId($id);

	$form->init('edit');
	$form->setTable('lpk');

	$form->addInput('title','text');
	$form->addInput('image','file');
	$form->setAccept('image','.jpg,.png,.jpeg');
	$form->addInput('description','textarea');

	$form->setRequired('All');

	$form->form();
}