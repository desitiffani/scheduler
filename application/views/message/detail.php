<div class="banner-container"> <img src="<?=base_url()?>assets/images/banner-bg.jpg" alt="banner" />
  <div class="container banner-content">
    <div class="jumbotron">
      <?php if(count($friend) > 0) { ?>
        <h4>Conversation dengan <b><?= ($friend['id_member']  == $login_id ? $friend['nama_member_add'] : $friend['nama_member'] ) ?></b></h4>

        <div class="row">
          <ul class="list-group msg">
            <?php foreach ($messages as $key => $message) { ?>
                <li class="list-group-item col-md-8 <?= ($message['id_pengirim'] == $login_id ? "" : "msg-friend") ?>">
                    <b><?= ($message['id_pengirim'] == $login_id ? $login_name : ($friend['id_member']  == $login_id ? $friend['nama_member_add'] : $friend['nama_member'] ) ) ?></b>
                    : <?= $message['isi'] ?>
                    <a class="close" href="<?= base_url() . "messages/delete/" . $message['id_pesan'] . "/" . ($message['id_pengirim'] == $login_id ? 'sender' : 'receiver') ?>" title="Hapus pesan" onclick="return confirm_delete()">x</a>
                    <i class="msg-time"><?= $message['tgl_dikirim'] ?></i>
                </li>  
            <?php } ?>
          </ul>
        </div>

        <div class="row">
          <form method="post" action="<?= base_url() . "messages/process_send" ?>" role="form">
            <div class="form-group" style="width: 100%">
              <input type="hidden" name="friend" value="<?= ($friend['id_member']  == $login_id ? $friend['id_member_add'] : $friend['id_member'] ) ?>">
              <textarea name="message" class="form-control" cols="3" rows="5" placeholder="Ketik pesan disini..." required></textarea>
              <div class="row">
                <div class="col-xs-12 col-md-1">
                  <input type="submit" value="Kirim" class="btn btn-primary btn-lg">
                </div>
                <div class="col-xs-12 col-md-1">
                  <a class="btn btn-danger btn-lg" role="button" href="<?= base_url() . "messages" ?>">Kembali</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php }else{ ?>
         <div class="alert alert-danger">
            <a class="close" data-dismiss="alert">×</a>
            <b>Maaf anda tidak dapat mengirim pesan pada member ini.</b> Karena anda belum berteman dengan member ini.
          </div>
      <?php } ?>
    </div>
  </div>
</div>