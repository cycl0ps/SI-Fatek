<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- 
Develop by: 
Tim pengembang PTI Fakultas Teknik Unsrat
http://fatek.unsrat.ac.id
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal Fakultas Teknik Unsrat">
    <meta name="author" content="Tim PTI Fatek">
    <meta name="robots" content="noindex, nofollow">
	
    <title>Dosen | Portal Fakultas Teknik</title>

    <link href="<?php echo base_url("images/favicon.ico");?>" rel="icon" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("assets/adminbsb/plugins/bootstrap/css/bootstrap.css");?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url("assets/adminbsb/plugins/node-waves/waves.css");?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url("assets/adminbsb/plugins/animate-css/animate.css");?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url("assets/adminbsb/plugins/morrisjs/morris.css");?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url("assets/adminbsb/css/style.css");?>" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url("assets/adminbsb/css/themes/all-themes.css");?>" rel="stylesheet" />

</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --> 
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Portal Dosen Fatek Unsrat</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url("dosen/logout");?>">Logout <i class="material-icons">logout</i></a></li>                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $this->session->userdata['logged_in_dosen']['nama'];?></b></div>
                    <div class="email"><?php echo $this->session->userdata['logged_in_dosen']['nip'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">DAFTAR MENU</li>
                    <li>
                        <a href="<?php echo site_url('dosen');?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('dosen/judul');?>">
                            <i class="material-icons">view_list</i>
                            <span>Usulan Judul</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('dosen/bimbingan');?>">
                            <i class="material-icons">layers</i>
                            <span>Pembimbingan</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    PTI Fatek Unsrat &copy;<?php echo date('Y');?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php if($body_page) $this->load->view($body_page);?>
        </div>

        <?php $this->load->view('debug');?> 
    </section>
        
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/jquery/jquery.min.js");?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/bootstrap/js/bootstrap.js");?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/bootstrap-select/js/bootstrap-select.js");?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js");?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/node-waves/waves.js");?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/jquery-countto/jquery.countTo.js");?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/raphael/raphael.min.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/plugins/morrisjs/morris.js");?>"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/chartjs/Chart.bundle.js");?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/flot-charts/jquery.flot.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/plugins/flot-charts/jquery.flot.resize.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/plugins/flot-charts/jquery.flot.pie.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/plugins/flot-charts/jquery.flot.categories.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/plugins/flot-charts/jquery.flot.time.js");?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url("assets/adminbsb/plugins/jquery-sparkline/jquery.sparkline.js");?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url("assets/adminbsb/js/admin.js");?>"></script>
    <script src="<?php echo base_url("assets/adminbsb/js/portalMenu.js");?>"></script>


</body>

</html>

