<div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebar-menu">
                        <li class="nav-devider"></li>
                        <li class="nav-label"><h3></h3></li>
                        <li><a class="has-arrow  " href="index.php" aria-expanded="false"><i style="font-size: 24px;" class="fa fa-area-chart"></i>&nbsp;<span class="hide-menu" style="font-size: 18px;">Асосий</span></a>
                        </li>

                        <!-- <li class="nav-label"></li> -->
                        <!-- <li> <a class="has-arrow  " href="blank.php" aria-expanded="false"><i style="font-size: 24px;" class="fa fa-columns"></i>&nbsp;<span class="hide-menu" style="font-size: 18px;">Bo'sh sahifa</span></a>
                        </li> -->
                        
                        <li> <a class="has-arrow  " href="region_t.php" aria-expanded="false"><i style="font-size: 24px;" class="fa fa-table"></i>&nbsp;<span class="hide-menu" style="font-size: 18px;">Хўжаликлар</span></a>
                        </li>
                        
                        <!-- <li> <a class="has-arrow  " href="form.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Form</span></a>
                        </li> -->


                        <li> <a class="has-arrow  " href="logout.php" aria-expanded="false"><i style="font-size: 24px;" class="fa fa-sign-out"></i>&nbsp;<span class="hide-menu" style="font-size: 18px;">Чиқиш</span></a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>



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