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
//$password=md5($_POST['password']);

$query="insert into bookings (name,train,departure,destination,date,time) values(?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssss',$name,$train,$departure,$destination,$date,$time);
$stmt->execute();
if($stmt)
{
	header("location:passenger-pay-bookings.php");
}

else
{
	echo "<script>alert('Please Confirm Your Booking Details');</script>";

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
       
             </div>
		<div id="page-wrapper">
        <span class="badge badge-success"><h3>Success! Please Confirm Your Booking</h3></span>
			<div class="main-page">
				<div class="forms">					
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
          <input type="text" name="name" id="name"  readonly value=" <?php echo $row->name;?>" class="form-control" required="required" >
          </div>
					
          <div class="form-group">
          <label class="col-sm-4 control-label">Train</label>
          <input type="text" name="train" id="train" readonly value='<?php echo $row->train;?>' class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Departure Station</label>
          <input type="text" name="departure" id="departure" readonly value='<?php echo $row->departure;?>'  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Destination</label>
          <input type="text" name="destination" id="destination" readonly value='<?php echo $row->destination;?>' class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Date</label>
          <input type="text" name="date" id="date" readonly value='<?php echo $row->date_travelling;?>'  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Time</label>
          <input type="time" name="time" id="time"  class="form-control"  readonly value='<?php echo $row->time;?>'  required="required" >
          </div>

          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="submit" Value="Confirm Booking" class="btn btn-success mr-2 ">
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
