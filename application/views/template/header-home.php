<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIRS Ernaldi Bahar Sumatera Selatan</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/sirs/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/sirs/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/sirs/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/sirs/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        
        .head{
            background-color: #dddddd;
            margin-top: -20px;
            margin-bottom: 20px;
            padding-top: 10px;
        }
        .menu-home{
            height: 50px;
            width: 100%;
            margin-left: none;
        }
        .a-menu{
            color:white;
            font-weight: 600;
        }
        .a-menu:hover{
            color: #5CB85C;
        }
        .footer{
            background-color: #354b60;
            bottom: 0;
            margin-bottom: 0;
            color: white;
        }
        .b-footer{
            background-color: #4B6176;
            height: 20px;
            margin-top: 30px;
        }
        p{
            text-align: justify;
        }
        h2, h3{
            font-weight: 600;            
        }
    </style>
</head>

<body>

        

            <div class="col-lg-12 head">
                <div class="col-lg-1">
                    <img src=<?php echo base_url() ?>assets/images/logo.png alt="" height="100px">
                </div>
                <div class="col-lg-6">
                    <p>
                        <h4>
                        Jl. Tembus Terminal Km 12 No. 02 Kelurahan Alang-Alang Lebar Kecamatan Alang Alang Lebar Palembang <br>
                        Telp: (0711) 5645126 Fax:(0711) 5645124

                        </h4>
                    </p>
                </div>
            </div>
        <div class="menu-home">
         <nav>
            <ul class="nav nav-pills pull-right">
            <li  role="presentation" <?php if($this->uri->segment(2)=='')echo 'class=active';?>>
            <a href=<?php echo base_url() ?> class="a-menu"> Beranda</a>
            </li>
            <li role="presentation">
                <a class="dropdown-toggle a-menu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  Login <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href=<?php echo base_url() ?>index.php/login/admin>Admin</a></li>
                    <li><a href=<?php echo base_url() ?>index.php/login/dokter>Dokter</a></li>
                    <li><a href=<?php echo base_url() ?>index.php/login/pasien>Pasien</a></li>
                    <li><a href=<?php echo base_url() ?>index.php/login/kasir>kasir</a></li>
                </ul>

            </li>
            <li role="presentation">
            <a href=<?php echo base_url() ?>index.php/login/profilrs class="a-menu">Profil Rumah Sakit</a>
            </li>
            
            </ul>
        </nav>
        <div>
            <h1 style="background-color:#5CB85C;padding:15px;color:white;"><i class="fa fa-user-md "></i>&nbsp SIRS Ernaldi Bahar Sumatera Selatan</h1>    
        </div>
            
        </div>
    <div class="container-fluid">
	     <div id="wrapper">		
            <div class="row">
