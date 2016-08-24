<div class="">
	<?php sidebar_not_login(); ?>
	<div class="col-md-9" style="border: 1px solid #efefef;">
		<div class='heading'>
			<center><h4 style='margin:0px;'>Daftar Pegawai Akademi Keperawatan Kabupaten Pamekasan</h4></center>
		</div>
		<div class='col-md-4 col-md-offset-4'>
			<table class='table'>
				<tbody>
					<tr>
						<td width='140'>Pilih Nama Dosen</td>
						<td width='3'>:</td>
						<td>
							<select name="dosen" id='dosen' class='form-control input-sm'>
								<option value="">Pilihan</option>
								<?php
									foreach ($result as $dosen) {
										echo "<option value=\"$dosen->id\">$dosen->nama</option>";
									}
								?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class='response'></div>
	</div>
</div>