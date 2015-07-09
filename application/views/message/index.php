<div class="banner-container"> <img src="<?=base_url()?>assets/images/banner-bg.jpg" alt="banner" />
  <div class="container banner-content">
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-12">
          <h1 class="col-md-10">Pesan</h1>
          <a class="btn btn-primary btn-lg col-md-2" role="button" href="<?= base_url() . "messages/add" ?>">Kirim Pesan Baru</a>
        </div>
      </div>

      <div class="row">
        <ul class="list-group msg">
          <?php if(count($messages) > 0){
            foreach ($messages as $key => $message) { ?>
                <li class="list-group-item col-md-12 col-s-12 <?= $message['status_baca'] == MSG_NOT_READ ? 'not-read-msg-item' : '' ?>">
                  <a href="<?= base_url() . "messages/detail/" . $message['id_pengirim']; ?>">
                    <div class="col-md-10 col-s-7">
                      <span class="badge msg-badge"><?= $message['status_baca'] == MSG_NOT_READ ? 'Belum dibaca' : '' ?></span>
                      <?= $message['nama_member']?> 
                    </div>
                    <div class="col-md-2 col-s-5">
                      <i class="msg-time"><?= $message['tgl_dikirim'] ?></i> 
                    </div>
                  </a>
                </li>
          <?php }
          }else{
            echo "Tidak ada pesan yang masuk. Klik tombol 'Kirim Pesan Baru' untuk mencoba mengirim pesan pada teman anda.";
          } ?>
        </ul>
      </div>
    </div>
  </div>
</div>