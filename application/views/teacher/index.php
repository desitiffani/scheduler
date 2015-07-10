<<<<<<< HEAD
<div class="container">
=======
<!-- container -->
<div class="container" style="padding-top: 50px;">

>>>>>>> origin/master
	<div class="row">
		<article class="col-xs-12 maincontent">
			<div class="row">
				
				<!-- LIST DOSEN YANG DIIKUTI-->
				<div class="col-md-9 col-sm-9">
					<!-- JUDUL CONTENT-->
					<header class="page-header">
						<h1 class="page-title">Jadwal Dosen yang Diikuti (<?=date('d M Y')?>)</h1>
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
			        							<p>Jadwal tanggal <?=date('d M Y')?> (<em>Terakhir update <?=$teacher['terakhir_diedit']?></em>)</p> 
			        						</div>
			        						<div class="col-md-3">
			        							<a href="#" class="view-schedule" data-toggle="modal" data-target="#jadwalDetailModal" data-id="<?=$teacher['id_jadwal']?>" data-name="<?=$teacher['nama']?>">
			        								<i class="fa fa-eye"></i>
			        								Lihat Detail Jadwal
			        							</a> <br/>
			        							<a href="#" class="view-detail" data-toggle="modal" data-target="#dosenDetailModal" data-id="<?=$teacher['id_dosen']?>" data-name="<?=$teacher['nama']?>">
			        								<i class="fa fa-user"></i>
			        								Lihat Detail Dosen
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
				<div class="col-md-3 col-sm-3" style="margin-top:30px">
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
	</div>
</div>

<!-- Detail Jadwal -->
<div id="jadwalDetailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Detail Jadwal <span id="nama-dosen1"></span> (<?=date('d M Y')?>)</h4>
      	</div>
		<div class="modal-body">
		    <ul class="list-group" id="list-jadwal"></ul>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
		</div>
    </div>
  </div>
</div>

<!-- Detail Dosen -->
<div id="dosenDetailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Detail Dosen <span id="nama-dosen2"></span></h4>
      	</div>
		<div class="modal-body">
		    <div class="form-group" id="detail-dosen"></div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
		</div>
    </div>
  </div>
</div>