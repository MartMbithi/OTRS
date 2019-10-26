<?php
    session_start();
    include('assets/inc/config.php');
    //date_default_timezone_set('Africa /Nairobi');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['pass_id'];
    if(isset($_POST['train_fare_confirm_checkout']))
    {
     
            $pass_name=$_POST['pass_name'];
            //$pass_lname = $_POST['pass_lname'];
            //$pass_phone=$_POST['pass_phone'];
            $pass_addr=$_POST['pass_addr'];
            $pass_email=$_POST['pass_email'];        
            $train_name = $_POST['train_name'];
            $train_no = $_POST['train_no'];
            $train_dep_stat = $_POST['train_dep_stat'];
            $train_arr_stat = $_POST['train_arr_stat'];
            $train_fare = $_POST['train_fare'];
            $fare_payment_code = $_POST['fare_payment_code'];
            //sql file to update the table of passengers with the new captured information
            $query="insert into orrs_train_tickets (pass_name, pass_addr, pass_email, train_name, train_no, train_dep_stat, train_arr_stat,  train_fare, fare_payment_code) values (?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query); //prepare sql and bind it later
            $rc=$stmt->bind_param('sssssssss', $pass_name, $pass_addr, $pass_email, $train_name, $train_no, $train_dep_stat, $train_arr_stat, $train_fare, $fare_payment_code);
            $stmt->execute();
            if($stmt)
            {
                $succ = "Ticket Payment Confirmed";
            }
            else 
            {
                $err = "Please Try Again Later";
            }
            #echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
            }
?>
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include('assets/inc/head.php');?>
<!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    <!--Navigation Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Train Tickt Checkout </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item"><a href="#">Checkout</a></li>
            </ol>
          </nav>
        </div>
            <?php if(isset($succ)) {?>
                                <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ;?>!","success");
                            },
                                100);
                </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed!","<?php echo $err;?>!","Failed");
                            },
                                100);
                </script>

        <?php } ?>
        <div class="main-content container-fluid">
        <?php
            $aid=$_SESSION['pass_id'];
            $ret="select * from orrs_passenger where pass_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider"><span class="card-subtitle"></span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_name"  value="<?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Email</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_email"  value="<?php echo $row->pass_email;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name= "pass_addr"  value="<?php echo $row->pass_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Booked Train Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="train_no"  value="<?php echo $row->pass_train_number;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Booked Train Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="train_name"  value="<?php echo $row->pass_train_name;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Departure Station</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly  name = "train_dep_stat" value="<?php echo $row->pass_dep_station;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Arrival Station</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name = "train_arr_stat" value="<?php echo $row->pass_arr_station;?>" id="inputText3" type="text">
                      </div>
                    </div>                   
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Train Fare</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name = "train_fare"  value="<?php echo $row->pass_train_fare;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Payment Code(MPESA)</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name ="fare_payment_code" value = "<?php echo $row->pass_fare_payment_code;?>" name= "pass_fare_payment_code"  id="inputText3" type="text">
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-outline-primary" value ="Confirm Payment" name = "train_fare_confirm_checkout" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <?php }?>
        
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
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>