<div class="relative">
	<div class="col-md-9 col-bordered">
		<div class="heading">
			<span><?php echo $title; ?></span>
		</div>
		<?php echo form_open('fakultas/post'); ?>
		<table class="table">
			<tr>
				<td width="150">Fakultas</td>
				<td width="7">:</td>
				<td>
					<div class="col-md-6"><input type="text" name="fakultas" value="<?php echo set_value('fakultas') ?>" class="form-control input-sm" placeholder="Nama Fakultas"></div>
					<?php echo form_error('fakultas', '<div class="message-form"</div>','</div>'); ?>
				</td>
			</tr>
			<tr>
				<td>Dekan Fakultas</td>
				<td>:</td>
				<td>
					<div class="col-md-6">
						<input type="text" name="dekan" class="form-control input-sm" value="<?php echo set_value('dekan') ?>" placeholder="Nama Dekan">
					</div>
					<?php echo form_error('dekan', '<div class="message-form"</div>','</div>'); ?>
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
	<div class="col-md-3" style="padding: 0px; padding-left: 15px;">
		test
	</div>
</div>