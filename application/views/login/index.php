<div class="container relative">
	<?php sidebar_not_login(); ?>
	<div class="col-md-9" style="border: 1px solid #efefef;">
		<?php echo form_open_multipart('login/post'); ?>

			<div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
				<?php echo $this->session->flashdata('pesan'); ?>
				<center><h4>Silahkan Masuk</h4></center>
				<table class="table no-borders" data-striped="true">
					<tbody>
						<tr>
							<td style="text-align: right;">Username</td>
							<td width="5">:</td>
							<td><input type="text" name="username" placeholder="Username" class="form-control input-sm"></td>
						</tr>
						<tr>
							<td style="text-align: right;">Password</td>
							<td>:</td>
							<td><input type="password" name="password" placeholder="Password" class="form-control input-sm"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><button type="submit" class="btn btn-custom btn-sm"><i class="fa fa-sign-in"></i> Masuk</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>