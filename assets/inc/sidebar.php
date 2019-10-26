<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="active"><a href="pass-dashboard.php"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['pass_id'];//assaign session a varible [PASSENGER ID]
                      $ret="select * from orrs_passenger where pass_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->pass_uname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="pass-profile.php">View</a>
                      </li>
                      <li><a href="pass-profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="pass-profile-avatar.php"><span class="badge badge-success float-right">New</span>Profile Avatar</a>
                      </li>
                      <li><a href="pass-profile-password.php"><span class="badge badge-danger float-right">New</span>Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-train"></i><span>Trains</span></a>
                  
                    <ul class="sub-menu">
                       <li><a href="pass-all-available-trains.php">All Available Trains</a>
                       <li><a href="pass-search-available-trains.php">Search Train</a>
                    </li>
                      
                    </ul>
                
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Book Train</span></a>
                    <ul class="sub-menu">
                      <li><a href="pass-book-train.php">Reserve Train</a>
                      </li>
                      <li><a href="pass-cancel-train.php">Cancel Train</a>
                      </li>
                      
                    </ul>
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-ticket-confirmation"></i><span>Tickets</span></a>
                    <ul class="sub-menu">
                    <li><a href="pass-train-checkout-ticket.php">Checkout</a>
                      </li>
                      <li><a href="pass-confirm-ticket.php">Confirm Checkout</a>
                      </li>
                      <li><a href="pass-print-ticket.php"><span class="badge badge-primary float-right">New</span>Print</a>
                      </li>
                    </ul>
                  </li>                  
                  <li><a href="pass-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Log Out</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>