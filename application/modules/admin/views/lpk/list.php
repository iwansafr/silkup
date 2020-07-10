<?php

if(is_admin() || is_root())
{
	$form = new zea();

	$form->init('roll');
	$form->setTable('lpk');

	$form->search();
	$form->setNumbering(true);

	$form->addInput('id','plaintext');
	$form->addInput('title','plaintext');
	$form->addInput('image','thumbnail');
	$form->addInput('description','plaintext');

	$form->setRequired('All');
	$form->setUrl('admin/lpk/clear_list');

	$form->setEdit(true);
	$form->setDelete(true);

	$form->form();
}