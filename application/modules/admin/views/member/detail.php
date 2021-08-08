<?php
if (!empty($data)) {
	$param = json_decode($data['param'],1);
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Data Diri</div>
		<div class="panel-body">
			<table class="table">
				<tr>
					<td>Nama</td>
					<td>: <?php echo $param['nama'] ?> </td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: <?php echo $param['email'] ?> </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?php echo $param['alamat'] ?> </td>
				</tr>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>No</th>
					<th>LPK</th>
					<th>Pembayaran 1</th>
					<th>Pembayaran 2</th>
				</thead>
				<?php
				$i = 1;
				$lunas = ['Belum Lunas','Lunas'];
				foreach ($program as $key => $value) {
					$program_param = json_decode($value['param'],1);
					?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $program_param['title'] ?> </td>
						<td>
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#p1_<?php echo $value['id'];?>">Detail</button>
							<div id="p1_<?php echo $value['id'];?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Bukti Pembayaran</h4>
							      </div>
							      <div class="modal-body">
							      	<?php if (!empty($value['param_pembayaran_1']) && $value['param_pembayaran_1'] != 'null'): ?>
							      		<?php $param_pembayaran_1 = json_decode($value['param_pembayaran_1'],1) ?>
								        <table class="table">
								        	<tr>
								        		<td>Status</td>
								        		<td><?php echo $lunas[$param_pembayaran_1['lunas']] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nominal</td>
								        		<td><?php echo number_format($param_pembayaran_1['nominal'],0,2,'.') ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nama Bank</td>
								        		<td><?php echo $param_pembayaran_1['Nama_Bank'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Atas Nama</td>
								        		<td><?php echo $param_pembayaran_1['atas_nama'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nomor Rekening</td>
								        		<td><?php echo $param_pembayaran_1['Nomor_Rekening'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Bukti Transfer</td>
								        		<td><img src="<?php echo image_module('lpk_program_member',$value['name'].'/'.$param_pembayaran_1['bukti_transfer']) ?>" class="img img-responsive"></td>
								        	</tr>
								        </table>
								       <?php else: ?>
								       	<p>Belum Bayar</p>
							      	<?php endif ?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>
						</td>		
						<td>
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#p2_<?php echo $value['id'];?>">Detail</button>
							<div id="p2_<?php echo $value['id'];?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Bukti Pembayaran</h4>
							      </div>
							      <div class="modal-body">
							      	<?php if (!empty($value['param_pembayaran_2']) && $value['param_pembayaran_2'] != 'null'): ?>
							      		<?php pr($value['param_pembayaran_2']) ?>
							      		<?php $param_pembayaran_2 = json_decode($value['param_pembayaran_2'],1) ?>
								        <table class="table">
								        	<tr>
								        		<td>Status</td>
								        		<td><?php echo $lunas[$param_pembayaran_2['lunas']] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nominal</td>
								        		<td><?php echo number_format($param_pembayaran_2['nominal'],0,2,'.') ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nama Bank</td>
								        		<td><?php echo $param_pembayaran_2['Nama_Bank'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Atas Nama</td>
								        		<td><?php echo $param_pembayaran_2['atas_nama'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nomor Rekening</td>
								        		<td><?php echo $param_pembayaran_2['Nomor_Rekening'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Bukti Transfer</td>
								        		<td><img src="<?php echo image_module('lpk_program_member',$value['name'].'/'.$param_pembayaran_2['bukti_transfer']) ?>" class="img img-responsive"></td>
								        	</tr>
								        </table>
								       <?php else: ?>
								       	<p>Belum Bayar</p>
							      	<?php endif ?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>
						</td>		
					</tr>
					<?php
				}?>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
	<?php
}