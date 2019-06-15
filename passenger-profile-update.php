
<?php
session_start();
include('includes/config.php');
//date_default_timezone_set('Africa /Nairobi');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['update']))
{

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
//$gender=$_POST['gender'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$passwordconf=md5($_POST['passwordconf']);
//$date = date('d-m-Y h:i:s', time());
$query="update  passenger set name=?, age=?, gender=?,  phoneno=?, email=?, username=?, password=?, passwordconf=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssssi', $name, $age, $gender, $phoneno, $email, $username, $password, $passwordconf, $aid);
$stmt->execute();
echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
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
        <?php
$aid=$_SESSION['id'];
	$ret="select * from passenger where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1"> <?php echo $row->username;?> Update Your Profile Details</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								
							</div>
							<div class="form-body">


                                        <form method="post" action="" name="changeprofile" id="change-profile"class="form-horizontal" >
                                        
																				
          <div class="form-group">
          <label class="col-sm-4 control-label">My Name </label>
          <input type="text" name="name" id="name" value="<?php echo $row->name;?>" readonly class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">My Age </label>
          <input type="text" name="age" id="age" value=" <?php echo $row->age;?>" readonly class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">My Gender</label>
          <input type="text" name="gender" id="gender" value="<?php echo $row->gender;?>" readonly class="form-control" required="required" >
          </div>
          <div class="form-group">
          <label class="col-sm-4 control-label">My Phone Number</label>
          <input type="text" name="phoneno" id="phoneno" value=" <?php echo $row->phoneno;?>" class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">My Email Address</label>
          <input type="email" name="email" id="email"  class="form-control" value=" <?php echo $row->email;?>"  required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">My Username</label>
          <input type="text" name="username" id="username"  class="form-control" value="<?php echo $row->username;?>"  required="required" >
          </div>
					

          <div class="form-group">
          <label class="col-sm-4 control-label">My Password</label>
          <input type="password" name="password" id="password"  class="form-control"  required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Confirm Password</label>
          <input type="password" name="passwordconf" id="passwordconf"  class="form-control"  required="required" >
          </div>

          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="update" Value="Update Profile" class="btn btn-danger mr-2 ">
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
