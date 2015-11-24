<?php 
$username= $this->session->userdata('username');
$foto_user= $this->session->userdata('foto_user');

 ?>
            <style type="text/css">
                a, a:hover{
                    color:#2B72AF;
                }

            </style>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <div class="foto" style="width:100%; hight:70px;padding:10%;">
                        
                        <?php if($foto_user==''){ ?>
                        <center>
                            <div style="text-align:center;width:120px;height:0 auto;   border-radius:500px;background-color:#2a2a2a;padding:10px;">
                                <i class="fa-user fa fa-5x"  style="font-size:70pt;color:white"></i>
                            </div>
                            <h4 style="color:#2B72AF;"><strong><?php echo $username ?></strong></h4>
                         
                            <button class="btn-primary btn" data-toggle="modal" data-target="#myModal">Ganti Foto</button>
                        </center>

                        <?php }else{ ?>
                            <div style="text-align:center;">
                                <img src=<?php echo base_url().$foto_user ?> alt="" width="100%">

                                <button class="btn-primary btn" data-toggle="modal" data-target="#myModal">Ganti Foto</button>
                            </div>
                        <?php } ?>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>user/><h4><i class="fa fa-dashboard fa-fw "></i> Beranda</h4></a>
                        </li>
                        <li>
                            <a href="#"><h4><i class="fa fa-bar-chart-o fa-fw"></i> Akun<span class="fa arrow"></span></h4></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo base_url() ?>user/akun/<?php echo $username ?>><h4>Akun</h4></a>
                                </li>
                                <li>
                                    <a href=<?php echo base_url() ?>user/biodata/<?php echo $username ?>><h4>Biodata</h4></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>user/transaksi><h4><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi<span class="fa arrow"></span></h4></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=<?php echo base_url() ?>user/transaksi/><h4>Transaksi</h4></a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=<?php echo base_url() ?>user/produk><h4><i class="fa fa-book"></i>&nbspProduk</h4></a>
                        </li>
                        <li>
                           <a href=<?php echo base_url() ?>user/keluar><h4><i class="glyphicon  glyphicon-log-out"></i> Keluar</h4></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>



            
            <!-- /.navbar-static-side -->
        </nav>
</div>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa-user fa"></i>&nbsp Ganti Foto</h4> 
      </div>
      <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
              <?php if($foto_user=="") 
              {?>
                    <center>
                        <h4 style="color:#2B72AF;"><strong><?php echo $username ?></strong></h4>
                        <div style="text-align:center;width:120px;height:0 auto;   border-radius:500px;background-color:#2a2a2a;padding:10px;">
                                    <i class="fa-user fa fa-5x"  style="font-size:70pt;color:white"></i>
                        </div>
                    </center>    
               <?php 
               }
                ?>
              <label for="">Ganti Foto</label>
              <input type="file" name="foto_user" class="form-control">
              
            </div>
            <br>
            <input type="submit" name="submit_foto" class="btn btn-primary btn-lg" value="Kirim">

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
