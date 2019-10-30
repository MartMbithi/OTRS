 <!--Server side code to handle passenger sign up-->
 <?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_profile']))
		{
            $emp_id = $_GET['emp_id'];
            $emp_fname=$_POST['emp_fname'];
            #$mname=$_POST['mname'];
            $emp_lname=$_POST['emp_lname'];
            $emp_nat_idno=$_POST['emp_nat_idno'];
            $emp_phone=$_POST['emp_phone'];
            $emp_addr = $_POST['emp_addr'];
            $emp_uname=$_POST['emp_uname'];
            $emp_email=$_POST['emp_email'];
            $emp_dept=$_POST['emp_dept'];
            $emp_pwd=sha1(md5($_POST['emp_pwd']));
      //sql to insert captured values
			$query="update orrs_employee set emp_fname=?, emp_lname=?, emp_phone=?, emp_addr=?, emp_nat_idno=?, emp_uname=?, emp_email=?, emp_dept=?, emp_pwd=? where emp_id=? ";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssi',$emp_fname, $emp_lname, $emp_phone, $emp_addr, $emp_nat_idno, $emp_uname, $emp_email, $emp_dept, $emp_pwd, $emp_id);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Employee  Account Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->

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
          <h2 class="page-head-title">View Employee</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Employee</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($success)) {?>
                                <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $success;?>!","success");
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
        <!--Employee Instance-->
        <?php
            $aid=$_GET['emp_id'];
            $ret="select * from orrs_employee where emp_id=?";
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
                <div class="card-header card-header-divider">Employee Profile<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_fname" value="<?php echo $row->emp_fname;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_lname" value="<?php echo $row->emp_lname;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">National ID Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_nat_idno"  value="<?php echo $row->emp_nat_idno;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_phone" value="<?php echo $row->emp_phone;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_addr" value="<?php echo $row->emp_addr;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Department</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_dept" value = "<?php echo $row->emp_dept;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_email" value="<?php echo $row->emp_email;?>" id="inputText3" type="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Username</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="emp_uname" value="<?php echo $row->emp_uname;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    
                    
                    <!--    Disable This Code
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-primary" value ="Update Employee " name = "update_profile" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                      </div>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
        <!--End Employee Instance-->
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
    <script src="assets/js/swal.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>