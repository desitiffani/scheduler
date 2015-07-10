<header id="head" class="secondary">
    <div class="container">		
        <div class="row">
            <?php if($user['role'] == 'mahasiswa'){ ?>
                <a href="<?= base_url() . "teachers" ?>">
                    <div class="col-md-4 col-sm-6 highlight">
                        <div class="h-caption"><img src="<?=base_url() ?>assets/images/1.png"><h4>Lihat Jadwal Dosen</h4></div>
                    		
                    </div>
                </a>				
            <?php }else{ ?>
                <a href="<?= base_url() . "schedules" ?>">
                    <div class="col-md-4 col-sm-6 highlight">
                        <div class="h-caption"><h4><img src="<?=base_url() ?>assets/images/1.png">Atur Jadwal Hari Ini</h4></div>
                    </div>
                </a>
            <?php } ?>
    
            <a href="<?= base_url() . "appointments" ?>">
                <div class="col-md-4 col-sm-6 highlight">
                    <div class="h-caption"><img src="<?=base_url() ?>assets/images/3.png"><h4>Janji</h4></div>
                </div>
            </a>			
            <a href="<?= base_url() . "site/edit_profile" ?>">
                <div class="col-md-4 col-sm-6 highlight">
                        <div class="h-caption"><img src="<?=base_url() ?>assets/images/2.png"><h4>Edit Profile</h4></div>
                    </a>
                </div>
            </a>
        </div> 
    </div>
</header>