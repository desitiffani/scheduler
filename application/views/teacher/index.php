<div class="container">
	<div class="row">
		<article class="col-xs-12 maincontent">
			<div class="row">
				<header class="page-header col-md-12">
					<h1 class="page-title col-md-9">Jadwal dosen</h1>
				</header>
			</div>
			
			<div class="col-md-12 col-sm-12">
				<div class="row">
					<div class="col-md-9 col-sm-9">
						<!-- ERROR HANDLING-->
						<?php if($this->session->flashdata('add_activity_msg') == 'true') { ?>
			              <div class="alert alert-success">
			                <a class="close" data-dismiss="alert">×</a>
			                <b>Save sukses!</b> Aktifitas telah tersimpan.
			              </div>
			            <?php }else if($this->session->flashdata('add_activity_msg') == 'false'){ ?>
			            	<div class="alert alert-danger">
				                <a class="close" data-dismiss="alert">×</a>
				                <b>Save gagal!</b> Aktifitas tidak tersimpan.
				              </div>
			            <?php } ?>
			            <?php if($this->session->flashdata('delete_activity_msg') == 'true') { ?>
			              <div class="alert alert-success">
			                <a class="close" data-dismiss="alert">×</a>
			                <b>Hapus sukses!</b> Aktifitas telah dihapus.
			              </div>
			            <?php }else if($this->session->flashdata('add_activity_msg') == 'false'){ ?>
			            	<div class="alert alert-danger">
				                <a class="close" data-dismiss="alert">×</a>
				                <b>Hapus gagal!</b> Aktifitas tidak terhapus.
				              </div>
			            <?php } ?>

			            <!-- LIST DOSEN YANG DIFOLLOW-->	
	        			<ul class="list-group">
	        				<li class="list-group-item col-md-12">

	        				</li>
	        			</ul>
					</div>

					<!-- DISINI DAFTAR DOSENNYA-->
					<div class="col-md-3 col-sm-3">
						<!-- PENCARIAN DOSEN-->
						<form class="form-inline">
							<div class="form-group">
								<input type="text" class="form-control" name="search-dosen">
							</div>
							<button type="button" class="btn btn-theme"><i class="fa fa-search"></i></button>
						</form>

						<!-- LIST DAFTAR DOSEN-->
						<ul>
							<li></li>
						</ul>
					</div>
        		</div>
			</div>
		</article>
	</div>
</div>
