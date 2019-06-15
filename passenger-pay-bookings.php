<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$amount=$_POST['amount'];
$services=$_POST['services'];

//$destination=$_POST['destination'];
//$date=$_POST['date'];
//$time=$_POST['time'];
$query="insert into payments (name,amount,services) values(?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sss',$name,$amount,$services);
$stmt->execute();
echo"<script>alert('Successfully Paid For  A Train  Ticket');</script>";
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
					<h2 class="title1">Pay A Train  Train Ticket</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								
							</div>
							<div class="form-body">


                                        <form method="post" action="" name="book train" class="form-horizontal" >
          <div class="form-group">
          <label class="col-sm-4 control-label">My Name </label>
          <input type="text" name="name" id="name" class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Ticket Amount</label>
          <input type="text" name="amount" id="amount"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Services</label>
          <input type="text" name="services" id="services"  value="Train Ticket" readonly class="form-control" required="required" >
          </div>
<!--
          <div class="form-group">
          <label class="col-sm-4 control-label">Destination</label>
          <input type="text" name="destination" id="destination" class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Date</label>
          <input type="date" name="date" id="date"  class="form-control" required="required" >
          </div>

          <div class="form-group">
          <label class="col-sm-4 control-label">Travel Time</label>
          <input type="time" name="time" id="time"  class="form-control"   required="required" >
          </div>
-->
          <div class="col-sm-6 col-sm-offset-4">
          <input type="submit" name="submit" Value="Pay" class="btn btn-success mr-2 ">
          </div>
					
<!--
          <div class="form-group">
          <label class="col-sm-4 control-label">My Password</label>
          <input type="text" name="number" id="number"  class="form-control"value=" <?php echo $row->password;?>" readonly required="required" >
          </div>
<!--
          <div class="form-group">
          <label class="col-sm-4 control-label">Password</label>
          <input type="text" name="password" id="password"  class="form-control" required="required" >
          </div>
-->

          
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

