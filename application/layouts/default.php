<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
		<title>Scheduler</title>
		<link rel="shortcut icon" href="assets/images/gt_favicon.png">
		<link rel="stylesheet" media="screen" href="<?=base_url()?>assets/css/fonts.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.css" media="screen" >
		<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
		<script type="text/javascript">var base_url = <?php echo json_encode(base_url());?>;</script>
	</head>
	
	<body>		
		<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand" href="<?=base_url()?>">
                    	<img src="<?=base_url()?>assets/images/logo.png" alt="Scheduler">
                    </a>
				</div>
				<div class="navbar-collapse collapse">
					{{head}}
				</div>
			</div>
		</div> 
		
		{{content}}
		
		<div class="footer1 ">
          <div class="container">
              <p class="text-center">
                Copyright &copy; Scheduler RPL-2 2015
              </p>
          </div>
		</div>
	</body>
</html>

<script src="<?=base_url()?>assets/js/jquery-1.8.2.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/headroom.min.js"></script>
<script src="<?=base_url()?>assets/js/jQuery.headroom.min.js"></script>
<script src="<?=base_url()?>assets/js/template.js"></script>
{{scripts}}