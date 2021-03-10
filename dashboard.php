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
 <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
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
   
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    
                   <!-- <li><a href="dashboard.php" class="waves-effect"> <?php echo "WELCOME: ".$_SESSION['users']; ?></a></li> -->
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
                        <a href="dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="Report.php" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>reports</a>
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
                <div class="row">
                   
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Select Floor</h3>
                            <ul class="list-inline two-part">
                                
                            
                                <form>
                                    <select class="box" name="myselect" id="flooroptions" onchange="myFunction(event)">
                                     <?php
                                        
                                        
                                        
                        $sql= "SELECT DISTINCT floorNumber FROM floor";
                        $result = mysqli_query($conn, $sql);
                        echo"<option value=".">"."CHOOSE FLOOR"."</option>";
                        while($row=mysqli_fetch_array($result)){
                            echo"<option value=".$row['floorNumber'].">".$row['floorNumber']."</option>";
                        }
                         ?>
                                     
                                </select>
                                
                                </form>
                                
                            </ul>
                        </div>
                    </div>    
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info" id="roomoptions">
                            <h3 class="box-title">Select Room</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li> 
                            
                                <form>
                              <select id="s2" name="roomName" class='box' onchange="myFunction2(event)">
                                  
                              </select>
                                     
                    
                                </form>
                                
                            </ul>
                        </div>
                    </div>   
                    <script>
                    //function reload(){

                       // var v1= document.getElementById('flooroptions').value;
                        //self.location= 'dashboard.php?cat=' + v1;
                    //}
                    
                    </script>   
                   
                   
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg- col-sm-12">
                        <div class="white-box" >
                         <h3 class="box-title">Asset Check List</h3>
                                    <h4><span id='display'></span></h4>
                          
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Asset Name</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <th>   
                                                          
                                        </th>
                                    <th>
                                        <select class="box">
                                            
                                            <option>Functional</option>
                                            <option>Faulty</option>
                                        
                                        </select>
                                        
                                        </th>
                                    <th> 
                                       
                                          <p>
          <textarea id = "myTextArea"
                  rows = "1"
                  cols = "30"></textarea>
        </p>
                                        
                                        
                                        </th>
                                        
                                        
                                        
                                    </tbody>
                                    
                                    
                                </table> 
                                <div class="center p-20">
                     <a href="submit" target="_blank" class="btn btn-danger btn-block waves-effect waves-light" style="width:20%; aligh:left">submit</a>
                                    </div>
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
    

    <script type="text/javascript">
       
           function myFunction(event)
           {
                
                var e = document.getElementById("flooroptions");
                var floor_id = e.value;

                $.ajax({

                    url:'ajax_floor.php',
                    type:'post',
                    data:{
                        floor_id:floor_id,
                    },
                    dataType:"json",
                    success:function(response){
                        $('#s2 option').remove();
                        console.table(response);

                        var holder ="<option value=''>"+"SELECT ROOM"+
                                            
                                        "</option>";
                            $('#s2').append(holder);

                        for (var i = 0; i < response.length; i++) 
                        {
                            var option =
                                        "<option value='"+response[i].floorNumber+"'>"
                                            +response[i].roomName+
                                        "</option>";
                            $('#s2').append(option);
                        }
                        // var options = "<option value='"++"'>"

                       // $.each (response, function (bb) {
                       //      console.log (bb);
                       //      console.log (response[bb]);
                       //      // console.log (a[bb].TEST1);
                       //  });
                        // json_decode(response);
                        // console.log(response);
                        // for (var i = 0; i < response.length; i++) 
                        // {
                        //     console.log(response[i].roomName);
                        // }
                    }
                   
                });

               
                // console.log(e.value);

            }      

            function myFunction2(event) 
            {
                
                var rname = document.getElementById("s2");
                var name = rname.value;

                $.ajax({

                        url:'ajax_table.php',
                        type:'post',
                        data:{
                            rname:name,
                        },
                        dataType:"json",
                        success:function(response)
                        {
                            console.table(response);
                        }

                })
         // body...
            }     

          
    </script>


</body>

</html>
