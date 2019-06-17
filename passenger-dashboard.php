<?php
session_start();
include('includes/config.php');

include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];?>

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
			<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                <a href="passenger-view-trains.php"><i class="pull-left fa fa-train icon-rounded"></i></a>
                    <div class="stats">
                    
                      <h5><strong></strong></h5>
                      <span>Trains</span>
                    </div>
                </div>
        	</div>
            
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                <a href="passenger-view-bookings.php"><i class="pull-left fa fa-ticket user1 icon-rounded"></i></a>
                    <div class="stats">
                    
                      <h5><strong></strong></h5>
                      <span>Bookings</span>
                    </div>
                </div>
        	</div>
            
            
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                <a href="passenger-profile.php"><i class="pull-left fa fa-user user2 icon-rounded"></i></a>
                    <div class="stats">
                   
                      <h5><strong></strong></h5>
                      <span>My Profile</span>
                    </div>
                </div>
        	</div>
            
        	
        	<div class="clearfix"> </div>
            
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
		
	<!-- new added graphs chart js-->
	
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
	
	
	<!-- new added graphs chart js-->
	
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
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- for index page weekly sales java script -->
	<script src="js/SimpleChart.js"></script>
    
	<!-- //for index page weekly sales java script -->
	
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
	
</body>
</html>
