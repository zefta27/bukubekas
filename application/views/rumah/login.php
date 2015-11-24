<html>
<head>
	<title>Login Area</title>
<link rel="stylesheet" href=<?php echo base_url() ?>asset/css/login.css>
<link rel="stylesheet" href=<?php echo base_url() ?>asset/css/bootstrap.min.css>

</head>
<body>
	<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <h3>Admin Login Area</h3>
            <div class="avatar">
            	<img src=<?php echo base_url() ?>asset/images/user.png alt="">
            </div>
            <div class="form-box">
    				<?php echo form_open('') ?>
					
    				<input type="text" name="username" placeholder="username" required="required">
					 <input  name="password" type="password" placeholder="password" required="required" ><br>
					 <input type="submit" name="submit" value="Login" class="btn btn-block ">
					<?php echo form_close() ?>
            </div>
            <?php if($notif!=''){?>
            	<div  class="alert alert-danger" role="alert"><h5><?php echo $notif ?></h5></div>
            <?php 
            } ?>
        </div>
        
</div>
</body>
</html>