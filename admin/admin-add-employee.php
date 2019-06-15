<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==1)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$idno=$_POST['idno'];
$address=$_POST['address'];
//$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql="INSERT INTO employee (name,idno,address,age,phone,email,username,password)VALUES(:name,:idno,:address,:age,:phone,:email,:username,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':idno',$idno,PDO::PARAM_STR);
$query->bindParam(':phone',$phone, PDO::PARAM_STR);
$query->bindParam(':email',$email, PDO::PARAM_STR);
$query->bindParam(':username',$username, PDO::PARAM_STR);
$query->bindParam(':password',$password, PDO::PARAM_STR);
$query->bindParam(':address',$address, PDO::PARAM_STR);
$query->bindParam(':age',$age, PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Employee Account Successfully Created ";
}
else
{
$error="Something Went Wrong. Please Try Again";
}

}


	?>

<?php include("includes/header.php")?>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<?php include("includes/sidebar.php")?>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php include("includes/navbar.php")?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Railway Management System Add Employee Records</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Fill All Employee Details :</h4>
							</div>
							<div class="form-body">

                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                                        <form method="post" action="" name="add reception" class="form-horizontal" >
          <div class="form-group">
          <label class="col-sm-4 control-label">Full Name </label>
          <input type="text" name="name" id="name"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">National ID Number </label>
          <input type="text" name="idno" id="idno"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Address</label>
          <input type="text" name="address" id="address"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Age</label>
          <input type="text" name="age" id="age"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Mobile Phone Number</label>
          <input type="text" name="phone" id="phone"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Email Address</label>
          <input type="email" name="email" id="email"  class="form-control" required="required" >
          </div>
					

          <div class="form-group">
          <label class="col-sm-4 control-label">Username</label>
          <input type="text" name="username" id="username"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Password</label>
          <input type="text" name="password" id="password"  class="form-control" required="required" >
          </div>


          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="submit" Value="Add Employee" class="btn btn-success mr-2 ">
          </div>
          </form>
								</div>
						</div>
					</div>

					
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
<?}?>