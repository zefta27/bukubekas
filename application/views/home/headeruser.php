<?php 
  $uri1=$this->uri->segment('1');
  if($this->uri->segment('2')!='')
   {
      $uri2=$this->uri->segment('2');
      $uri3=$this->uri->segment('3');
      //$uri='/'.$uri2.'/'.$uri3;
      $link=base_url().$uri1.'/'.$uri2.'/'.$uri3;
   }
   else{
      $link=base_url().$uri1;  
   } 
?>
<?php $username=$this->session->userdata('username') ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
</head>
<link rel="stylesheet" type="text/css" href=<?php echo base_url() ?>asset/css/bootstrap.min.css>
<link rel="stylesheet" href=<?php  echo base_url() ?>asset/css/font-awesome.min.css>
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/jquery.js></script>
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/bootstrap.min.js></script>
<link rel="stylesheet" href=<?php echo base_url() ?>asset/css/style.css>
<link rel="stylesheet" type="text/css" media="all" href=<?php echo base_url() ?>asset/css/daterangepicker-bs3.css />
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/moment.js></script>
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/daterangepicker.js></script>
<body>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top" style="-moz-box-shadow:   0px 1px 10px 0px #ccc;-webkit-box-shadow: 0px 1px 10px 0px #ccc;
   box-shadow:0px 1px 10px 0px #ccc;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand title" href="#" style="display:inline-flex;">  
            <img src=<?php echo base_url() ?>asset/images/ugrah.png height="30px;">Ugrah Book Shop
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right ">
            
            <li  role="presentation" class="btn-primary" style="color:white;margin-right:2px;">
                <a href=<?php echo base_url() ?>user class="a-menu" style="color:white;"> Dashboard</a>
            </li>
            <li  role="presentation" <?php if($this->uri->segment(2)=='')echo 'class=active';?>>
              <a href=<?php echo base_url() ?> class="a-menu"> Beranda</a>
            </li>
            <li role="presentation">
                <a class="dropdown-toggle a-menu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php echo $username; ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href=<?php echo base_url() ?>home/Profil>Profil</a></li>
                    <li><a href=<?php echo base_url() ?>home/keluar>Keluar</a></li>
                </ul>
            </li>
            <li role="presentation" <?php if($this->uri->segment(2)=='konfirmasi')echo 'class=active';?>>
            <a href=<?php echo base_url() ?>home/konfirmasi class="a-menu">Konfirmasi</a>
            </li>
            <li role="presentation" <?php if($this->uri->segment(2)=='kontak')echo 'class=active';?>>
            <a href=<?php echo base_url() ?>home/kontak class="a-menu">Kontak</a>
            </li>        
            <li role="presentation" <?php if($this->uri->segment(2)=='tentang')echo 'class=active';?>>
            <a href=<?php echo base_url() ?>home/tentang class="a-menu">Tentang Kami</a>
            </li>  
          </ul>
        </div>
      </div>
    </nav>
</header>
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : '<div class="alert alert-success">'. $message .'</div>';?>  