<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
  <?php include("assets/inc/head.php");?>
  <!--End Head-->
  <body>

    <div class="be-wrapper be-fixed-sidebar">

    <!--Navbar-->
     <?php include("assets/inc/navbar.php");?>
      <!--End Nav Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
        <div class="main-content container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-6">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">airline_seat_recline_normal</i></div>
                <div class="data-info">
                <?php
                  $result ="SELECT SUM(train_fare) FROM orrs_train_tickets";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($count_fare);
                  $stmt->fetch();
                  $stmt->close();
                  ?>
                  <div class="desc">Paid Tickets</div>
                  <div class="value"><span class = "badge badge-success"> Ksh</span><span class="number" data-toggle="counter" data-end="<?php echo $count_fare;?>">0</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">assignment_late</i></div>
                <div class="data-info">
                <?php
                  //code for summing up number of passengers 
                  $result ="SELECT count(*) FROM orrs_train_tickets where confirmation != 'Approved' ";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($pass);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Pending Checkouts</div>
                  <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-6">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">loyalty</i></div>
                <div class="data-info">
                  <?php
                    //code for summing up number of trains tickets
                    $result ="SELECT count(*) FROM orrs_train_tickets where confirmation = 'Approved'";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($ticket);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Approved Checkouts</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $ticket;?>">0</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6">
            <div class="widget widget-tile">
            <div class="chart sparkline"><i class="material-icons">rowing</i></div>
              <div class="data-info">
              <?php
                  //code for summing up number of trains tickets
                  $result ="SELECT count(*) FROM `orrs_train_tickets` ";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($resevations);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                <div class="desc">Reservations</div>
                <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $resevations;?>">0</span>
                </div>
              </div>
            </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Tickets Payment Status
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                <!--Start Chart-->
                
            <div id="PieChart" style="height: 200px; width: 100%;"></div>
             <!--COde for geting all details of tickets in the system-->
             <script type="text/javascript">
                    window.onload = function() {

                    var options = {
                      title: {
                        
                      },
                      data: [{
                          type: "pie",
                          startAngle: 45,
                          showInLegend: "true",
                          legendText: "{label}",
                          indexLabel: "{label} ({y})",
                          yValueFormatString:"#,##0.#"%"",
                          dataPoints: [
                          <?php
                            //code for getting all approved tickets
                            $result ="SELECT count(*) FROM  orrs_train_tickets where confirmation = 'Approved' ";
                            $stmt = $mysqli->prepare($result);
                            $stmt->execute();
                            $stmt->bind_result($approved);
                            $stmt->fetch();
                            $stmt->close();
                          
                            //code for getting all non approved tickets
                            $result ="SELECT count(*) FROM orrs_train_tickets  where confirmation != 'Approved'";
                            $stmt = $mysqli->prepare($result);
                            $stmt->execute();
                            $stmt->bind_result($not_approved);
                            $stmt->fetch();
                            $stmt->close();
                            
                            
                          ?>
                          
                            { label: "Paid Reservation", y: <?php echo $approved;?> },
                            { label: "Pending Payments", y: <?php echo $not_approved;?> },
                            
                            
                          ]
                      }]
                    };
                    $("#PieChart").CanvasJSChart(options);

                    }
                    </script>
                <!--eND chart-->
                </div>
              </div>
            </div>
          </div>

          
         
        </div>
        <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
      </div>
     
    </div>

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <!--Chart js-->
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <!--End chart js-->
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.dashboard();
      
      });
    </script>
  </body>

</html>