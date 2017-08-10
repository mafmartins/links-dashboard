<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = $this->session->userdata('username');
$avatar = $this->session->userdata('avatar');
$class = $this->session->userdata('class');
$iduser = $this->session->userdata('id');
} else {
header("location: ". base_url());
echo "ALERT GENERAL";
}
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Moshi Moshi Staff Page">
    <meta name="author" content="Kitamura">
    <meta name="keyword" content="Moshi Moshi, Staff, Fansub">
    <link rel="shortcut icon" href="<?php echo base_url('includes/theme/img/favicon.ico') ?>" title="Favicon">

    <title>Moshi Moshi Staff - <?php echo $title ?></title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url('includes/theme/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('includes/theme/css/bootstrap-theme.css') ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('includes/theme/css/elegant-icons-style.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('includes/theme/css/font-awesome.min.css') ?>" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo base_url('includes/theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('includes/theme/assets/fullcalendar/fullcalendar/fullcalendar.css') ?>" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo base_url('includes/theme/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') ?>" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="<?php echo base_url('includes/theme/stylesheet" href="css/owl.carousel.css') ?>" type="text/css">
	<link href="<?php echo base_url('includes/theme/css/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo base_url('includes/theme/css/fullcalendar.css') ?>">
	<link href="<?php echo base_url('includes/theme/css/widgets.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('includes/theme/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('includes/theme/css/style-responsive.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('includes/theme/css/xcharts.min.css') ?>" rel=" stylesheet">	
	<link href="<?php echo base_url('includes/theme/css/jquery-ui-1.10.4.min.css') ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="<?php echo base_url('home/'); ?>" class="logo">Moshi Moshi <span class="lite">Staff</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" style="height:30px;" src="<?php echo $avatar; ?>">
                            </span>
                            <span class="username"><?php echo $username; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?php echo base_url('users/perfil')."/".$iduser; ?>"><i class="icon_profile"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('login/logout/'); ?>"><i class="icon_key_alt"></i> SAIR</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

            <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li >
                      <a class="" href="<?php echo base_url('home/'); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a  class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Notícias</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url('news/'); ?>">Ver Notícias</a></li>
                          <?php if ($class < 2) { ?>
                          <li><a class="" href="<?php echo base_url('news/create/'); ?>">Criar Notícia</a></li>
                          <?php } ?>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_link_alt"></i>
                          <span>Links</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url('links/'); ?>">Gerir Links</a></li>
                          <li><a class="" href="<?php echo base_url('links/search/'); ?>">Pesquisar Links</a></li>
                      </ul>
                  </li>   
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_folder-alt"></i>
                          <span>Projetos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url('projetos/'); ?>">Gerir Projetos</a></li>
                          <li><a class="" href="<?php echo base_url('projetos/search/'); ?>">Pesquisar Projetos</a></li>
                      </ul>
                  </li>
                  <li >
                      <a class="" href="<?php echo base_url('stats/'); ?>">
                          <i class="icon_easel"></i>
                          <span>Estatísticas</span>
                      </a>
                  </li>
                  <?php if ($class < 2) { ?>
                  <li >
                      <a class="" href="<?php echo base_url('users/'); ?>">
                          <i class="icon_contacts_alt"></i>
                          <span>Gerir Usuários</span>
                      </a>
                  </li>
                  <?php } ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
