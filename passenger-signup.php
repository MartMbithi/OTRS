<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);

$query="insert into passenger(name,age,gender,phoneno,email,username,password) values(?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssss',$name,$age,$gender,$phoneno,$email,$username,$password);
$stmt->execute();
echo"<script>alert('Successfully Created Account ');</script>";
}
?>
<?php include("includes/header.php")?>

		<!--left-fixed -navigation-->
		
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">Train Management System Passenger SignUp Panel</h2>
				<div class="sign-up-row widget-shadow">
					<h5> Please Fill All Personal Information :</h5>
                    <form method="post" action="" name="SignUP" class="form-vertical" >
						
						<div class="module-body">
							

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="text" placeholder="Name" name="name" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="text" placeholder="Age" name="age" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="text" placeholder="Gender" name="gender" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="text" placeholder="Phone Number" name="phoneno" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="email" placeholder="Email Address" name="email" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="text" placeholder="Username" name="username" class="form-controlmb " required="required">
								</div>
							</div>

							<div class="control-group">
								<div class="controls row-fluid">
									<input type="password" placeholder="Password" name="password" class="form-controlmb " required="required">
								</div>
							</div>


						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<input type="submit" name="submit" Value="Create Account" class="btn btn-block btn-success">

								</div>
							</div>
						</div>

                        <div class="registration">
								Already  have an account ?
								<a class="" href="index.php">
									Login
								</a>
							</div>
					</form>
              
                
				</div>
			</div>
		</div>
		<!--footer-->
		<?php include("includes/footer.php")?>
        <!--//footer-->
	</div>
	
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
	
</body>
</html>
