<?php
if(!empty($data))
{
	?>
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title"><?php echo $data['title'] ?></h3>
	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
					<h1><?php echo $data['title'] ?></h1>
					<center>
						<img src="<?php echo image_module('lpk_program',$data['id'].'/'.$data['foto']) ?>" alt="">
					</center>
					<hr>
					<?php echo $data['description'] ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
			<a href="<?php echo base_url('home/lpk/daftar_program/'.$data['id']) ?>" class="btn btn-success btn-lg"><i class="fa fa-user-plus"></i> Daftar</a>
	  </div>
	</div>
	<?php
}