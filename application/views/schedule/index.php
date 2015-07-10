<div class="container">
	<div class="row">
		<article class="col-xs-12 maincontent">
			<div class="row">
				<header class="page-header col-md-12">
					<h1 class="page-title col-md-9">Jadwal untuk <?=date('d M Y')?></h1>
					<a class="col-md-2 btn btn-primary" href="<?= base_url() . "schedules/add" ?>">Tambah Aktifitas</a>
				</header>
			</div>
			
			<div class="col-md-12 col-sm-12">
				<div class="row">
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

        			<ul class="list-group">
        				<?php 
        				if(count($activities) > 0) {
        					foreach ($activities as $activity) { ?>
	        					<li class="list-group-item col-md-12">
		        					<div class="row">
		        						<div class="col-md-9">
		        							<h4><?= $activity['judul'] ?></h4>
		        							<p>Jam <i><?= $activity['jam_mulai'] . " - " . $activity['jam_selesai']?></i>
		        							 di <?= $activity['tempat'] ?></p>
		        						</div>
		        						<div class="col-md-2">
		        							<a href="<?= base_url(). "schedules/edit/" . $activity['id_kegiatan'] ?>">
		        								<i class="fa fa-pencil fa-5"></i> Edit
		        							</a> &nbsp;&nbsp;
		        							<a href="<?= base_url(). "schedules/delete/" . $activity['id_kegiatan'] ?>" onclick="return confirm_delete()">
		        								<i class="fa fa-trash-o"></i> Delete
		        							</a>
		        						</div>
		        					</div>
		        				</li>
        				<?php }
        				} else {
        					echo "<p class='text-center'>Belum ada aktifitas yang dientry</p>";
        				} ?>
        			</ul>
        		</div>
			</div>
		</article>
	</div>
</div>
