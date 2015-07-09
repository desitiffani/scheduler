<div class="jumbotron top-space">
	<div class="container">		
		<div class="row">
			<?php if($user['role'] == 'mahasiswa'){ ?>
				<a href="<?= base_url() . "teachers" ?>">
					<div class="col-md-4 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-calendar fa-5"></i>Lihat Jadwal Dosen</h4></div>
					</div>
				</a>				
			<?php }else{ ?>
				<a href="<?= base_url() . "schedules" ?>">
					<div class="col-md-4 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-calendar fa-5"></i>Atur Jadwal Hari Ini</h4></div>
					</div>
				</a>
			<?php } ?>

			<a href="<?= base_url() . "appointments" ?>">
				<div class="col-md-4 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Janji</h4></div>
				</div>
			</a>			
			<a href="<?= base_url() . "site/edit_profile" ?>">
				<div class="col-md-4 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-user fa-5"></i>Edit Profile</h4></div>
					</a>
				</div>
			</a>
		</div> 
	</div>
</div>