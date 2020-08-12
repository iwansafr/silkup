<?php

if(is_admin() || is_root())
{
	$this->load->dbforge();
	if(!$this->db->field_exists('longitude','lpk'))
	{
		$fields = array(
      'longitude' => array(
              'type' => 'VARCHAR',
              'constraint' => '255',
              'default' => '0',
              'after' => 'description'
      ),
		);
		$this->dbforge->add_column('lpk',$fields);
	}
	if(!$this->db->field_exists('latitude','lpk'))
	{
		$fields = array(
      'latitude' => array(
              'type' => 'VARCHAR',
              'constraint' => '255',
              'default' => '0',
              'after' => 'description'
      ),
		);
		$this->dbforge->add_column('lpk',$fields);
	}
	$form = new zea();
	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$form->setId($id);

	$form->init('edit');
	$form->setTable('lpk');

	$form->addInput('title','text');
	$form->setLabel('title','nama');
	$form->addInput('image','file');
	$form->setAccept('image','.jpg,.png,.jpeg');
	$form->addInput('description','textarea');
	$form->setUnique(['title'],'{value} sudah terdaftar silahkan pilih nama lain');
	$form->addInput('longitude','hidden');
	$form->addInput('latitude','hidden');
	$form->setRequired('All');

	$form->form();
}