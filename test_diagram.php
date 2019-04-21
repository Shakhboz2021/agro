<?php
include('db_connect.php');
$t = 1;
$index=0;
$test_num_org[]="";
   include('staff_server.php');

    if(empty($_SESSION['staff_login']))
    {
      header('Location:staff_login.php');
   }
   if(isset($_SESSION['staff_login'])) 
    {
        $staff_login=$_SESSION['staff_login'];

 $query = "SELECT *
            FROM `temp_table`
            INNER JOIN `op_xizmat` ON  `temp_table`.servis=`op_xizmat`.Op_xizmatcol
            INNER join `organization` ON `op_xizmat`.id_o=`organization`.id_o 
            AND `organization`.login_id='$staff_login'"; 
            $search_result = filterTable($query);   //    WARNING   , use for only its organization


                // $query2 = "SELECT *
                // FROM `op_xizmat`
                // INNER JOIN `organization`
                // ON  `op_xizmat`.id_o=`organization`.id_o AND `organization`.login_id='$staff_login'"; 


                $query2="SELECT * FROM `organization` WHERE login_id='$staff_login'";
                $search_result2 = filterTable($query2);

 

            // Jismoniy shaxs      LOGIN_ID   ni q6wiw kere script oxiriga
             //   JANUARY
             $query1 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-01-01' AND '2018-01-30')";
             $result1 = mysqli_query($db,  $query1);
             $Jan = mysqli_fetch_array($result1);

             //   FEBRUARY
             $query2 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-02-01' AND '2018-02-28')";
             $result2 = mysqli_query($db,  $query2);
             $Feb = mysqli_fetch_array($result2);

            //   MARCH
             $query3 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-03-01' AND '2018-03-31')";
             $result3 = mysqli_query($db,  $query3);
             $Mar = mysqli_fetch_array($result3);

             //   APRIL
             $query4 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-04-01' AND '2018-04-30')";
             $result4 = mysqli_query($db,  $query4);
             $Apr = mysqli_fetch_array($result4);

             //   MAY
             $query5 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-05-01' AND '2018-05-31')";
             $result5 = mysqli_query($db,  $query5);
             $May = mysqli_fetch_array($result5);

             //   JUN
             $query6 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-06-01' AND '2018-06-30')";
             $result6 = mysqli_query($db,  $query6);
             $Jun = mysqli_fetch_array($result6);

             //   JUL
             $query7 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-07-01' AND '2018-07-31')";
             $result7 = mysqli_query($db,  $query7);
             $Jul = mysqli_fetch_array($result7);

             //   AUG
             $query8 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-08-01' AND '2018-08-31')";
             $result8 = mysqli_query($db,  $query8);
             $Aug = mysqli_fetch_array($result8);

             //   SEP
             $query9 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-09-01' AND '2018-09-30')";
             $result9 = mysqli_query($db,  $query9);
             $Sep = mysqli_fetch_array($result9);

             //   OCT
             $query10 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-10-01' AND '2018-10-31')";
             $result10 = mysqli_query($db,  $query10);
             $Oct = mysqli_fetch_array($result10);

             //   NOV
             $query11 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-11-01' AND '2018-11-30')";
             $result11 = mysqli_query($db,  $query11);
             $Nov = mysqli_fetch_array($result11);

             //  DEC
             $query12 = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 1 AND (`date` BETWEEN '2018-12-01' AND '2018-12-31')";
             $result12 = mysqli_query($db,  $query12);
             $Dec = mysqli_fetch_array($result12);



    // Yuridik shaxs
    //   JANUARY
    $query1y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-01-01' AND '2018-01-30')";
    $result1y = mysqli_query($db,  $query1y);
    $Jany = mysqli_fetch_array($result1y);

    //   FEBRUARY
    $query2y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-02-01' AND '2018-02-28')";
    $result2y = mysqli_query($db,  $query2y);
    $Feby = mysqli_fetch_array($result2y);

    //   MARCH
    $query3y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-03-01' AND '2018-03-31')";
    $result3y = mysqli_query($db,  $query3y);
    $Mary = mysqli_fetch_array($result3y);

    //   APRIL
    $query4y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-04-01' AND '2018-04-30')";
    $result4y = mysqli_query($db,  $query4y);
    $Apry = mysqli_fetch_array($result4y);

    //   MAY
    $query5y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-05-01' AND '2018-05-31')";
    $result5y = mysqli_query($db,  $query5y);
    $Mayy = mysqli_fetch_array($result5y);

    //   JUN
    $query6y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-06-01' AND '2018-06-30')";
    $result6y = mysqli_query($db,  $query6y);
    $Juny = mysqli_fetch_array($result6y);

    //   JUL
    $query7y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-07-01' AND '2018-07-31')";
    $result7y = mysqli_query($db,  $query7y);
    $July = mysqli_fetch_array($result7y);

    //   AUG
    $query8y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-08-01' AND '2018-08-31')";
    $result8y = mysqli_query($db,  $query8y);
    $Augy = mysqli_fetch_array($result8y);

    //   SEP
    $query9y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-09-01' AND '2018-09-30')";
    $result9y = mysqli_query($db,  $query9y);
    $Sepy = mysqli_fetch_array($result9y);

    //   OCT
    $query10y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-10-01' AND '2018-10-31')";
    $result10y = mysqli_query($db,  $query10y);
    $Octy = mysqli_fetch_array($result10y);

    //   NOV
    $query11y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-11-01' AND '2018-11-30')";
    $result11y = mysqli_query($db,  $query11y);
    $Novy = mysqli_fetch_array($result11y);

    //  DEC
    $query12y = "SELECT COUNT(*)  FROM `lines` WHERE client_number = 2 AND (`date` BETWEEN '2018-12-01' AND '2018-12-31')";
    $result12y = mysqli_query($db,  $query12y);
    $Decy = mysqli_fetch_array($result12y);


        // ORGANIZATION

             //  $query_or1 = "SELECT COUNT(*) FROM `lines`, `op_xizmat` WHERE `lines`.`service_type`= `op_xizmat`.`Op_xizmatcol` AND `op_xizmat`.`id_o`=1";
             // $result_or1 = mysqli_query($db,  $query_or1);
             // $Or1 = mysqli_fetch_array($result_or1);

            

    }

    function filterTable($query)
                    {
                        include('db_connect.php');
                        $filter_Result = mysqli_query($db, $query);
                        return $filter_Result;
                    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> <!-- COMPANY_LOGO -->
    <title>Bosh sahifa</title>
    
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="header-fix fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include('header_class.php');?>
        <!-- End header header -->
        
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                 <?php include('header.php');?>
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Bosh sahifa</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Test</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <a href="staff_data.php">
                            <div class="card bg-primary p-20">
                                    <div class="media widget-ten">
                                            <div class="media-left meida media-middle">
                                                <span><i class="ti-bag f-s-40"></i></span>
                                            </div>
                                            <?php $count_murojat = mysqli_query($db, "SELECT COUNT(*)
            FROM `lines`
            INNER JOIN `op_xizmat` ON  `lines`.service_type=`op_xizmat`.Op_xizmatcol 
            INNER join `organization` ON `op_xizmat`.id_o=`organization`.id_o AND `organization`.login_id='$staff_login'"); 
                                                    $row = mysqli_fetch_array($count_murojat);
                                                    $count_murojat = $row[0];
                                            ?>
                                            <div class="media-body media-text-right">
                                                <h2 class="color-white text-white"><?php echo $count_murojat;?></h2>
                                                <p class="m-b-0 text-white"><h4><strong>Murojatlar</strong></h4></p>
                                            </div>
                                    </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="staff.php">
                            <div class="card bg-warning p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-user f-s-40"></i></span>
                                    </div>
                                    <?php $count_staff = mysqli_query($db, "SELECT COUNT(*) FROM `operator`"); 
                                            $row = mysqli_fetch_array($count_staff);
                                            $number_staff = $row[0];
                                    ?>
                                    <div class="media-body media-text-right">
                                        <h2 class="color-white text-white"><?php echo $number_staff; ?></h2>
                                        <p class="m-b-0 text-white"><h4><strong>Operatorlar</strong></h4></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="clients.php">
                            <div class="card bg-success p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-vector f-s-40"></i></span>
                                    </div>
                                    <?php $client_inside = mysqli_query($db, "SELECT COUNT(*) FROM `temp_table`"); 
                                            $row21 = mysqli_fetch_array($client_inside);
                                            $number_inside = $row21[0];
                                    ?>
                                    <div class="media-body media-text-right">
                                        <h2 class="color-white text-white"><?php echo $number_inside; ?></h2>
                                        <p class="m-b-0 text-white"><h4><strong>Kutayotganlar</strong></h4></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="organization.php">
                            <div class="card bg-danger p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-location-pin f-s-40"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                    <?php $client_org = mysqli_query($db, "SELECT COUNT(*) FROM `op_xizmat` WHERE login_id='$staff_login'"); 
                                            $row23 = mysqli_fetch_array($client_org);
                                            $number_org = $row23[0];
                                    ?>
                                        <h2 class="color-white text-white"><?php echo $number_org;?></h2>
                                        <p class="m-b-0 text-white"><h4><strong>Xizmatlar</strong></h4></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Yillik hisobotlar</h4></center>
                            </div>
                                                <!-- Jismoni Shaxs -->
                            <input type="hidden" id="Jan" name="Jan_id" value="<?php echo $Jan[0]; ?>">
                            <input type="hidden" id="Feb" name="Feb_id" value="<?php echo $Feb[0]; ?>">
                            <input type="hidden" id="Mar" name="Mar_id" value="<?php echo $Mar[0]; ?>">
                            <input type="hidden" id="Apr" name="Apr_id" value="<?php echo $Apr[0]; ?>">
                            <input type="hidden" id="May" name="May_id" value="<?php echo $May[0]; ?>">
                            <input type="hidden" id="Jun" name="Jun_id" value="<?php echo $Jun[0]; ?>">
                            <input type="hidden" id="Jul" name="Jul_id" value="<?php echo $Jul[0]; ?>">
                            <input type="hidden" id="Aug" name="Aug_id" value="<?php echo $Aug[0]; ?>">
                            <input type="hidden" id="Sep" name="Sep_id" value="<?php echo $Sep[0]; ?>">
                            <input type="hidden" id="Oct" name="Oct_id" value="<?php echo $Oct[0]; ?>">
                            <input type="hidden" id="Nov" name="Nov_id" value="<?php echo $Nov[0]; ?>">
                            <input type="hidden" id="Dec" name="Dec_id" value="<?php echo $Dec[0]; ?>">

                                                <!-- Yuridik Shaxs -->
                            <input type="hidden" id="Jany" name="Jan_idy" value="<?php echo $Jany[0]; ?>">
                            <input type="hidden" id="Feby" name="Feb_idy" value="<?php echo $Feby[0]; ?>">
                            <input type="hidden" id="Mary" name="Mar_idy" value="<?php echo $Mary[0]; ?>">
                            <input type="hidden" id="Apry" name="Apr_idy" value="<?php echo $Apry[0]; ?>">
                            <input type="hidden" id="Mayy" name="May_idy" value="<?php echo $Mayy[0]; ?>">
                            <input type="hidden" id="Juny" name="Jun_idy" value="<?php echo $Juny[0]; ?>">
                            <input type="hidden" id="July" name="Jul_idy" value="<?php echo $July[0]; ?>">
                            <input type="hidden" id="Augy" name="Aug_idy" value="<?php echo $Augy[0]; ?>">
                            <input type="hidden" id="Sepy" name="Sep_idy" value="<?php echo $Sepy[0]; ?>">
                            <input type="hidden" id="Octy" name="Oct_idy" value="<?php echo $Octy[0]; ?>">
                            <input type="hidden" id="Novy" name="Nov_idy" value="<?php echo $Novy[0]; ?>">
                            <input type="hidden" id="Decy" name="Dec_idy" value="<?php echo $Decy[0]; ?>">

                                                <!-- ORGANIZATION -->
                                                
            <?php while($row = mysqli_fetch_array($search_result2))
                    { 
                        $test_num_org[$t]=$row[1];
                        ?>
                        <input type="hidden" id="<?php echo $t;?>" name="Or1" value="<?php echo $row[1]; ?>">
                        <!-- <input type="hidden" id="<?php echo $t;?>" name="Or1" value="<?php echo $t; ?>"> -->
                    <?php
                   $t++;                  
                     }
                     $index=$t-1;
                     ?>
                            
                            <div class="sales-chart">
                                <div id="rainfall"  style="height: 370px"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Biriktirilgan organizatsiya va xizmat turlari</h4></center>
                            </div>
                            <div class="team-chart"><br>
                                <div id="np-Pie" style="height: 500px"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Qabuldagi jarayon </h4></center>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Navbar Raqami</th>
                                                <th>Xizmat turi</th>
                                                <th>Xolati</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php $t = 1;?>
            <?php while($row = mysqli_fetch_array($search_result))
                    { ?>


                                            <tr>
                                                
                                                <td><?php echo $t; ?></td>
                                                <td><span><?php echo $row['chipta_id']; ?></span></td>
                                                <td><span><?php echo $row['servis']; ?></span></td>
                                                <?php if($row['serves_finish'] >=1){ ?>
    
                                                <td><span class="badge badge-success">Muloqotda</span></td>
                                            <?php }
                                        else
                                            {?>
                                                <td><span class="badge badge-warning">Kutyapdi</span></td>
                                            <?php } ?>
                                                <!-- <td><span class="badge badge-warning">Pending</span></td>   wuni kutyabdi,gaplawyabdi,.. status bar -->
                                            </tr>


                          <?php $t++; } ?>   
                                            
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <!-- /# column -->
                </div>
                <!-- /# row -->

             


               

                
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer">  Barcha huquqlar himoyalangan.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
    <script src="js/lib/datamap/d3.min.js"></script>
    <script src="js/lib/datamap/topojson.js"></script>
    <script src="js/lib/datamap/datamaps.world.min.js"></script>
    <script src="js/lib/datamap/datamap-init.js"></script>

    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!-- Echart -->
    <script src="js/lib/echart/echarts.js"></script>
    

    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>

<script type="text/javascript">

$(document).ready(function() {
    //--Nested Pie echarts init-->
        // Organization
  //var Or2=document.getElementById("1").value;
   // var Or1=document.getElementById("2").value;
var size=100;
var shar = [size];  // size of array


for (var i = 0; i < size; i++) {
    if(!document.getElementById((i+1).toString()))
    {
            break;
    }

   shar[i]= document.getElementById((i+1).toString()).value;
   //shar[1]= document.getElementById((i+2).toString()).value;
}
     




var index= shar.length;

   

    var dom = document.getElementById("np-Pie");
    var npChart = echarts.init(dom);
    
    var app = {};
    option = null;
    option = {
        color: ['#62549a','#4aa9e9', '#ff6c60','#eac459', '#25c3b2', '#6BB18C', '#EBCB94', '#EF9688', '#043D5D', '#B8959B','#09FA14','#FA09C3' ],
        tooltip : {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient : 'vertical',
            x : 'left',

         data : [<?php  
                            for($i=0;$i<$index;$i++){
                               ?>
                            shar[<?php echo $i;?>],
                            <?php }
            ?>
         ]

           
            
             
             
        },
        calculable : false,
        series : [
            {
                name:'Manba',
                type:'pie',
                selectedMode: 'single',
                radius : [0, 50],

                // for funnel
                x: '20%',
                width: '40%',
                funnelAlign: 'right',
                max: 1548,

                itemStyle : {
                    normal : {
                        label : {
                            position : 'inner'
                        },
                        labelLine : {
                            show : false
                        }
                    }
                },
                data:[
                    {value:335, name:'1'},
                    {value:679, name:'2'},
                    {value:1548, name:'3', selected:true}
                ]
            },
            {
                name:'Xizmat turi',
                type:'pie',
                radius : [80, 100],

                // for funnel
                x: '60%',
                width: '35%',
                funnelAlign: 'left',
                max: 1048,

                data:[
                    <?php  
                            for($i=0;$i<$index;$i++){
                               ?>
                           { value:<?php 
$test=$test_num_org[$i];
                              $count_murojat = mysqli_query($db, "SELECT COUNT(*)
            FROM `lines`
            INNER JOIN `op_xizmat` ON  lines.service_type=op_xizmat.Op_xizmatcol 
            INNER join `organization` ON op_xizmat.id_o=organization.id_o AND organization.or_name='$test' AND lines.login_id='$staff_login'"); 
                                                    $row = mysqli_fetch_array($count_murojat);
                                                    $count_murojat = $row[0];
                                                echo $count_murojat;

                            ?>, name:shar[<?php echo $i;?>]}, 
                            <?php }
            ?>
                              
                ]
            }
        ]
    };

    if (option && typeof option === "object") {
        npChart.setOption(option, false);
    }

    //--Rainfall and Evaporation echarts init-->
    var Jan=document.getElementById("Jan").value;
    var Feb=document.getElementById("Feb").value;
    var Mar=document.getElementById("Mar").value;
    var Apr=document.getElementById("Apr").value;
    var May=document.getElementById("May").value;
    var Jun=document.getElementById("Jun").value;
    var Jul=document.getElementById("Jul").value;
    var Aug=document.getElementById("Aug").value;
    var Sep=document.getElementById("Sep").value;
    var Oct=document.getElementById("Oct").value;
    var Nov=document.getElementById("Nov").value;
    var Dec=document.getElementById("Dec").value;

        // Yuridik Shaxs
        var Jany=document.getElementById("Jany").value;
        var Feby=document.getElementById("Feby").value;
        var Mary=document.getElementById("Mary").value;
        var Apry=document.getElementById("Apry").value;
        var Mayy=document.getElementById("Mayy").value;
        var Juny=document.getElementById("Juny").value;
        var July=document.getElementById("July").value;
        var Augy=document.getElementById("Augy").value;
        var Sepy=document.getElementById("Sepy").value;
        var Octy=document.getElementById("Octy").value;
        var Novy=document.getElementById("Novy").value;
        var Decy=document.getElementById("Decy").value;

    var dom = document.getElementById("rainfall");
    var rainChart = echarts.init(dom);

    var app = {};
    option = null;
    option = {
        color: ['#4aa9e9'],
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['Qabullar']
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'Qabullar',
                type:'bar',
                data:[Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec],
                markPoint : {
                    data : [
                        {type : 'max', name: 'Max'},
                        {type : 'min', name: 'Min'}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name: 'Average'}
                    ]
                }
            }
        ]
    };

    if (option && typeof option === "object") {
        rainChart.setOption(option, false);
    }

    /**
     * Resize chart on window resize
     * @return {void}
     */
    window.onresize = function() {
        rainChart.resize();
        npChart.resize();
    };


});

</script>