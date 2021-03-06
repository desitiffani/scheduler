<div class="container">
	<div class="row">
			<h1 class="page-title col-md-12">Tambah Aktifitas untuk <?=date('d M Y')?></h1>
			<div class="row">
				<div class="col-md-5 col-sm-12 col-md-offset-3">			
					<form method="POST" action="<?= base_url() . "schedules/save" ?>">
						<input type="hidden" name="mode" value="<?= $mode ?>" />
						<?php if ($mode == 'EDIT') { ?>
							<input type="hidden" name="id_kegiatan" value="<?= $detail['id_kegiatan'] ?>" />
						<?php } ?>
						<div class="top-margin">
							<label>Judul <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="judul" required value="<?=$mode == 'EDIT' ? $detail['judul'] : ''?>" />
						</div>
						<div class="top-margin">
							<label>Jam (h:m) <span class="text-danger">*</span></label>
							<div class="row">
								<div class="col-md-4">
									<input type="time" class="form-control" name="jam_mulai" required value="<?=$mode == 'EDIT' ? $detail['jam_mulai'] : ''?>">
								</div>
								<div class="col-md-2">
									sampai
								</div>
								<div class="col-md-4">
									<input type="time" class="form-control" name="jam_selesai" required value="<?=$mode == 'EDIT' ? $detail['jam_selesai'] : ''?>">
								</div>
							</div>
						</div>
						<div class="top-margin">
							<label>Tempat <span class="text-danger">*</span></label>
							<textarea class="form-control" name="tempat" required rows="1"><?=$mode == 'EDIT' ? $detail['tempat'] : ''?></textarea>
						</div>
						<div class="top-margin">
							<label>Letak Geografis</label>
							<input type="text" class="form-control" name="letak_geografis" value="<?=$mode == 'EDIT' ? $detail['letak_geografis'] : ''?>">
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-11 text-right">
								<button class="btn btn-action" type="submit">Simpan</button>
								<a class="btn btn-default" href="<?= base_url() . "schedules" ?>">Batal</a>
							</div>
						</div>
					</form>
        		</div>
			</div>
		</article>
	</div>
</div>

