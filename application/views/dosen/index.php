<div class="relative">
	<?php echo $this->session->flashdata('notif'); ?>
	<div class="push">
	    <ol class="breadcrumb">
	        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</div>
	<div class="col-md-12 col-bordered">
		<div class="heading">
			<div class="col-md-6" style="margin-top: 5px;"><?php echo $title; ?></div>
			<div style="text-align:right;"><a href="<?php echo base_url()?>dosen/add" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambahkan Data</a></div>
		</div>
<!-- 		<input type="hidden" name="csrf_test_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
		<table id="fakultas_id" class="table table-bordered">
			<thead>
				<tr>
					<th width="40">No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>NIDN</th>
					<th>Email</th>
					<th>Status</th>
					<th>Tempat Lahir</th>
					<th>NPWP</th>
					<th width="80"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach($result as $data){
					echo "<tr class='tr".$data->id."'>
						<td>$no</td>
						<td><a href='".base_url()."dosen/details/".$data->id."'>$data->nama</a></td>
						<td>$data->nik</td>
						<td>$data->nidn</td>
						<td>$data->email</td>
						<td>$data->status</td>
						<td>$data->tempat_lahir</td>
						<td>$data->np_wp</td>
						<td>
							<a href='".base_url()."dosen/edit/".$data->id."'><i class='fa fa-edit edit-table'></i></a> | 
							<a href='javascript:;' onclick='del_fk($data->id)'><i class='fa fa-trash delete-table'></i></a>
						</td>
					</tr>";
					$no++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>