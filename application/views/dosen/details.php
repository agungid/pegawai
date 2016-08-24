<div class="relative">
	<?php echo $this->session->flashdata('notif'); ?>
	<div class="push">
	    <ol class="breadcrumb">
	        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
	        <li><a href="<?php echo base_url().''.$this->uri->segment(1)?>">Data Dosen</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</div>
	<table class="table">
		<?php $kelamin=$result->kelamin=='l'?'Laki-laki':'Perempuan';?>
		<tbody>
			<tr>
				<td width="200">Nama</td>
				<td width="2">:</td>
				<td><?php echo $result->nama; ?></td>

				<td width="180">Nama Ibu Kandung</td>
				<td width="2">:</td>
				<td><?php echo $result->nama_ibu; ?></td>
			</tr>
			<tr>
				<td width="200">NIDN</td>
				<td width="2">:</td>
				<td><?php echo $result->nidn; ?></td>

				<td width="200">Jenis Kelamin</td>
				<td width="2">:</td>
				<td><?php echo $kelamin ?></td>
			</tr>
			<tr>
				<td>Tempat Tanggal Lahir</td>
				<td width="2">:</td>
				<td><?php echo $result->tempat_lahir.' '.$result->tgl_lahir ?></td>

				<td>Status</td>
				<td width="2">:</td>
				<td><?php echo $result->status ?></td>
			</tr>
		</tbody>
	</table>
	<div style="border: 1px solid #efefef;">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs nav-tabcs" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Biodata</a></li>
	    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat Kepegawaian</a></li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content" style="margin: 10px;">
	    <div role="tabpanel" class="tab-pane active" id="home">
	    	<table class="table">
	    		<tbody>
	    			<tr>
	    				<td width="150">NIK</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nik; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Jalan</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->jalan; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Dusun</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->dusun; ?></td>
	    				<td width="30">RT</td>
	    				<td width="7">:</td>
	    				<td><?php echo $result->rt; ?></td>
	    				<td width="30">RW</td>
	    				<td width="7">:</td>
	    				<td><?php echo $result->rw; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kelurahan/Desa</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nama_desa; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kecamatan</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nama_kec; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kabupaten</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nama_kab; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Provinsi</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nama_prov; ?></td>
	    				<td width="90">Kode Pos</td>
	    				<td width="7">:</td>
	    				<td><?php echo $result->pos; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Telp</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->telp; ?></td>
	    				<td width="50">HP</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->hp; ?></td>
	    			</tr>
	    			<td width="150">Email</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->email; ?></td>
	    		</tbody>
	    	</table>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="profile">
	    	<table class="table">
	    		<tbody>
	    			<tr>
	    				<td width="230">NIP</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->nip; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">NPWP</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->np_wp; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Ikatan Keraj</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->ikatan_kerja; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Status Pegawai</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->status_pegawai; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Jenis Pegawai</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->jenis_pegawai; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Nomor SK CPNS</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->no_sk_cpns; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Nomor SK Pengangkatan</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->no_sk_pengangkatan; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Lembaga Pengangkatan</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->lembaga_pengangkat; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Pangkat Golongan</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->pangkat_golongan; ?></td>
	    			</tr>
	    			<tr>
	    				<td width="150">Sumber Gaji</td>
	    				<td width="20">:</td>
	    				<td><?php echo $result->sumber_gaji; ?></td>
	    			</tr>
	    		</tbody>
	    	</table>
	    </div>
	  </div>
	</div>
</div>