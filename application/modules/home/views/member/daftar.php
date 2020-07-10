<?php
if(!empty($role_siswa))
{
	pr($_POST);
	$this->zea->init('param');

	$this->zea->setTable('member');
	$this->zea->setId($id);
	$name = !empty($name) ? $name : uniqid();
	$this->zea->setParamName($name);
	$this->zea->param_field = 'param';
	$this->zea->addInput('nama','text');
	$this->zea->setLabel('nama','Nama Lengkap');
	$this->zea->addInput('name','hidden');
	$this->zea->setValue('name',$name);
	$this->zea->addInput('alamat','textarea');
	$this->zea->addInput('image_foto_diri','file');
	$this->zea->setAccept('image_foto_diri','.jpg, .png, .jpeg');
	$this->zea->setLabel('image_foto_diri','foto');
	$this->zea->addInput('jenis_kelamin','dropdown');
	$this->zea->setOptions('jenis_kelamin',['1'=>'Laki-laki','2'=>'Perempuan']);
	$this->zea->addInput('no_wa','text');
	$this->zea->setLabel('no_wa','WA yg bisa dihubungi');
	$this->zea->setType('no_wa','number');
	$this->zea->setAttribute('no_wa',['placeholder'=>'contoh format : 6281000000000']);

	$this->zea->addInput('username','text');
	$this->zea->addInput('email','text');
	$this->zea->setType('email','email');
	$this->zea->addInput('password','password');

	// $this->zea->addInput('user_role_id','dropdown');
	// $this->zea->setLabel('user_role_id','Level');
	// $this->zea->setOptions('user_role_id',[$role_siswa['id']=>$role_siswa['title']]);

	$this->zea->addInput('user_role_id','static');
	$this->zea->setValue('user_role_id',$role_siswa['id']);

	$this->zea->startCollapse('username','User Detail');
	$this->zea->endCollapse('user_role_id');
	$this->zea->setCollapse('username',FALSE);
	if(!empty($user_id))
	{
		$this->zea->addInput('user_id','static');
		$this->zea->setValue('user_id',$user_id);
	}

	$this->zea->setEnableDeleteParam(false);
	$this->zea->setFormName('member_edit');

	$this->zea->editJoin([
		'table'=>'user',
		'field'=>['username','password','email','user_role_id'],
		'key'=>'user_id',
	]);
	$this->zea->setEncrypt(['password']);
	$this->zea->setUnique(['username'],'{value} sudah terdaftar silahkan pilih username lain');
	$this->zea->setRequired(['nama','username','password','email','no_wa']);

	$this->zea->form();
}else{
	msg('mohon maaf form siswa tidak ditemukan','danger');
}