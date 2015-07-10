<!-- container -->
<div class="container">

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<div class="row">
				<header class="page-header col-md-12">
					<h1 class="page-title col-md-12">Ajukan Janji</h1>
				</header>
			</div>
			
			<div class="col-md-12 col-sm-12">
				<div class="row">					
					<form method="POST" action="<?= base_url() . "appointments/save" ?>">
						<div class="top-margin">
							<label>Dosen <span class="text-danger">*</span></label>
							<select name="id_dosen" class="form-control" required>
								<option value="">- Pilih Dosen -</option>
								<?php foreach ($teachers as $teacher) { ?>
									<option value="<?=$teacher['id_dosen']?>"><?= $teacher['nama'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="top-margin">
							<label>Waktu (yyyy-mm-dd H:m)<span class="text-danger">*</span></label>
							<input type="date-time" class="form-control" name="waktu_janji" required>
						</div>
						<div class="top-margin">
							<label>Keterangan <span class="text-danger">*</span></label>
							<textarea class="form-control" name="keterangan" required rows="5"></textarea>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-8">
								<!--<b><a href="">Forgot password?</a></b>-->
							</div>
							<div class="col-lg-4 text-right">
								<button class="btn btn-action" type="submit">Simpan</button>
								<a class="btn btn-default" href="<?= base_url() . "appointments" ?>">Batal</a>
							</div>
						</div>
					</form>
        		</div>
			</div>
			
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->