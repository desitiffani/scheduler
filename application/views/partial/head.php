<ul class="nav navbar-nav pull-right">
	<li class="active"><a href="<?=base_url()?>">Home</a></li>
	<?php if($user['role'] == 'mahasiswa'){ ?>
		<li><a href="<?=base_url() . "teachers" ?>">Dosen</a></li>
		<li><a href="<?=base_url() . "appointments" ?>">Janji</a></li>
	<?php }else{ ?>
		<li><a href="<?=base_url() . "schedules" ?>">Atur Jadwal</a></li>
		<li><a href="<?=base_url() . "appointments" ?>">Janji</a></li>
	<?php } ?>
	<li><a href="<?=base_url() . "site/edit_profile" ?>">Edit Profile</a></li>
	<li><a class="btn" href="<?=base_url()."site/logout"?>">Logout</a></li>
</ul>