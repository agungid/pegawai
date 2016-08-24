<div class="relative">
	<?php echo $this->session->flashdata('notif'); ?>
	<div class="push">
	    <ol class="breadcrumb">
	        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</div>
	<div class="col-md-9 col-bordered">
		<div class="heading">
			<div class="col-md-6" style="margin-top: 5px;"><?php echo $title; ?></div>
			<div style="text-align:right;"><a href="<?php echo base_url()?>/jurusan/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambahkan Data</a></div>
		</div>
		<table id="fakultas_id" class="table table-bordered">
			<thead>
				<tr>
					<th width="40">No</th>
					<th>Jurusan</th>
					<th>Fakultas</th>
					<th>Dekan</th>
					<th width="80"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach($result as $data){
					echo "<tr class='tr".$data->jurusan_id."'>
						<td>$no</td>
						<td>$data->nama_jurusan</td>
						<td>$data->fakultas</td>
						<td>$data->dekan</td>
						<td>
							<a href='".base_url()."/fakultas/edit/".$data->jurusan_id."'><i class='fa fa-edit edit-table'></i></a> | 
							<a href='javascript:;' onclick='del_fk($data->jurusan_id)'><i class='fa fa-trash delete-table'></i></a>
						</td>
					</tr>";
					$no++;
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-3" style="padding: 0px; padding-left: 15px; max-height: 300px; overflow: scroll; overflow-x: hidden;" >
		<?php show_log(); ?>
	</div>
</div>