            <?php $username=$this->session->userdata('username_rumah'); ?>
            <style type="text/css">
                a, a:hover{
                    color:#236AA7;
                }

            </style>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>rumah/><h4><i class="fa fa-dashboard fa-fw "></i> Beranda</h4></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>rumah/produk><h4><i class="fa fa-book"></i>&nbspProduk</h4></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>rumah/testimonial><h4><i class="fa fa-book"></i>&nbspTestimonial</h4></a>
                        </li>
                        
                        <li>
                            <a href=<?php echo base_url() ?>rumah/akun/<?php echo $username ?>><h4><i class="fa fa-book"></i>&nbspAkun</h4></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo base_url() ?>rumah/akun/<?php echo $username ?>><h4>Akun Admin</h4></a>
                                </li>
                                <li>
                                    <a href=<?php echo base_url() ?>rumah/akunuser/><h4>Akun User</h4></a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href=<?php echo base_url() ?>rumah/transaksi/><h4><i class="fa fa-book"></i>&nbspTransaksi</h4></a>
                        </li>
                        <li>
                           <a href=<?php echo base_url() ?>rumah/keluar><h4><i class="glyphicon  glyphicon-log-out"></i> Keluar</h4></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>



            
            <!-- /.navbar-static-side -->
        </nav>
</div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
