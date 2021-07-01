<?php
if (!empty($data)) {
	$param = json_decode($data['param'],1);
	pr($program);
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
							        <h4 class="modal-title">Modal Header</h4>
							      </div>
							      <div class="modal-body">
							        <p>Some text in the modal.</p>
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