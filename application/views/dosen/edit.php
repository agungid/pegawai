<div class="relative">
	<?php echo $this->session->flashdata('notif'); ?>
	<div class="push">
	    <ol class="breadcrumb">
	        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
	        <li><a href="<?php echo base_url().''.$this->uri->segment(1)?>">Data Dosen</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</div>
<?php echo form_open('dosen/update'); ?>
	<input type='hidden' name='id' value="<?php echo $result->id ?>">
	<table class="table">
		<tbody>
			<tr>
				<td width="200">Nama</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-9">
						<input type="text" name="nama" value="<?php echo $result->nama; ?>" class="form-control input-sm" placeholder="Nama Dosen">
						<?php echo form_error('nama', '<div class="message-form"</div>','</div>'); ?>
					</div>
				</td>

				<td width="180">Nama Ibu Kandung</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-9">
						<input type="text" name="nama_ibu" value="<?php echo $result->nama_ibu ?>" class="form-control input-sm" placeholder="Nama Ibu">
						<?php echo form_error('nama_ibu', '<div class="message-form"</div>','</div>'); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td width="200">NIDN</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-9">
						<input type="text" name="nidn" value="<?php echo $result->nidn ?>" class="form-control input-sm" placeholder="NIDN">
					</div>
				</td>

				<td width="200">Jenis Kelamin</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-6">
						<select class="form-control input-sm" name="kelamin">
							<?php
								if ($result->kelamin=='l') {
									echo "<option selected='selected' value=\"l\">Laki-laki</option><option value=\"p\">Perempuan</option>";
								}else{
									echo "<option value=\"l\">Laki-laki</option><option selected='selected' value=\"p\">Perempuan</option>";
								}
							?>
						</select>
						<?php echo form_error('kelamin', '<div class="message-form"</div>','</div>'); ?>
					</div>
					
				</td>
			</tr>
			<tr>
				<td>Tempat/Tanggal Lahir</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-4">
						<input type="text" name="tempat_lahir" value="<?php echo $result->tempat_lahir ?>" class="form-control input-sm" placeholder="Tempat Lahir">
						<?php echo form_error('tempat_lahir', '<div class="message-form"</div>','</div>'); ?>
					</div>
					
					<div class="col-md-4">
						<input type="text" name="tgl_lahir" value="<?php echo $result->tgl_lahir ?>" class="form-control input-sm" id="datepicker" placeholder="1993-07-29">
						<?php echo form_error('tgl_lahir', '<div class="message-form"</div>','</div>'); ?>
					</div>

				</td>

				<td>Status</td>
				<td width="2">:</td>
				<td>
					<div class="col-md-6">
						<select class="form-control input-sm" name="status">
							<?php
							foreach ($status as $value) {
								if ($value->status_id==$result->status_id) {
									echo "<option selected='selected' value=$value->status_id>$value->status</option>";
									continue;
								}
								echo "<option value=$value->status_id>$value->status</option>";
							}
							?>
						</select>
						<?php echo form_error('status', '<div class="message-form"</div>','</div>'); ?>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div style="border: 1px solid #efefef;">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs nav-tabcs" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Biodata</a></li>
	    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat Kepegawaian</a></li>
	    <input style='margin-left:890px; margin-top:3px;' type="submit" class="btn btn-warning btn-sm" value="Perbaharui">
	    <a style='margin-top:3px;' href="<?php echo base_url()."dosen" ?>" class="btn btn-danger btn-sm">Batal</a>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content" style="margin: 10px;">
	    <div role="tabpanel" class="tab-pane active" id="home">
	    	<table class="table">
	    		<tbody>
	    			<tr>
	    				<td width="150">NIK</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="nik" value="<?php echo $result->nik; ?>" class="form-control input-sm" placeholder="NIK">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Jalan</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<textarea name="jalan" class="form-control input-sm"><?php echo $result->jalan; ?></textarea>
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Dusun</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="dusun" value="<?php echo $result->dusun; ?>" class="form-control input-sm" placeholder="Dusun">
	    					</div>
	    				</td>
	    				<td width="30">RT</td>
	    				<td width="7">:</td>
	    				<td>
	    					<div class="col-md-6">
	    						<input type="text" name="rt" value="<?php echo $result->rt; ?>" class="form-control input-sm" placeholder="RT">
	    					</div>
	    				</td>
	    				<td width="30">RW</td>
	    				<td width="7">:</td>
	    				<td>
	    					<div class="col-md-6">
	    						<input type="text" name="rw" value="<?php echo $result->rw; ?>" class="form-control input-sm" placeholder="RW">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Provinsi</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-7">
	    						<select id='prov' class="form-control input-sm">
	    							<option value="">Pilih</option>
	    							<?php 
	    								foreach ($prov as $prov) {
	    									echo "<option value=$prov->prov_id>$prov->nama_prov</option>";
	    								}
	    							?>
	    						</select>
	    					</div>
	    				</td>
	    				<td width="90">Kode Pos</td>
	    				<td width="7">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="pos" value="<?php echo $result->pos; ?>" class="form-control input-sm" placeholder="Kode Pos">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kabupaten</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-7">
	    						<select id="kab" class="form-control input-sm">
	    						</select>
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kecamatan</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-7">
	    						<select id="kec" class="form-control input-sm">
	    						</select>
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Kelurahan/Desa</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-7">
	    						<select name="kelurahan" id="kel" class="form-control input-sm">
	    						</select>
	    						<?php echo form_error('kelurahan', '<div class="message-form"</div>','</div>'); ?>
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Agama</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-7">
	    						<select name="agama" class="form-control input-sm">
	    							<option value=''>Pilih</option>
	    							<?php
	    								foreach ($agama as $agama) {
	    									if ($agama->agama_id==$result->agama_id) {
	    										echo "<option selected='selected' value='".$agama->agama_id."'>".$agama->agama."</option>";
	    										continue;
	    									}
	    									echo "<option value='".$agama->agama_id."'>".$agama->agama."</option>";
	    								}
	    							?>
	    						</select>
	    						<?php echo form_error('agama', '<div class="message-form"</div>','</div>'); ?>
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Telp</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="telp" value="<?php echo $result->telp; ?>" class="form-control input-sm" placeholder="Nomor Telpon">
	    					</div>
	    				</td>
	    				<td width="50">HP</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="hp" value="<?php echo $result->hp; ?>" class="form-control input-sm" placeholder="Nomor HP">
	    					</div>
	    				</td>
	    			</tr>
	    			<td width="150">Email</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-12">
	    						<input type="text" name="email" value="<?php echo $result->email; ?>" class="form-control input-sm" placeholder="Alamat Email">
	    					</div>
	    				</td>
	    		</tbody>
	    	</table>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="profile">
	    	<table class="table">
	    		<tbody>
	    			<tr>
	    				<td width="230">NIP</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="nip" value="<?php echo $result->nip; ?>" class="form-control input-sm" placeholder="NIP">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">NPWP</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="np_wp" value="<?php echo $result->np_wp; ?>" class="form-control input-sm" placeholder="NPWP">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Ikatan Keraj</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="ikatan_kerja" value="<?php echo $result->ikatan_kerja; ?>" class="form-control input-sm" placeholder="Ikatan kerja">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Status Pegawai</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-2">
								<select class="form-control input-sm" name="status_pegawai">
									<?php
										if ($result->status_pegawai=='1') {
											echo "<option selected='selected' value=\"1\">Aktif</option><option value=\"0\">Tidak Aktif</option>";
										}else{
											echo "<option value=\"1\">Aktif</option><option selected='selected' value=\"0\">Tidak Aktif</option>";
										}
									?>
								</select>
							</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Jenis Pegawai</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="jenis_pegawai" value="<?php echo $result->jenis_pegawai; ?>" class="form-control input-sm" placeholder="Jenis pegawai">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Nomor SK CPNS</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="no_sk_cpns" value="<?php echo $result->no_sk_cpns; ?>" class="form-control input-sm" placeholder="Nomor SK CPNS">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Nomor SK Pengangkatan</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="no_sk_pengangkatan" class="form-control input-sm" placeholder="Nomor SK Pengangkatan">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Lembaga Pengangkatan</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="lembaga_pengangkat" value="<?php echo $result->lembaga_pengangkat; ?>" class="form-control input-sm" placeholder="Lembaga Pengangkat">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Pangkat Golongan</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="pangkat_golongan" value="<?php echo $result->pangkat_golongan; ?>" class="form-control input-sm" placeholder="Pangkat Golongan">
	    					</div>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td width="150">Sumber Gaji</td>
	    				<td width="20">:</td>
	    				<td>
	    					<div class="col-md-4">
	    						<input type="text" name="sumber_gaji" value="<?php echo $result->sumber_gaji; ?>" class="form-control input-sm" placeholder="Sumber gaji">
	    					</div>
	    				</td>
	    			</tr>
	    		</tbody>
	    	</table>
	    </div>
	  </div>
	</div>
	</form>
</div>