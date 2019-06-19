<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT email,password FROM employee WHERE email=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
#$_SESSION['alogin']=$_POST['id'];
echo "<script type='text/javascript'> document.location = 'employee-dashboard.php'; </script>";
} else{

  echo "<script>alert('Invalid Login Crentials Details');</script>";

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
				<h2 class="title1">Railway Management System Employee Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="#" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
							<input type="password" name="password" class="lock" placeholder="Password" required="">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<!--
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>-->
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="login" class="btn btn-success btn-block" value="Login Me In" >
							<div class="registration">
						   	Im	Not Employee ?
								<a class="" target="_blank" href="../admin/">
									Admin Login
								</a>
							</div>
							<!--
							<div class="registration">
								Don't have an account ?
								<a class="" href="signup.html">
									Create an account
								</a>
							</div>-->
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