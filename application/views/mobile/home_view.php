
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

	<style>
	.row > .column {
	  padding: 0 8px;
	}

	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Create four equal columns that floats next to eachother */
	.column {
	  float: left;
	  width: 25%;
	}

	/* The Modal (background) */
	.modal {
	  display: none;
	  position: fixed;
	  z-index: 1;
	  padding-top: 100px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: black;
	}

	/* Modal Content */
	.modal-content {
	  position: relative;
	  background-color: #fefefe;
	  margin: auto;
	  padding: 0;
	  width: 90%;
	  max-width: 1200px;
	}

	/* The Close Button */
	.close {
	  color: white;
	  position: absolute;
	  top: 10px;
	  right: 25px;
	  font-size: 35px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: #999;
	  text-decoration: none;
	  cursor: pointer;
	}

	/* Hide the slides by default */
	.mySlides {
	  display: none;
	}

	/* Next & previous buttons */
	.prev,
	.next {
	  cursor: pointer;
	  position: absolute;
	  top: 50%;
	  width: auto;
	  padding: 16px;
	  margin-top: -50px;
	  color: white;
	  font-weight: bold;
	  font-size: 20px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	  user-select: none;
	  -webkit-user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
	  background-color: rgba(0, 0, 0, 0.8);
	}

	/* Number text (1/3 etc) */
	.numbertext {
	  color: #f2f2f2;
	  font-size: 12px;
	  padding: 8px 12px;
	  position: absolute;
	  top: 0;
	}

	/* Caption text */
	.caption-container {
	  text-align: center;
	  background-color: black;
	  padding: 2px 16px;
	  color: white;
	}

	img.demo {
	  opacity: 0.6;
	}

	.active,
	.demo:hover {
	  opacity: 1;
	}

	img.hover-shadow {
	  transition: 0.3s;
	}

	.hover-shadow:hover {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	</style>
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
									See Promo & Voucher Code
									<span><i class="icon-arrow-down2"></i></span>
								</a>

							</div>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(<?=base_url();?>assets/fotografy/images/starbucks_20170809_111130.jpg);" data-stellar-background-ratio="0.5"></li>
			  	</ul>

			</div>
		</div>
		</div>

		<div id="fh5co-portfolio" data-section="portfolio">
			<div class="container">

				<div class="row">

					<?php
					//var_dump($this->dataPromo);
					foreach ($this->dataPromo  as $dataPromo) {

					?>
					<div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12 animate-box">
						<div class="img-grid">
							<img src="<?=base_url();?>uploads/promo/<?php echo $dataPromo->IMAGE_PROMO;?>"  class="img-responsive" width="100%">
							<a onclick="openModal();currentSlide(1)" class="">
								<div>
									<span class="fh5co-meta"><?php echo $dataPromo->NAMA_PROMO;?></span>
								</div>
							</a>
						</div>
					</div>
					<?php
					}
				 	?>
				</div>

				<div class="row r-pb">
					<div class="col-md-8 col-md-offset-2  section-heading">
						<h2 class="fh5co-section-title animate-box text-center">Voucher</h2>
						<hr>

						<?php
						//var_dump($this->dataPromo);
						foreach ($this->dataVoucher  as $dataVoucher) {

						?>

							<p class="fh5co-lead-judul animate-box" style="text-align:justify"><?php echo $dataVoucher->NAMA_VOUCHER;?></p>
							<p class="fh5co-lead animate-box text-center">CODE : <u><?php echo $dataVoucher->KODE_VOUCHER;?></u></p>
							<p class="fh5co-lead-tgl animate-box text-center"><?php echo $dataVoucher->BERLAKU_MULAI_INDO;?> s/d <?php echo $dataVoucher->BERLAKU_AKHIR_INDO;?></p>
							<hr>
						<?php
						}

						if(!$this->dataVoucher){
							echo '<p class="fh5co-lead-judul animate-box">Nantikan Voucher selanjutnya :)</p>';
						}
					 	?>

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



	<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

		<?php
		//var_dump($this->dataPromo);
		$i=1;
		foreach ($this->dataPromo  as $dataPromo) {

		?>

    <div class="mySlides">
      <div class="numbertext"><?=$i;?> / <?php echo count($this->dataPromo);?></div>
      <img src="<?=base_url();?>uploads/promo/<?php echo $dataPromo->IMAGE_PROMO;?>" style="width:100%">
    </div>

  	<?php
		$i++;
		}
		?>


    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>


  </div>
</div>

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

	<script>
// Open the Modal
	function openModal() {
	  document.getElementById('myModal').style.display = "block";
	}

	// Close the Modal
	function closeModal() {
	  document.getElementById('myModal').style.display = "none";
	}

	var slideIndex = 1;
	showSlides(slideIndex);

	// Next/previous controls
	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  var captionText = document.getElementById("caption");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
	    dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	  captionText.innerHTML = dots[slideIndex-1].alt;
	}
	</script>

	</body>
</html>
