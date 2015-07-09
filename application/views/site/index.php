<!-- Header -->
<header id="head">
  <div class="container">
    <div class="row">
      <h1 class="lead">AWESOME, CUSTOMIZABLE, FREE</h1>
      <p class="tagline">PROGRESSUS: free business bootstrap template by <a href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus">GetTemplate</a></p>
      <p><a class="btn btn-default btn-lg" role="button">MORE INFO</a> <a class="btn btn-action btn-lg" role="button">DOWNLOAD NOW</a></p>
    </div>
  </div>
</header>
<!-- /Header -->

<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <form method="POST" action="<?= base_url() . "site/login" ?>">
        <div class="modal-body">
            <div class="form-group">
              <label>Email *</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>Password *</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Signup Modal -->
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <form method="POST" action="<?= base_url() . "site/signup" ?>">
        <div class="modal-body">
            <div class="form-group">
              <label>Nama *</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>Password *</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label>No Telp. *</label>
              <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" rows="2"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Sign Up</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if($this->session->flashdata('signup_msg') == 'false') { ?>
  <script type="text/javascript">
    alert("Signup Gagal! Mungkin email tidak terkirim. Silakan hubungi administrator");
  </script> 
<?php }else if($this->session->flashdata('signup_msg') == 'true'){ ?>
  <script type="text/javascript">
    alert("Signup Berhasil! Silakan cek email anda untuk aktivasi akun.");
  </script>
<?php } ?>