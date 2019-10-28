<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
    <?php include('assets/inc/head.php');?>
  <!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar">
    <!--Nav Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navbar-->
      <!--Sidebar-->
        <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Train Details</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Dashbaord</a></li>
              <li class="breadcrumb-item"><a href="#">Trains</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </nav>
        </div>

        <?php
          /**
            *hey there lets get details of our viewed train using its train ID
            */
            $aid=$_GET['id'];
            $ret="select * from orrs_train where id=?";//fetch details of train
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
            {
        ?>
        <!--get details of logged in user-->
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">

            <!--Train Details-->
              <div id='printReceipt' class="invoice">
                <div class="row invoice-header">
                  <div class="col-sm-7">
                    <div class="invoice-logo"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="invoice-details" >
                    <thead>
                      <tr>
                        <th>Train Number</th>
                        <th>Train Name</th>
                        <th>Departure Station</th>
                        <th>Arrival Station</th>
                        <th>Departure Time</th>
                        <th>Fare</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      <tr>
                        <td><?php echo $row->number;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->current;?></td>
                        <td><?php echo $row->destination;?></td>
                        <td><?php echo $row->time;?></td>
                        <td><span class="badge badge-pill badge-success">Ksh<?php echo $row->fare;?></span></td>
                      </tr>
                      <hr>
                        
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row invoice-footer">
                  <div class="col-lg-12">
                    <button id="print" onclick="printContent('printReceipt');" class="btn btn-lg btn-space btn-secondary">Print</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!--Close logged in user instance-->
        <?php }?>
    <!--footer-->
    <?php include('assets/inc/footer.php');?>
    <!--end footer-->
      </div>
      
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
    <!--print train ticket js-->
    <script>
      function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
     </script>
  </body>

</html>