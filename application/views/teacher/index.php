<!-- container -->
<div class="container">

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<div class="row">
				
				<!-- LIST DOSEN YANG DIIKUTI-->
				<div class="col-md-9 col-sm-9">
					<!-- JUDUL CONTENT-->
					<header class="page-header">
						<h1 class="page-title">Jadwal Dosen yang Diikuti <?=date('d M Y')?></h1>
					</header>

					<div class="row">
						<!-- Error Handling-->

						<!-- DAFTAR DOSEN HIGHLIGHT-->
	        			<ul class="list-group">
	        				<?php 
	        				if(count($teachers) > 0) {
	        					foreach ($teachers as $teacher) { ?>
		        					<li class="list-group-item col-md-12">
			        					<div class="row">
			        						<div class="col-md-9">
			        							<h4><?= $teacher['nama'] ?></h4>
			        							<p>Jadwal tanggal <?=date('d M Y')?> <br><em>Terakhir update </em></p> 
			        						</div>
			        						<div class="col-md-2">
			        							<a href="<?= base_url()?>">
			        								Lihat Jadwal
			        								<i class="fa fa-eye"></i>
			        							</a>
			        						</div>
			        					</div>
			        				</li>
	        				<?php }
	        				} else {
	        					echo "<p class='text-center'>Belum ada dosen yang di highlight</p>";
	        				} ?>
	        			</ul>
	        		</div>
				</div>

				<!-- LIST SEMUA DOSEN-->
				<div class="col-md-3 col-sm-3">
					<div class="row">
						<div class="input-group">
				    		<span class="input-group-btn">
				    			<button class="btn btn-primary" type="button">
				    				<i class="fa fa-search"></i>
				    			</button>
				      		</span>
				      		<input type="text" class="form-control" placeholder="Search for...">
				    	</div>
					</div>
				</div>
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->

<!-- Reject Modal -->
<div id="rejectModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Penolakan Ajuan Janji</h4>
      </div>
      <form method="POST" action="<?= base_url(). "appointments/reject/" ?>">
		<input type="hidden" id="id-mhs" name="id_mahasiswa" />
		<input type="hidden" id="id-dosen" name="id_dosen" />

        <div class="modal-body">
            <div class="form-group">
              <p><font color="red">Setelah menolak ajuan janji ini, anda tidak bisa mengubah atau melihat data ini lagi.</font></p> 
              <label>Isikan alasan mengapa anda tidak menerima janji ini: *</label>
              <textarea name="alasan_reject" required rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Reject</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>