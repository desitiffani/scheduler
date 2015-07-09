<!-- Header -->
<header id="head">
  <div class="container">
    <div class="row">
      <h1 class="lead">SCHEDULER</h1>
      <p class="tagline">Keep in touch with your teacher activity</p>

      <hr/>

      <div class="col-md-6 col-md-offset-3 col-sm-12">
        <p>
          Sudah punya account? <a href="<?=base_url() . "site/login" ?>" class="btn btn-primary">Log In</a>
        </p>

        <form method="POST" action="<?= base_url() . "site/signup" ?>">
          <?php if($this->session->flashdata('signup_msg') == 'false') { ?>
            <div class="alert alert-danger">
              <a class="close" data-dismiss="alert">×</a>
              Signup Gagal! Mungkin email tidak terkirim. Silakan hubungi administrator
            </div>
          <?php }else if($this->session->flashdata('signup_msg') == 'true') { ?>
          <div class="alert alert-success">
              <a class="close" data-dismiss="alert">×</a>
              Signup Berhasil! Silakan cek email anda untuk aktivasi akun.
            </div>
          <?php } ?>

          <?php if($this->session->flashdata('activation_msg') == 'true') { ?>
            <div class="alert alert-success">
              <a class="close" data-dismiss="alert">×</a>
              Akun anda telah berhasil diaktifkan. Anda sekarang sudah bisa login.
            </div>
          <?php } ?>

          <div class="form-group">
            <label>Mendaftar Sebagai *</label><br/>
            <div class="form-control">
              <div class="col-md-4 col-md-offset-2">
                <input type="radio" name="role" checked value="mhs" class="user-role" /> Mahasiswa
              </div>
              <div class="col-md-4">
                <input type="radio" name="role" value="dsn" class="user-role" /> Dosen
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap *</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>            
          <div class="form-group">
            <label>Password *</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group field-jurusan">
            <label>Jurusan *</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
          </div>
          <div class="form-group field-perguruan-tinggi">
            <label>Perguruan Tinggi *</label>
            <!--<input type="text" name="perguruan_tinggi" class="form-control" placeholder="Perguruan Tinggi" required>-->
            <select name="perguruan_tinggi" required class="form-control">
              <option value="">- Pilih Perguruan Tinggi -</option>
              <?php foreach ($perguruan_tinggi as $pergu) { ?>
                <option value="<?=$pergu['id_universitas']?>"><?= $pergu['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group field-keterangan" style="display:none">
            <label>Keterangan <i>Isikan dengan keahlian, mata kuliah yang diampu, dll.</i></label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Sign Up</button>
              <button type="button" class="btn">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
<!-- /Header -->

<style>
.navbar-fixed-top{
  display: none
}

label{
  color: #fff;
}
</style>