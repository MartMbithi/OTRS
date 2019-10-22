<!--Server side code to handle passenger sign up-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['Pwd_reset']))
		{
			#$pass_fname=$_POST['pass_fname'];
			#$mname=$_POST['mname'];
			#$pass_lname=$_POST['pass_lname'];
			#$pass_phone=$_POST['pass_phone'];
			#$pass_addr=$_POST['pass_addr'];
			#$pass_uname=$_POST['pass_uname'];
			$email=$_POST['email'];
			$status='Pending';
            //sql to insert captured values
			$query="insert into orrs_passwordresets (email, status) values(?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $email, $status);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Check Your Email For Password Reset Instructions";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Orion Railway Reservation System</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container forgot-password">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header"><img class="logo-img" src="assets/img/logo-xx.png" alt="logo" width="102" height="#{conf.logoHeight}"><span class="splash-description">Forgot your password?</span></div>
              <div class="card-body">
              <?php if(isset($success)) {?>
            <!--This code for injecting an alert-->
                    <script>
                                setTimeout(function () 
                                { 
                                    swal("Success!","<?php echo $success;?>!","success");
                                },
                                    100);
                    </script>
    
            <?php } ?>
            <?php if(isset($err)) {?>
            <!--This code for injecting an alert-->
                    <script>
                                setTimeout(function () 
                                { 
                                    swal("Failed!","<?php echo $err;?>!","Failed");
                                },
                                    100);
                    </script>
    
            <?php } ?>
              <!--Password Reset Form-->
                <form method ="POST" >
                  <p>Don't worry, we'll send you an email to reset your password.</p>
                  <div class="form-group pt-4">
                    <input class="form-control" type="email" name="email" required="" placeholder="Your Email" autocomplete="off">
                  </div>
                  <p class="pt-1 pb-4">Don't remember your email? <a href="#">Contact Support</a>.</p>
                  <div class="form-group pt-1"><input type ="submit" name ="Pwd_reset" class="btn btn-block btn-primary btn-xl" value = "Reset Password"></div>
                </form>
                <!--End Password Reset-->
              </div>
            </div>
            <div class="splash-footer"><a href = "pass-login.php">Home</a></div>
            <div class="splash-footer">&copy; 2019 - <?php echo date ('Y');?> Orion Railway Reservation System | Powered By <a href = "https://martmbithi.github.io" target ="_blank" >MartDevelopers</a></div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/swal.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>

</html>