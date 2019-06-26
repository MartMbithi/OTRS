<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=sha1($_POST['password']);
$stmt=$mysqli->prepare("SELECT email,password,id FROM passenger WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$_SESSION['id']=$id;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
                //  $insert="INSERT into admin(adminid,ip)VALUES(?,?)";
   // $stmtins = $mysqli->prepare($insert);
   // $stmtins->bind_param('sH',$id,$uip);
    //$res=$stmtins->execute();
					header("location:passenger-dashboard.php");
				}

				else
				{
					echo "<script>alert('Access Denied Invalid Details');</script>";
				}
			}
				?>
<?php include("includes/header.php")?>
<!--
<body class="cbp-spmenu-push">
<div class="main-content">
<!--
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		left-fixed -navigation-
		
	</div>-->
		<!--left-fixed -navigation-->		
		<!-- header-starts -->
		
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1"> Passenger Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="#" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
							<input type="password" name="password" class="lock" placeholder="Password" required="">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="login" class="btn btn-success btn-block" value="Login Me In" >
							
							<div class="registration">
								Don't have an account ?
								<a class="" href="passenger-signup.php">
									Create an account
								</a>
							</div>
							<div class="registration">
						   	Im	Not Passenger ?
								<a class="" target="_blank" href="employee/">
									Staff Login
								</a>
							</div>

						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!--footer-->
	<?php include("includes/footer.php")?>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>
