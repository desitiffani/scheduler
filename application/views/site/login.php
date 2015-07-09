<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">Sign in</h1>
			</header>
			
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="thin text-center">Sign in to your account</h3>
						<hr>

						 <?php if($this->session->flashdata('login_msg') == 'false') { ?>
			              <div class="alert alert-danger">
			                <a class="close" data-dismiss="alert">×</a>
			                Login Gagal! Username / password salah, atau mungkin akun anda belum aktif.
			              </div>
			            <?php } ?>
						
						<form method="POST">
							<div class="top-margin">
								<label>Login Sebagai</label>
								<p class="form-control">
									<input type="radio" name="role" value="mahasiswa" checked /> Mahasiswa &nbsp;
									<input type="radio" name="role" value="dosen" /> Dosen
								</p>
							</div>
							<div class="top-margin">
								<label>Email <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="email" required>
							</div>
							<div class="top-margin">
								<label>Password <span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="password" required>
							</div>

							<hr>

							<div class="row">
								<div class="col-lg-8">
									<!--<b><a href="">Forgot password?</a></b>-->
								</div>
								<div class="col-lg-4 text-right">
									<button class="btn btn-action" type="submit" name="login">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
			
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->