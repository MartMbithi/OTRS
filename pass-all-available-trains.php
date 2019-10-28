<!--Server side scripting  code to hold  user session-->
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['pass_id'];
?>
<!--End server side code-->
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
    <?php include('assets/inc/head.php');?>
  <!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar">
    <!--Navbar-->
      <?php include("assets/inc/navbar.php");?>
      <!--End Navbar-->
        <!--Navbar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Trains</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Trains</a></li>
              <li class="breadcrumb-item active">Available Trains</li>
            </ol>
          </nav>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-table">
                <div class="card-header">Available Trains
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Train Number</th>
                        <th>Train Name</th>
                        <th>Route</th>
                        <th>Current Station</th>
                        <th>Destination Station</th>
                        <th>Departure Time</th>
                        <th>Fare</th>
                        <th>No. Of Passengers</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        /*
                        *Lets get details of available trains!!
                        */
                        $ret="SELECT * FROM orrs_train  "; //sql code to get all details of trains.
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                        <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->number;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->route;?></td>
                            <td><?php echo $row->current;?></td>
                            <td><?php echo $row->destination;?></td>
                            <td><?php echo $row->time;?></td>
                            <td><span class ="badge badge-pill badge-success">Ksh</span><?php echo $row->fare;?></td>
                            <td><?php echo $row->passengers;?><td>
                        </tr>
                    <?php $cnt = $cnt+1; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!--Footer-->
      <?php include('assets/inc/footer.php');?>
      <!--End Footer-->
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>

</html>