<?php
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//var_dump($hostname);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rumah Sakit Royal Surabaya</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">


	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/_all-skins.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/module.css">



</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper" id="wrapper_body">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-family:calibry;"><!--<img src="<?=base_url();?>assets/img/logo_explorastore.png" width="150px" alt="Explora"> --> <i class="	fa fa-home"></i> Rumah Sakit Royal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color:#000">
        <span class="sr-only">Toggle navigation</span>&nbsp;<?php echo date('d-m-Y') ?> <span id="jam"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#000">
              <i class="fa fa-user"></i>
              <span class="hidden-xs"><?php //echo $this->input->ip_address(); ?>  <?php echo $this->session->userdata('nama_user'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image
              <li class="user-header">
                <img src="<?=base_url();?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--<a href="#" class="btn btn-success btn-flat">Profil</a>-->
                </div>
                <div class="pull-right">
                  <a onclick="showModalLogOut('<?=base_url();?>logout')" class="btn btn-warning btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
	<input type="hidden" id="ClienComputerName" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">&nbsp;</li>

		<li class='<?php if($this->uri->segment(1)=='dashboard') echo "active"; ?>'>
			<a href='<?=base_url();?>dashboard'>
			<i class='fa fa-dashboard'></i>
			<span>Dashboard</span>
			</a>
		</li>
		<?php
		if($this->session->userdata('id_client') == '0'){
		?>
		<li class='<?php if($this->uri->segment(1)=='client') echo "active"; ?>'>
			<a href='<?=base_url();?>client'>
			<i class='fa fa-database'></i>
			<span>Client</span>
			</a>
		</li>
		<?php
		}
		?>
		<li class='<?php if($this->uri->segment(1)=='profil') echo "active"; ?>'>
			<a href='<?=base_url();?>profil'>
			<i class='fa fa-home'></i>
			<span>Profil</span>
			</a>
		</li>
		<li class='<?php if($this->uri->segment(1)=='voucher') echo "active"; ?>'>
			<a href='<?=base_url();?>voucher'>
			<i class='fa fa-dollar'></i>
			<span>Voucher</span>
			</a>
		</li>

		<li class='<?php if($this->uri->segment(1)=='promo') echo "active"; ?>'>
			<a href='<?=base_url();?>promo'>
			<i class='fa fa-image'></i>
			<span>Gambar Promo</span>
			</a>
		</li>

		</a>
		</li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
