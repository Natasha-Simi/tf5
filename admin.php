<?php 
    session_start();
    require_once('test.php');

      $user = $_SESSION['users'];
        $get_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
        if ($get_user->num_rows == 1)
        {
            $profile_data = $get_user->fetch_assoc();
            $_SESSION['id'] = $profile_data['userID'];
            $_SESSION['email']=$profile_data['email'];
            $_SESSION['username']=$profile_data['username'];
        }
      
    
    ?>
    

<html lang="en">
    <title>
        
    
    </title>
     <style>
      .box {
        width: 180px;
        height: 40px;
        border: 1px solid #999;
        font-size: 14px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }
    </style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="logo.jpeg">
    <title>Daily check up</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link href="member.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    
                    <!--<li><a href="dashboard.php" class="waves-effect"> <?php echo "WELCOME: ".$_SESSION['users']; ?></a></li> --> 
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="admin.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="adminreport.php" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>reports</a>
                    </li>

                </ul>
                <div class="center p-20">
                     <a href="logout.php" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">logout</a>
                    
                 </div>
            </div>
            
        </div>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                
                
                  <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Daily Asset Checkup </h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
               
                <form class="form-horizontal" id="admin-form" action="admin.php"  method="post">

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetTag"> Asset Tag
                                                                </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="assetTag" name="assetTag" class="col-xs-12 col-sm-8"  />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetName">Asset Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="assetName" name="assetName" class="col-xs-12 col-sm-8" value=""/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="floorNumber"> Floor:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="floorNumber" name="floorNumber" class="col-xs-12 col-sm-8"  value=""/>
																</div>
						 									</div>
                                                            <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="roomName"> Room:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="roomName" name="roomName" class="col-xs-12 col-sm-8"   value=""/>
																</div>
						 									</div>
															

															<div class="space-2"></div>
                                                            <div class="wizard-actions center">

												<button class="btn btn-white btn-info btn-bold btn-next" data-last="Finish">
													<i class="ace-icon fa fa-floppy-o bigger-120 green"></i>
													<input  type="submit" value= 'submit' />
												</button>

												<button class="btn btn-white btn-default btn-bold">
													<i class="ace-icon fa fa-times red2"></i>
													Cancel
												</button>

											</div>
                

														</form>
                                                        <?php
            
            ?>
                                                       
                
                <hr />
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Asset List</h3>
                    <div class="table-responsive">
                                <table class="table">
						  <thead >
						    <tr style="">

						     <th >Asset Tag</th>
                             <th >Asset Name</th>
						      <th >FLOOR</th>
						      <th >ROOM</th>
                              
                              
						    </tr>
						  </thead>
						  <tbody>
                          <th>
                          <?php
                        
                            
                              ?>
                              </th>
						  </tbody>					
						</table>
                            </div>
                        </div>
                    </div>
                </div>
										
                
            <!-- /.container-fluid -->
            <footer class="footer text-center"> Tier Data </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

        </div>
    </div>

        
 
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
       
</body>

</html>
