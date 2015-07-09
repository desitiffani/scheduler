<div class="banner-container"> <img src="<?=base_url()?>assets/images/banner-bg.jpg" alt="banner" />
  <div class="container banner-content">
    <div class="jumbotron">
     <div class="row mrgn30">
        <form method="post" action="<?= base_url() . "messages/process_send" ?>" role="form">
          <h3>Pesan Baru</h3>

          <?php if($this->session->flashdata('send_message') == 'false'){ ?>
            <div class="alert alert-danger">
              <a class="close" data-dismiss="alert">×</a>
              <b>Pesan tidak terkirim.</b> Terjadi kesalahan, silakan ulangi lagi.
            </div>
          <?php } ?>

          <div class="col-sm-12">
            <div class="form-group">
              <label for="member">Teman</label>
              <!--<input type="text" class="form-control" name="name" id="member" placeholder="Enter member name">-->
              <select name="friend" required>
                <option value="">- Pilih Nama Teman -</option>
                <?php foreach ($friends as $key => $friend) { ?>
                  <option value="<?= ($friend['id_member']  == $login_id ? $friend['id_member_add'] : $friend['id_member'] ) ?>">
                    <?= ($friend['id_member']  == $login_id ? $friend['nama_member_add'] : $friend['nama_member'] ) ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="comments">Pesan</label>
              <textarea name="message" class="form-control" id="comments" cols="3" rows="5" placeholder="Enter your message…" required></textarea>

              <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // load autocomplete data
  $.get(base_url + 'messages/get_friends', function(data){
    $("#member").typeahead({ source: data });
  },'json');
});
</script>