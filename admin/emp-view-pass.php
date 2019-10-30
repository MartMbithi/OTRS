 <!--Server side code to handle passenger sign up-->
 <?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['Create_Profile']))
		{
            $pass_id = $_GET['pass_id'];            
			$pass_fname=$_POST['pass_fname'];
			#$mname=$_POST['mname'];
			$pass_lname=$_POST['pass_lname'];
			$pass_phone=$_POST['pass_phone'];
			$pass_addr=$_POST['pass_addr'];
			$pass_uname=$_POST['pass_uname'];
			$pass_email=$_POST['pass_email'];
			//$pass_pwd=sha1(md5($_POST['pass_pwd']));
            //sql to insert captured values
			$query="update orrs_passenger  set  pass_fname=?, pass_lname=?, pass_phone=?, pass_addr=?, pass_uname=?, pass_email=? where pass_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssi',$pass_fname, $pass_lname, $pass_phone, $pass_addr, $pass_uname, $pass_email, $pass_id);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Passenger Account Updated";
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
          <h2 class="page-head-title">Update Passenger</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Passenger</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($success)) {?>
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
       
       <!--Train Details forms-->
       <?php
            $aid=$_GET['pass_id'];
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
                <div class="card-header card-header-divider"> Single Passenger Details<span class="card-subtitle"></span></div>
                <div class="card-body">
                <table class="table table-striped table-hover table-fw-widget" id="table1">
                <thead>
                      <tr>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Email</th>
                      </tr> 
                    </thead>
                    <tbody>
                    <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->pass_fname;?><?php echo $row->pass_lname;?></td>
                        <td><?php echo $row->pass_phone;?></td>
                        <td><?php echo $row->pass_addr;?></td>
                        <td class="center"><?php echo $row->pass_email;?></td>
                                             
                      </tr>

                      <?php }?>
                    </tbody>
                  </table>
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