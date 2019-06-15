<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>

				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									
									<div class="user-name">
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

										
										<span>Welcome &nbsp;<?php echo $row->username;?> </span> 
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu"><!--
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> -->
								<li> <a href="passenger-profile.php"><i class="fa fa-user"></i>My Profile</a> </li>
								<li> <a href="passenger-profile-update.php"><i class="fa fa-suitcase"></i> Update Profile</a> </li>
								<li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	

		</div>
		<?}?>