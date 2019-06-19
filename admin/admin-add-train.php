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
//$idno=$_POST['idno'];
//$address=$_POST['address'];
//$name=$_POST['name'];
//$age=$_POST['age'];
$route=$_POST['route'];
$current=$_POST['current'];
$destination=$_POST['destination'];
$time=$_POST['time'];
$passengers=$_POST['passengers'];
$number=$_POST['number'];
$fare=$_POST['fare'];
//$time=$_POST['time'];
$sql="INSERT INTO train (name,route,current,destination,time,passengers,number,fare)VALUES(:name,:route,:current,:destination,:time,:passengers,:number, :fare)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':route',$route,PDO::PARAM_STR);
$query->bindParam(':current',$current, PDO::PARAM_STR);
$query->bindParam(':destination',$destination, PDO::PARAM_STR);
$query->bindParam(':time',$time, PDO::PARAM_STR);
$query->bindParam(':passengers',$passengers, PDO::PARAM_STR);
$query->bindParam(':number',$number, PDO::PARAM_STR);
$query->bindParam(':fare',$fare, PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Train Record Successfully Created ";
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
					<h2 class="title1">Railway Management System Add Train Records</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Fill All Train Details :</h4>
							</div>
							<div class="form-body">

                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                                        <form method="post" action="" name="add reception" class="form-horizontal" >
          <div class="form-group">
          <label class="col-sm-4 control-label">Train Name </label>
          <input type="text" name="name" id="name"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Train Route </label>
          <input type="text" name="route" id="route"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Train Current Station</label>
          <input type="text" name="current" id="current"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Train Destination Station</label>
          <input type="text" name="destination" id="destination"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Departure Time</label>
          <input type="time" name="time" id="time"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Number Of Passengers</label>
          <input type="text" name="passengers" id="passengers"  class="form-control" required="required" >
          </div>
					

          <div class="form-group">
          <label class="col-sm-4 control-label">Train Number</label>
          <input type="text" name="number" id="number"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Train Fare <span class="badge badge-warning">Ksh</span></label>
          <input type="text" name="fare" id="fare"  class="form-control" required="required" >
          </div>


          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="submit" Value="Add Train Record" class="btn btn-success mr-2 ">
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