<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==1)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from train WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Train Records Successfully Removed";

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
				<div class="tables">
					<h2 class="title1">Railway Management System Ticket Bookings</h2>
                    
					
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						
						<table class="table"> <thead> <tr> <th>#</th>
                         <th>Passenger Name</th>
                          <th>Train Name</th> 
                          <th>Departure</th>
                          <th>Destination</th>
                          <th>Travel Date</th>
                          <th>Time</th>
													<!--
                          <th>Train Number</th>-->
                           </tr>
                            </thead>
                             <tbody>
                             <?php $sql = "SELECT * from  bookings";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                                            <td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->name);?></td>
											<td><?php echo htmlentities($result->train);?></td>
											<td><?php echo htmlentities($result->departure);?></td>
                                            
                                            <td><?php echo htmlentities($result->destination);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><?php echo htmlentities($result->time);?></td>
																						<!--
                                            <td><?php echo htmlentities($result->number);?></td>

                                            <!--
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->ailment);?></td>
                                          <td><?php echo htmlentities($result->password);?></td>
                                            <td><a href="admin-manage-out-patient-details.php?del=<?php echo $result->id;?>" onclick="return confirm('Do You Want To Remove This Record ?');"><i class="fa fa-trash-o"></i></a></td>-->
										</tr> 
                         </tbody> 
                         <?php $cnt=$cnt+1; }} ?>
                         </table> 
					</div>
					<div class="main-page">
				<div class="tables">
					<h2 class="title1">Railway Management System View Ticket Payments</h2>
                    
					
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						
						<table class="table"> <thead> <tr> <th>#</th>
                         <th>Passenger Name</th>
                          <th>Ticket Price</th> 
                          <th>Services</th>
                          <!--
                          <th>Destination</th>
                          <th>Travel Date</th>
                          <th>Time</th>
													<!--
                          <th>Train Number</th>-->
                           </tr>
                            </thead>
                             <tbody>
                             <?php $sql = "SELECT * from  payments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                                            <td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->name);?></td>
											<td><?php echo htmlentities($result->amount);?></td>
											<td><?php echo htmlentities($result->services);?></td>
                                            <!--
                                            <td><?php echo htmlentities($result->destination);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><?php echo htmlentities($result->time);?></td>
																						<!--
                                            <td><?php echo htmlentities($result->number);?></td>

                                            <!--
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->ailment);?></td>
                                          <td><?php echo htmlentities($result->password);?></td>
                                            <td><a href="admin-manage-out-patient-details.php?del=<?php echo $result->id;?>" onclick="return confirm('Do You Want To Remove This Record ?');"><i class="fa fa-trash-o"></i></a></td>-->
										</tr> 
                         </tbody> 
                         <?php $cnt=$cnt+1; }} ?>
                         </table> 
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