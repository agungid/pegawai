<div class="relative">
	<div class="col-md-9 col-bordered">
		<div class="heading">
			<span><?php echo $title; ?></span>
		</div>
		<?php echo form_open('jurusan/post'); ?>
		<table class="table">
			<tr>
				<td width="150">Fakultas <span class="wajib">*</span></td>
				<td width="7">:</td>
				<td>
					<div class="col-md-3">
						<select name="fakultas_id" class="form-control input-sm">
							<option value="">Pilih</option>
							<?php foreach ($result as $value): ?>
								<option value="<?= $value->id ?>"><?=$value->fakultas?></option>
							<?php endforeach ?>
						</select>
					</div>
					<?php echo form_error('fakultas_id', '<div class="message-form"</div>','</div>'); ?>
				</td>
			</tr>
			<tr>
				<td>Nama Jurusan <span class="wajib">*</span></td>
				<td>:</td>
				<td>
					<div class="col-md-6">
						<input type="text" name="nama_jurusan" class="form-control input-sm" value="<?php echo set_value('nama_jurusan') ?>" placeholder="Nama Jurusan">
					</div>
					<?php echo form_error('nama_jurusan', '<div class="message-form"</div>','</div>'); ?>
				</td>
			</tr>
			<tr>
				<td>Gelar</td>
				<td>:</td>
				<td>
					<div class="col-md-6">
						<input type="text" name="gelar" class="form-control input-sm" value="<?php echo set_value('gelar') ?>" placeholder="Gelar">
					</div>
					<?php echo form_error('gelar', '<div class="message-form"</div>','</div>'); ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<div class="col-md-8">
						<input type="submit" class="btn btn-custom btn-sm" value="Simpan">
					</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div class="col-md-3" style="padding: 0px; padding-left: 15px; max-height: 300px; overflow: scroll; overflow-x: hidden;" >
		<?php show_log(); ?>
	</div>
</div>