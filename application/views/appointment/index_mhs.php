<!-- container -->
<div class="container">

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<div class="row">
				<header class="page-header col-md-12">
					<h1 class="page-title col-md-9">Janji</h1>
					<a class="col-md-2 btn btn-primary" href="<?= base_url() . "appointments/add" ?>">Ajukan Janji Baru</a>
				</header>
			</div>
			
			<div class="col-md-12 col-sm-12">
				<div class="row">
					<?php if($this->session->flashdata('add_appointment_msg') == 'true') { ?>
		              <div class="alert alert-success">
		                <a class="close" data-dismiss="alert">×</a>
		                <b>Pengajuan sukses!</b> Ajuan Janji telah berhasil disimpan. Silakan tunggu tanggapan dari dosen yang bersangkutan.
		              </div>
		            <?php }else if($this->session->flashdata('add_appointment_msg') == 'false'){ ?>
		            	<div class="alert alert-danger">
			                <a class="close" data-dismiss="alert">×</a>
			                <b>Pengajuan gagal!</b> Ajuan Janji tidak berhasil disimpan, mungkin ada kesalahan. Silakan ulangi lagi.
			              </div>
		            <?php } ?>

		            <?php if($this->session->flashdata('delete_appointment_msg') == 'true') { ?>
		              <div class="alert alert-success">
		                <a class="close" data-dismiss="alert">×</a>
		                <b>Hapus sukses!</b> Ajuan Janji telah berhasil dihapus.
		              </div>
		            <?php } ?>

        			<ul class="list-group">
        				<?php foreach ($appointments as $appointment) { ?>
        					<li class="list-group-item col-md-12">
	        					<div class="row">
	        						<div class="col-md-10">
	        							<h4>- Janji dengan <?= $appointment['nama_dosen'] ?></h4>
	        							<p>Pada <b><?= date("d M Y - H:m", strtotime($appointment['waktu_janji'])); ?> </b>
	        							   - <?= $appointment['keterangan'] ?>
	        							   	<?php if($appointment['status'] == 'Pending'){ ?>
	        							   		<i> <?= "(Janji <font color='blue'>diajukan</font>)" ?></i>
	        								<?php }else if($appointment['status'] == 'Approved'){ ?>
	        									<i> <?= "(Janji <font color='green'>disetujui</font>)" ?></i>
	        								<?php }else{ ?>
	        									<i> <?= "(Janji <font color='red'>ditolak</font>)" ?></i>
	        								<?php } ?>
	        							   
	        							</p> 
	        						</div>
	        						<div class="col-md-2">
	        							<a href="<?= base_url(). "appointments/delete/" . $appointment['id_mahasiswa'] . "/" . $appointment['id_dosen'] ?>" onclick="return confirm_delete()">
	        								<i class="fa fa-trash-o"></i> Hapus
	        							</a>
	        							<?php if($appointment['status'] == 'Rejected'){ ?>
	        								<a href="#" class="view-reject-reason" data-toggle="modal" data-target="#rejectModal" data-reason="<?=$appointment['alasan_reject']?>">
		        								<i class="fa fa-check fa"></i> Lihat Alasan
		        							</a>
	        							<?php } ?>
	        						</div>
	        					</div>
	        				</li>
        				<?php } ?>
        			</ul>
        		</div>
			</div>
			
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->

<!-- View Reject Reason Modal -->
<div id="rejectModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alasan Penolakan Janji</h4>
      </div>
	  <div class="modal-body">
	    <div class="form-group">
	      <p id="alasan-reject"></p>
	    </div>
	  </div>
	  <div class="modal-footer">
	  	<button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
	  </div>
    </div>
  </div>
</div>

