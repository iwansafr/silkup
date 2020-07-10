<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
	  <header class="main-header">
	    <?php $this->load->view('navbar') ?>
	  </header>
	  <div class="content-wrapper">
	    <div class="container">
	    	<?php if (!empty($mod)): ?>
	    		<?php if ($mod['content'] == 'home/index'): ?>
			      <?php $this->load->view('content_slider') ?>
			      <section class="content-header">
			        <h1>
			          <?php echo !empty($navigation['array'][1]) ? $navigation['array'][1]:'' ?>
			          <small><?php echo !empty($navigation['array'][1]) ? $navigation['array'][2]:'' ?></small>
			        </h1>
			        <ol class="breadcrumb">
			          <li><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		          	<li class="active"><?php echo end($navigation['array']) ?></a></li>
			        </ol>
			      </section>
			      <section class="content">
			      	<div class="row">
			      		<div class="col-md-3">
			      			<div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title">LPK Populer</h3>

				              <div class="box-tools pull-right">
				                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                </button>
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              <ul class="products-list product-list-in-box">
				                <li class="item">
				                  <div class="product-img">
				                    <img src="<?php echo image_module();?>" alt="Product Image">
				                  </div>
				                  <div class="product-info">
				                    <a href="javascript:void(0)" class="product-title">LPK 1
				                      <span class="label label-warning pull-right">$1800</span></a>
				                    	<span class="product-description">
			                          Lembaga Pelatihan Kerja 1
				                      </span>
				                  </div>
				                </li>
				                <!-- /.item -->
				                <li class="item">
				                  <div class="product-img">
				                    <img src="<?php echo image_module();?>" alt="Product Image">
				                  </div>
				                  <div class="product-info">
				                    <a href="javascript:void(0)" class="product-title">LPK 2
				                      <span class="label label-info pull-right">$700</span></a>
				                    <span class="product-description">
		                          Lembaga Pelatihan Kejra 2
		                        </span>
				                  </div>
				                </li>
				                <!-- /.item -->
				                <li class="item">
				                  <div class="product-img">
				                    <img src="<?php echo image_module();?>" alt="Product Image">
				                  </div>
				                  <div class="product-info">
				                    <a href="javascript:void(0)" class="product-title">LPK 3 <span
				                        class="label label-danger pull-right">$350</span></a>
				                    <span class="product-description">
		                          Lempaga Pelatihan Kerja 3
		                        </span>
				                  </div>
				                </li>
				              </ul>
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer text-center">
				              <a href="javascript:void(0)" class="uppercase">Lihat Semua LPK</a>
				            </div>
				            <!-- /.box-footer -->
				          </div>
				          <div class="box box-danger">
				            <div class="box-header with-border">
				              <h3 class="box-title">Kursus Populer</h3>

				              <div class="box-tools pull-right">
				                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                </button>
				              </div>
				            </div>
				            <div class="box-body">
				              <ul class="products-list product-list-in-box">
				                <li class="item">
				                  <div class="product-img" style="width: 100%;text-align: center;">
				                    <a href="javascript:void(0)" class="product-title">Kursus 1
				                    </a>
			                    	<span class="product-description">
		                          Kursus tentang 1
			                      </span>
				                  </div>
				                </li>
				                <li class="item">
													<div class="product-img" style="width: 100%;text-align: center;">
				                    <a href="javascript:void(0)" class="product-title">Kursus 2
				                    </a>
			                    	<span class="product-description">
		                          Kursus tentang 2
			                      </span>
				                  </div>
				                </li>
				                <li class="item">
				                  <div class="product-img" style="width: 100%;text-align: center;">
				                    <a href="javascript:void(0)" class="product-title">Kursus 3
				                    </a>
			                    	<span class="product-description">
		                          Kursus tentang 3
			                      </span>
				                  </div>
				                </li>
				              </ul>
				            </div>
				          </div>
			      		</div>
			      		<div class="col-md-9">
			      			<?php $this->load->view('content') ?>
			      		</div>
			      	</div>
			      </section>
	    		<?php else: ?>
	    			<section class="content-header">
			        <h1>
			          <?php echo !empty($navigation['array'][1]) ? $navigation['array'][1]:'' ?>
			          <small><?php echo !empty($navigation['array'][1]) ? $navigation['array'][2]:'' ?></small>
			        </h1>
			        <ol class="breadcrumb">
			          <li><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		          	<li class="active"><?php echo end($navigation['array']) ?></a></li>
			        </ol>
			      </section>
			      <section class="content">
		    			<?php $this->load->view($mod['content']) ?>
		    		</section>
	    		<?php endif ?>
	    	<?php endif ?>
	    </div>
	  </div>
	  <footer class="main-footer">
	    <div class="container">
	      <div class="pull-right hidden-xs">
	        <b>Version</b> 2.4.0
	      </div>
	      <strong>Copyright &copy; <?php echo $site['year'] ?>-<?php echo date('Y') ?> <a href="<?php echo $site['link'] ?>"><?php echo $site['title'] ?></a>.</strong> All rights
	      reserved.
	    </div>
	  </footer>
	</div>
	<?php $this->load->view('js') ?>
	<?php $this->load->view('script') ?>
</body>
</html>
