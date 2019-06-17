
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
//$age=$_POST['age'];
//$gender=$_POST['gender'];
//$phoneno=$_POST['phoneno'];
//$gender=$_POST['gender'];
//$email=$_POST['email'];
//$username=$_POST['username'];
//$password=md5($_POST['password']);
//$passwordconf=md5($_POST['passwordconf']);
$train=$_POST['train'];
$departure=$_POST['departure'];
$destination=$_POST['destination'];
$date_travelling=$_POST['date_travelling'];
$time=$_POST['time'];
$status=$_POST['status'];
//$date = date('d-m-Y h:i:s', time());
$query="update  passenger set name=?,  train=?, departure=?, destination=?, date_travelling=?, time=?,status=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssssi', $name,  $train, $departure, $destination, $date_travelling, $time, $status,  $aid);
$stmt->execute();if($stmt)
{
	header("location:passenger-view-bookings.php");
}

else
{
	echo "<script>alert('Please Confirm Your Payment');</script>";

}} ?>
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
                <span class="badge badge-success"><h3>Success! Please Confirm Your Payment</h3></span>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								
							</div>
							<div class="form-body">
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


          <form method="post" action="" name="book train" class="form-horizontal" >
          <div class="form-group">
          <label class="col-sm-4 control-label">My Name </label>
          <input type="text" name="name" id="name" value=" <?php echo $row->name;?>" readonly class="form-control" required="required" >
          </div>
					
          <div class="form-group">
          <label class="col-sm-4 control-label">Train</label>
          <input type="text" name="train" id="train" value='<?php echo $row->train;?>' readonly   class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Departure Station</label>
          <input type="text" name="departure" id="departure" value='<?php echo $row->departure;?>' readonly  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Destination</label>
          <input type="text" name="destination" id="destination" value='<?php echo $row->destination;?>' readonly  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Date</label>
          <input type="text" name="date_travelling" id="date_travelling"  value='<?php echo $row->date;?>' readonly class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Time</label>
          <input type="text" name="time" id="time"  class="form-control" value='<?php echo $row->time;?>' readonly   required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Status</label>
          <input type="text" name="status" id='status' value='Paid' readonly  class="form-control"   required="required" >
          </div>

          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="update" Value="Confirm Payment" class="btn btn-success mr-2 ">
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
<?php }?>
