
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
//$status=$_POST['status'];
//$date = date('d-m-Y h:i:s', time());
$query="update  passenger set name=?,  train=?, departure=?, destination=?, date_travelling=?, time=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssi', $name,  $train, $departure, $destination, $date_travelling, $time,  $aid);
$stmt->execute();
if($stmt)
{
	header("location:passenger-confirm-booking.php");
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
        
		<div id="page-wrapper">
			<div class="main-page">
			<div class="tables">
					<h2 class="title1">View Our Trains</h2>
                    
					
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						
						<table class="table"> <thead> <tr> <th>#</th>
                         <th> Name</th>
                          <th>Train Route</th> 
                          <th>Current Station</th>
                          <th>Destination</th>
                          <th>Time</th>
                          <th>No. Passengers</th>
                          <th>Train Number</th>
						  <th>Train Fare</th>
                           </tr>
                            </thead>
                             <tbody>
                             <?php
                    $aid=$_SESSION['id'];
                   $ret="SELECT * FROM train";
                    $stmt= $mysqli->prepare($ret) ;
                    //$stmt->bind_param('i',$aid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    $cnt=1;
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
                    <tr><td><?php echo $cnt;;?></td>
                    <td><?php echo $row->name;?> </td>
                    <td><?php echo $row->route;?></td>
                    <td><?php echo $row->current;?></td>
                    <td><?php echo $row->destination;?></td>
                    <td><?php echo $row->time;?></td>
                    <td><?php echo $row->passengers;?></td>
                    <td><?php echo $row->number;?></td>
					<td>Ksh<?php echo $row->fare;?></td>

                                            <!--
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->ailment);?></td>
                                          <td><?php echo htmlentities($result->password);?></td>
                                            <td><a href="admin-manage-out-patient-details.php?del=<?php echo $result->id;?>" onclick="return confirm('Do You Want To Remove This Record ?');"><i class="fa fa-trash-o"></i></a></td>-->
										</tr> 
                         </tbody> 
                         <?php $cnt=$cnt+1; } ?>
                         </table> 
					</div>
					
				</div>
            
		</div>
				<div class="forms">
					<h2 class="title1">Book A Train </h2>
					
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
          <input type="text" name="name" id="name" value=" <?php echo $row->name;?>" class="form-control" required="required" >
          </div>

		  <div class="form-group">
          <label class="col-sm-4 control-label">Train </label>
          <input type="text" name="train" id="train"  class="form-control" required="required" >
          </div>

<!--
		  <div class="form-group">
		  <label class="col-sm-4 control-label">Train</label>
            <select class="form-control" id="train"  name="train" required>
              <option value="">Choose Train</option>
			  <?php
                    $aid=$_SESSION['id'];
                   $ret="SELECT * FROM train";
                    $stmt= $mysqli->prepare($ret) ;
                    //$stmt->bind_param('i',$aid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    $cnt=1;
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
              <option><?php echo $row->name;?></option>
			  <?php $cnt=$cnt+1; } ?>
			  
            </select>
		  <div>-->

          <div class="form-group">
          <label class="col-sm-4 control-label">Departure Station</label>
          <input type="text" name="departure" id="departure"   class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Destination</label>
          <input type="text" name="destination" id="destination" class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Date</label>
          <input type="date" name="date_travelling" id="date_travelling"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Time</label>
          <input type="time" name="time" id="time"  class="form-control"   required="required" >
          </div>

          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="update" Value="Book Train" class="btn btn-success mr-2 ">
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
