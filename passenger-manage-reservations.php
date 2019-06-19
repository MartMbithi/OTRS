<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$train=$_POST['train'];
$departure=$_POST['departure'];
$destination=$_POST['destination'];
$date=$_POST['date'];
$time=$_POST['time'];
$status=$_POST['status'];
$query="insert into bookings(name,train,departure,destination,date,time,status) values(?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssss',$name,$train,$departure,$destination,$date,$time,$status);
$stmt->execute();
echo"<script>alert('Successfully Cancelled  A Train Booking ');</script>";
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
					<h2 class="title1">Cancel Booked Train Ticket </h2>
					
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
          <input type="text" name="train" id="train" value=' <?php echo $row->train;?>' readonly class="form-control" required="required" >
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
          <input type="text" name="date" id="date"  class="form-control" value='<?php echo $row->date_travelling;?>' readonly required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Time</label>
          <input type="time" name="time" id="time" value="<?php echo $row->time;?>" readonly  class="form-control"   required="required" >
          </div>

					<div class="form-group">
          <label class="col-sm-4 control-label">Cancellation ID</label>
          <input type="text" name="status" id="status"  class="form-control"  value="1" readonly required="required" >
          </div>

          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="submit" Value="Cancel Train" class="btn btn-danger mr-2 ">
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
