<div class="container" style="padding-bottom: 50px;">
	<div class="row">
			<h1 class="page-title col-md-7 col-md-offset-3">Edit Profile</h1>
			<div class="row">
				<!--<div class="col-md-5">
					<img src="<?= base_url() . "assets/attachment/profile/" . $role . "_" . $id ?>" />
					<input type="file" name="foto" class="btn btn-info" />
				</div>-->
				<div class="col-md-4 col-md-offset-4 col-sm-12">			
					<?php if($this->session->flashdata('profile_msg') == 'true') { ?>
		              <div class="alert alert-success">
		                <a class="close" data-dismiss="alert">×</a>
		                <b>Save sukses!</b> Profile berhasil diupdate.
		              </div>
		            <?php }else if($this->session->flashdata('profile_msg') == 'false'){ ?>
		            	<div class="alert alert-danger">
			                <a class="close" data-dismiss="alert">×</a>
			                <b>Save gagal!</b> Profile tidak tersimpan.
			              </div>
		            <?php } ?>

					<form method="POST" action="<?= base_url() . "site/save_profile" ?>">
						<input type="hidden" name="role" value="<?= $role ?>" />
						<input type="hidden" name="id" value="<?= $id ?>" />

						<div class="top-margin">
							<label>Email</label>
							<input type="text" class="form-control" disabled value="<?=$detail['email']?>" required />
						</div>
						<div class="top-margin">
							<label>Nama <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="nama" value="<?=$detail['nama']?>" required />
						</div>
						<div class="top-margin">
							<label>Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control" name="password" />
							<font color="red"><i>* Kosongkan field ini jika tidak ingin mengubah password</i></font>
						</div>
						<div class="top-margin">
							<label>No. Telp <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="no_telp" value="<?=$detail['no_telp']?>" required />
						</div>
						<div class="top-margin">
							<label>Alamat <span class="text-danger">*</span></label>
							<textarea class="form-control" name="alamat" required><?=$detail['alamat']?></textarea>
						</div>
						<?php if($role == 'mahasiswa'){ ?>
							<div class="top-margin">
								<label>Tahun Masuk <span class="text-danger">*</span></label>
								<select class="form-control" name="tahun_masuk">
									<option value="">- Pilih Tahun Masuk -</option>
									<?php for($i = 0; $i <= 20; $i++){ 
											$year = date('Y') - 20 + $i; ?>
											<option value="<?= $year ?>" <?=($detail['thn_masuk'] == $year ? 'selected' : '')?> ><?= $year ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="top-margin">
								<label>Jurusan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="jurusan" value="<?=$detail['jurusan']?>" required>
							</div>
						<?php }else{ ?>
							<div class="top-margin">
								<label>Facebook URL</label>
								<input type="url" class="form-control" name="facebook" value="<?=$detail['facebook']?>" required>
							</div>
							<div class="top-margin">
								<label>Twitter URL</label>
								<input type="url" class="form-control" name="twitter" value="<?=$detail['twitter']?>" required>
							</div>
							<div class="top-margin">
								<label>Keterangan</label>
								<textarea name="keterangan" class="form-control" name="keterangan" required><?=$detail['keterangan']?></textarea>
							</div>
						<?php } ?>
						
						<hr>
						<div class="row">
							<div class="col-lg-11 text-right">
								<button class="btn btn-action" type="submit">Simpan</button>
							</div>
						</div>
					</form>
        		</div>
			</div>
			<div class="clear"></div>
		</article>
	</div>
</div>

