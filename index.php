<?php


    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
   if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];      
/////////////////////////////////////////////////////////////

                    //   Молиявий натижа
                    
                                
/////////////////////////////////////////////////////////////
                    
         }

                    $query_AllFermerwithResult="CALL `sumAllFermerwithResult`()";
                    $result_AllFermerwithResult = mysqli_query($db, $query_AllFermerwithResult);
                    $row_AllFermerwithResult = mysqli_fetch_row($result_AllFermerwithResult);

                    $sumFermerXojaliklar=$row_AllFermerwithResult[0];
                    $sumIxtisoslashuvlar=$row_AllFermerwithResult[1];
                    $sumMoliyaNatijalar=$row_AllFermerwithResult[2];
                    $sumUchastkalar=$row_AllFermerwithResult[3];


                    


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
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.png">
    <title>Реестр </title>
	
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
            <?php  include('header.php');?>
        <!-- End header header -->
        
        <!-- Left Sidebar  -->
            <?php  include('left-sidebar.php');?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Асосий</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Бош</a></li>
                        <li class="breadcrumb-item active">Асосий</li>
                    </ol>
                </div>
            </div> 
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-stats-up color-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Жами: <?php echo '<b>'.$sumMoliyaNatijalar.'</b>';?> (млн.сўм)</div>
                                    <div class="stat-digit text-success">Молиявий натижа</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Жами: <?php echo '<b>'.$sumFermerXojaliklar.'</b>';?> (та)</div>
                                    <div class="stat-digit text-primary">Фермер хўжаликлар</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-direction-alt color-pink border-pink"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Жами: <?php echo '<b>'.$sumIxtisoslashuvlar.'</b>';?> (га)</div>
                                    <div class="stat-digit text-dark">Ихтисослашувлар</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-map-alt color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Жами: <?php echo '<b>'.$sumUchastkalar.'</b>';?> (кв.м.)</div>
                                    <div class="stat-digit text-danger">Участка контурлари</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


               

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Йил кесимидаги кўп тармоқли фермер хўжалигининг ихтисослашуви</h4></center>
                            </div>
                            <div class="sales-chart">
                                <div id="rainfall" style="height: 740px"></div>
                            </div>
                        </div>
                    </div>
                        <!-- /# card -->
                 </div>
                 <div class="row">  
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Вилоятлар бўйича</h4>
                            </div>
                            <div class="team-chart">
                                <div id="np-Pie" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- /# row -->

               


                
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            
            <!-- End footer -->
        </div>

        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <!-- all script extension -->
    <div style="position: absolute;
  bottom: 2px;
  left: 25%;">
        © 2018 - 𝕆'ℤ𝔹𝔼𝕂𝕀𝕊𝕋𝕆ℕ 𝔽𝔼ℝ𝕄𝔼ℝ,𝔻𝔼𝕏ℚ𝕆ℕ 𝕏𝕆'𝕁𝔸𝕃𝕀𝕂𝕃𝔸ℝ𝕀 𝕍𝔸 𝕋𝕆𝕄𝕆ℝℚ𝔸 𝕐𝔼ℝ 𝔼𝔾𝔸𝕃𝔸ℝ𝕀 𝕂𝔼ℕ𝔾𝔸𝕊ℍ𝕀
    </div>

            <!-- End footer -->
</body>

</html>
<?php include('footer-js.php');?>


<script type="text/javascript">
        $(document).ready(function() {


    //--Nested Pie echarts init-->

    var dom = document.getElementById("np-Pie");
    var npChart = echarts.init(dom);

    var app = {};
    option = null;
    option = {
        color: ['#62549a','#4aa9e9', '#ff6c60','#eac459', '#25c3b2', '#6BB18C', '#EBCB94', '#EF9688', '#043D5D', '#B8959B', '#B7586B', '#B4579B', '#B6873B' ],
        tooltip : {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['Тошкент','Сирдарё','Жиззах','Самарқанд','Фарғона','Наманган','Андижон','Қашқадарё','Сурхондарё','Бухоро','Навоий','Хоразм','Қорақалпогистон Р.']
        },
        calculable : false,
        series : [
            {
                name:'Умумий',
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
                name:'Умумий',
                type:'pie',
                radius : [70, 100],

                // for funnel
                x: '60%',
                width: '35%',
                funnelAlign: 'left',
                max: 1048,

                data:[
                    {value:9, name:'Тошкент'},
                    {value:8, name:'Сирдарё'},
                    {value:4, name:'Жиззах'},
                    {value:6, name:'Самарқанд'},
                    {value:3, name:'Фарғона'},
                    {value:4, name:'Наманган'},
                    {value:12, name:'Андижон'},
                    {value:5, name:'Қашқадарё'},
                    {value:1, name:'Сурхондарё'},
                    {value:2, name:'Бухоро'},
                    {value:6, name:'Навоий'},
                    {value:3, name:'Хоразм'},
                    {value:4, name:'Қорақалпогистон Р.'}

                    
                ]
            }
        ]
    };



    if (option && typeof option === "object") {
        npChart.setOption(option, false);
    }

    //--Rainfall and Evaporation echarts init-->

    var dom = document.getElementById("rainfall");
    var rainChart = echarts.init(dom);

    var app = {};
    option = null;
    option = {
        color: ['#4aa9e9','#67f3e4','#B25674','#62549a','#4aa9e9', '#ff6c60','#eac459', '#25c3b2', '#6BB18C', '#EBCB94', '#EF9688'],
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['Пахта','Ғалла','Узум','Полиз','Чорва','Тут','Парранда','Балиқ','Асалари','Терак','Бошқалар']
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['Янв.','Фев.','Мар.','Апр.','Май','Июн.','Июл.','Авг.','Сен.','Окт.','Ноя.','Дек.']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'Пахта',
                type:'bar',
                data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
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
            },
            {
                name:'Ғалла',
                type:'bar',
                data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 182.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Узум',
                type:'bar',
                data:[7.6, 5.9, 2.0, 47.4, 28.7, 70.7, 195.6, 125.2, 48.7, 18.8, 4.0, 6.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Полиз',
                type:'bar',
                data:[1.6, 5.9, 2.0, 4.4, 28.7, 70.7, 19.6, 125.2, 4.7, 1.8, 4.0, 6.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Чорва',
                type:'bar',
                data:[17.6, 51.9, 2.0, 4.4, 2.7, 70.7, 1.6, 12.2, 4.7, 8.8, 4.0, 61.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Тут',
                type:'bar',
                data:[17.6, 51.9, 21.0, 4.4, 8.7, 7.7, 5.6, 5.2, 8.7, 18.8, 41.0, 62.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 252.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Парранда',
                type:'bar',
                data:[13.6, 17.9, 1.0, 4.4, 8.7, 21.7, 195.6, 45.2, 48.7, 38.8, 41.0, 16.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Балиқ',
                type:'bar',
                data:[23.6, 25.9, 12.0, 17.4, 2.7, 31.7, 19.6, 12.2, 4.7, 48.8, 41.0, 61.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Асалари',
                type:'bar',
                data:[47.6, 53.9, 22.0, 12.4, 38.7, 37.7, 35.6, 45.2, 4.7, 6.8, 42.0, 61.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Терак',
                type:'bar',
                data:[47.6, 25.9, 22.0, 37.4, 48.7, 60.7, 65.6, 15.2, 28.7, 38.8, 14.0, 26.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
                    ]
                }
            },
            {
                name:'Бошқалар',
                type:'bar',
                data:[13.6, 15.9, 21.0, 72.4, 43.7, 25.7, 35.6, 15.2, 27.7, 36.8, 41.0, 23.3],
                markPoint : {
                    data : [
                        {name : 'Max', value : 152.2, xAxis: 7, yAxis: 183, symbolSize:18},
                        {name : 'Min', value : 2.3, xAxis: 11, yAxis: 3}
                    ]
                },
                markLine : {
                    data : [
                        {type : 'average', name : 'Average'}
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


   