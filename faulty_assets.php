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
      
       // $_SESSION['id'] = 7;
        
//You'll replace the value with the  actual session ID
        $sesh = 7;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "centum";
    
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT report.assetTag,report.description,report.date, asset.roomName
FROM report
INNER JOIN asset ON report.assetTag = asset.assetName
WHERE report.status=0
;");
          // $stmt->bindParam('id',$id);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $data = $stmt->fetchAll();

          // var_dump($data);

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
                        <h4 class="page-title">Faulty Assets</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
               
               <div class="row">
                   <div class="col-10 col-sm-12 col-md-10">
                       <table class="table bg-white p-3">
                           <thead>
                               <th>Asset Name</th>
                               <th>Floor</th>
                               <th>Description</th>
                               <th>Date</th>
                           </thead>
                           <tbody>
                               
                            <?php 

                                // var_dump($data);
                                for ($i=0; $i < sizeof($data) ; $i++) 
                                    { ?>
                                    <tr>
                                    <td><?php echo $data[$i]['assetTag'] ?></td>
                                    <td><?php echo $data[$i]['roomName'] ?></td>
                                    <td><?php echo $data[$i]['description'] ?></td>
                                    <td><?php echo $data[$i]['date'] ?></td>
                                    </tr>
                               <?php }

                             ?>

                           </tbody>
                       </table>
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
    

   <!--  <script type="text/javascript">
       
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
                        // console.table(response);

                        var holder ="<option value=''>"+"SELECT ROOM"+
                                            
                                        "</option>";
                            $('#s2').append(holder);

                        for (var i = 0; i < response.length; i++) 
                        {
                            var option =
                                        "<option value='"+response[i].roomName+"'>"
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

            function roomNameSelect(event) 
            {
                
                var rname = document.getElementById("s2");
                var name = rname.value;

                $("#tableData tr").remove();
                console.log(name);

               $.ajax(
                        {
                          type: "POST",
                          url: "ajax_table.php",
                          data: {
                                    name:name,
                                },
                          dataType: "json",
                          statusCode: {
                            404: function ()
                            {
                              alert('Method not found!');
                            }
                          },
                          success: function (msg) 
                          {
                            console.table(msg);
                        if (msg.length > 0)
                        {



                            for (var i = 0; i < msg.length; i++) 
                            {
                                var tr_str = "<tr>"+
                                            "<input type='hidden' name='a_name[]' id='asset_name' value="+msg[i].assetName+" >"+
                                            "<td id='a_name'>"+msg[i].assetName+"</td>"+
                                            "<td>"+
                                            "<select id='status' name='status[]' >"+
                                            "<option value='0'>"+"Faulty"+"</option>"+
                                            "<option value='1'>"+"Fine"+"</option>"+
                                            "</select>"+
                                            "</td>"+
                                            "<td>"+
                                                "<textarea id='desc' name='desc[]'>"+"</textarea>"+
                                            "</td>"+
                                            "</tr>";
                                            $("#tableData tbody").append(tr_str);
                            }

                              }
                            else
                            {
                                 var tr_str = "<tr>"+
                                            "<td>"+"NO DATA AVAILABLE"+"</td>"+
                                            "<td>"+
                                           "<td>"+"</td>"+
                                            "<td>"+
                                    
                                            "</td>"+
                                            "</tr>";
                                            $("#tableData tbody").append(tr_str);
                            }


                          },
                          error: function (msg) {
                            alert('Error!!!')
                          }
                        });

         // body...
            }     

            $('#submit').on('click',function(e){
                e.preventDefault();
                // console.log('prevented');

               
                var status = document.getElementsByName('status[]');
                var asset = document.getElementsByName('a_name[]');
                var desc = document.getElementsByName('desc[]'); 
                var u_id = document.getElementsByName('u_id');
                // var asset = document.getElementById('a_name').textContent;
             
                // console.table(asset);

                for (var i = 0; i < status.length; i++) 
                {
                    console.log(asset[i].value);
                        $.ajax(
                        {
                          type: "POST",
                          url: "ajax_report.php",
                          data: {
                                    asset:asset[i].value,
                                    status:status[i].value,
                                    desc:desc[i].value,
                                    u_id:u_id[0].value,
                                },
                          dataType: "text json",
                          statusCode: {
                            404: function ()
                            {
                              alert('Method not found!');
                            }
                          },
                          success: function (response) 
                          {
                            console.log(response.Response);
                          },
                          error: function (msg) {
                            console.table('error');
                          }
                        });
                }

            


            });
          
    </script> -->


</body>

</html>
