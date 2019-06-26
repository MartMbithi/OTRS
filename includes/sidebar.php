<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
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
            </button>
            <h1><a class="navbar-brand" href="passenger-dashboard.php"><span class=" fa fa-subway"></span> RMS<span class="dashboard_text"><?php echo $row->username;?>'s Dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="passenger-dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              </li>
            
              <li>
                <a href="passenger-view-trains.php">
                <i class="fa fa-train"></i> <span>Trains</span>
                <small class="label pull-right label-info"></small>
                </a>
              </li>

              <li>
                <a href="passenger-reserve.php">
                <i class="fa fa-book"></i> <span>Reservation</span>
                <small class="label pull-right label-info"></small>
                </a>
              </li>

              <li>
                <a href="passenger-manage-reservations.php">
                <i class="fa fa-cog"></i> <span>Cancel Travel</span>
                <small class="label pull-right label-info"></small>
                </a>
              </li>


                      <li>
                <a href="passenger-view-bookings.php">
                <i class="fa fa-ticket"></i> <span>My Tickets</span>
                <small class="label pull-right label-info"></small>
                </a>
              </li>
       
      
          </div>
         
      </nav>
    </aside>
    <?php }?>