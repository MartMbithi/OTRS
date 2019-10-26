<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['pass_id'];
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
          <h2 class="page-head-title">Train Ticket</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Dashbaord</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item active">Print</li>
            </ol>
          </nav>
        </div>

        <?php
   /**
    *Server side code to get details of single passenger using id 
    */
    $aid=$_SESSION['pass_id'];
    $ret="select * from orrs_passenger where pass_id=?";//fetch details of pasenger
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
              <div class="invoice">
                <div class="row invoice-header">
                  <div class="col-sm-7">
                    <div class="invoice-logo"></div>
                  </div>
                  <div class="col-sm-5 invoice-order"><span class="invoice-id">Train Ticket For</span><span class="incoice-date"><?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?></span></div>
                </div>
                <div class="row invoice-data">
                  <div class="col-sm-5 invoice-person"><span class="name">Kristopher Donny</span><span>Developer and Designer</span><span>donny@designer.co</span><span>661 Bubby Street</span><span>United States</span></div>
                  <div class="col-sm-2 invoice-payment-direction"><i class="icon mdi mdi-chevron-right"></i></div>
                  <div class="col-sm-5 invoice-person"><span class="name">Elliot Mark</span><span>CEO at BLX</span><span>ceoblx@company.co</span><span>839 Owagner Drive</span><span>United States</span></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="invoice-details">
                      <tr>
                        <th style="width:60%;">Description</th>
                        <th class="hours" style="width:17%;">Hours</th>
                        <th class="amount" style="width:15%;">Amount</th>
                      </tr>
                      <tr>
                        <td class="description">Web design (Etiam sagittis metus sit amet mauris gravida hendrerit)</td>
                        <td class="hours">60</td>
                        <td class="amount">$4,200.00</td>
                      </tr>
                      <tr>
                        <td class="description">Responsive design (Etiam sagittis metus sit amet mauris gravida hendrerit)</td>
                        <td class="hours">10</td>
                        <td class="amount">$1,500.00</td>
                      </tr>
                      <tr>
                        <td class="description">Logo design (Cras faucibus tincidunt elit id rhoncus.)</td>
                        <td class="hours">12</td>
                        <td class="amount">$1,700.00</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary">Subtotal</td>
                        <td class="amount">$7,400,00</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary">Discount (20%)</td>
                        <td class="amount">$1,480,00</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary total">Total</td>
                        <td class="amount total-value">$5,920</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 invoice-payment-method"><span class="title">Payment Method</span><span>Credit card</span><span>Credit card type: mastercard</span><span>Number verification: 4256981387</span></div>
                </div>
                <div class="row">
                  <div class="col-lg-12 invoice-message"><span class="title">Thank you for contacting us</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis massa nisl. Sed fringilla turpis id mi ultrices, et faucibus ipsum aliquam. Sed ut eros placerat, facilisis est eu, congue felis.</p>
                  </div>
                </div>
                <div class="row invoice-company-info">
                  <div class="col-md-6 col-lg-2 logo"><img src="assets/img/logo-symbol.png" alt="Logo-symbol"></div>
                  <div class="col-md-6 col-lg-4 summary"><span class="title">Beagle Company</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                  </div>
                  <div class="col-sm-6 col-lg-3 phone">
                    <ul class="list-unstyled">
                      <li>+1(535)-8999278</li>
                      <li>+1(656)-3558302</li>
                    </ul>
                  </div>
                  <div class="col-sm-6 col-lg-3 email">
                    <ul class="list-unstyled">
                      <li>beagle@company.co</li>
                      <li>beagle@support.co</li>
                    </ul>
                  </div>
                </div>
                <div class="row invoice-footer">
                  <div class="col-lg-12">
                    <button class="btn btn-lg btn-space btn-secondary">Save PDF</button>
                    <button class="btn btn-lg btn-space btn-secondary">Print</button>
                    <button class="btn btn-lg btn-space btn-primary">Pay now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Close logged in user instance-->
    <?php }?>
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
  </body>

</html>