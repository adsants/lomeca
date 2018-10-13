
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fotografy &mdash; Free Fully Responsive HTML5 Bootstrap Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="<?=base_url();?>assets/fotografy/css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="<?=base_url();?>assets/fotografy/css/flexslider.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="<?=base_url();?>assets/fotografy/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?=base_url();?>assets/fotografy/css/bootstrap.css">

	<link rel="stylesheet" href="<?=base_url();?>assets/fotografy/css/style.css">


	<!-- Modernizr JS -->
	<script src="<?=base_url();?>assets/fotografy/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?=base_url();?>assets/fotografy/js/respond.min.js"></script>
	<![endif]-->


	</head>
	<body>
	<!--
	<div id="fh5co-header">
		<div class="container">
			 /// Mobile Toggle Menu Button
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			<div id="fh5co-logo">
				<a href="index.html">fotografy<span>.</span></a>
			</div>
			<nav id="fh5co-main-nav">
				<ul>
					<li><a href="#" data-nav-section="home">Home</a></li>
					<li><a href="#" data-nav-section="portfolio">Portfolio</a></li>
					<li><a href="#" data-nav-section="about">About</a></li>
					<li><a href="#" data-nav-section="contact">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>

	-->
	<div id="fh5co-main">
		<div class="fh5co-overlay-mobile"></div>
		<div id="fh5co-home" class="js-fullheight" data-section="home">

			<div class="flexslider">

				<div class="fh5co-overlay"></div>
				<div class="fh5co-text">
					<div class="container">
						<div class="row text-center">
							<h1 class="animate-box"><?php echo $this->dataClient->NAMA_CLIENT;?> <br><br><sup>PromoApp</sup></h1>
							<div class="fh5co-go animate-box">
								<a href="#" class="js-fh5co-next">
									Please Register here ..
									<span><i class="icon-arrow-down2"></i></span>
								</a>

							</div>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(<?=base_url();?>uploads/profil/<?php echo $this->dataClient->IMAGE_CLIENT ?>);" data-stellar-background-ratio="0.5"></li>
			  	</ul>

			</div>
		</div>
		</div>

		<div id="fh5co-portfolio" data-section="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12  section-heading">
						<h2 class="fh5co-section-title animate-box text-center">Register</h2>
						<hr>
						<form action="" id="form_standar">
							<div class="form-group">
					      <label for="email">Name :</label>
					      <input type="input" class="form-control required" autocomplete="off" id="NAMA_USER" placeholder="Enter Name" name="NAMA_USER">
					      <input type="hidden" class="form-control required" value="<?php echo $this->input->get('id_phone');?>" name="ID_PHONE">
					      <input type="hidden" class="form-control required" value="<?php echo $this->input->get('id_client');?>" name="ID_CLIENT">
					    </div>
							<div class="form-group">
					      <label for="email">Phone :</label>
					      <input type="input" class="form-control required number" autocomplete="off" id="TLP_USER" placeholder="Enter Phone" name="TLP_USER">
					    </div>
							<div class="form-group">
								<label for="email">eMail :</label>
								<input type="input" class="form-control required email" autocomplete="off" id="EMAIL_USER" placeholder="Enter eMail" name="EMAIL_USER">
							</div>
							<div class="form-group">
								<label for="email">Address :</label>
								<input type="input" class="form-control required" autocomplete="off" id="ALAMAT_USER" placeholder="Enter Address" name="ALAMAT_USER">
							</div>
							<div class="form-group">
								<label for="email">Gender :</label>
								<select class="form-control required" name="JKL_USER">
									<option value="">Please Select</option>
									<option value="Laki-Laki">Man</option>
									<option value="Perempuan">Women</option>
								</select>
							</div>
							<div class="form-group">
								<span id="pesan_error"></span>
							</div>

					    <button type="submit" id="btn_submit" class="btn btn-lg">Submit</button>
					  </form>

					</div>
				</div>

			</div>
		</div>

		<div id="fh5co-about" data-section="about">
			<div class="container">
				<div class="row r-pb">
					<div class="col-md-8 col-md-offset-2 text-center section-heading">
						<h2 class="fh5co-section-title animate-box fadeInUp animated">&copy; 2018</h2>
					</div>
			</div>
			</div>
		</div>



	</div> <!-- END fh5co-page -->




	<!-- jQuery -->
	<script src="<?=base_url();?>assets/fotografy/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?=base_url();?>assets/fotografy/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?=base_url();?>assets/fotografy/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?=base_url();?>assets/fotografy/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?=base_url();?>assets/fotografy/js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="<?=base_url();?>assets/fotografy/js/jquery.flexslider-min.js"></script>
	<!-- Main JS -->
	<script src="<?=base_url();?>assets/fotografy/js/main.js"></script>

	<script src="<?=base_url();?>assets/js/validate.js"></script>
	<script src="<?=base_url();?>assets/js/jquery-upload.js"></script>

			<!------ ------------------------------------------- Semua aksi Form ------>
	<script>

		var base_url = "<?php echo base_url();?>";
		var uri_1 = "<?php echo $this->uri->segment(1); ?>";
		var uri_2 = "<?php echo $this->uri->segment(2); ?>";
		var uri_3 = "<?php echo $this->uri->segment(3); ?>";
		var uri_4 = "<?php echo $this->uri->segment(4); ?>";
	$('#form_standar').validate({
	submitHandler: function(form) {


		$.ajax({
			url: base_url+''+uri_1+'/'+uri_2+'_data',
			type:'POST',
			dataType:'json',
			data: $('#form_standar').serialize(),
			beforeSend: function(){
				$("#btn_submit").text("SUBMIT ...");
				$('#pesan_error').hide();
			},
			success: function(data){
				if( data.status ){
						location.href=base_url+''+uri_1+'/activation?id_client=<?php echo $this->input->get('id_client') ?>&id_phone=<?php echo $this->input->get('id_phone') ?>';
				}
				else{
					$("#btn_submit").text("SUBMIT"); $('#pesan_error').show(); $('#pesan_error').html(data.pesan);
				}
			},
			error : function(data) {
			$("#btn_submit").text("SUBMIT");$('#pesan_error').html('maaf telah terjadi kesalahan dalam program, silahkan anda mengakses halaman lainnya.'); $('#pesan_error').show(); $('#loading').hide();
			//$('#pesan_error').html( '<h3>Error Response : </h3><br>'+JSON.stringify( data ));
			}
		})
	}
});
</script>

	</body>
</html>
