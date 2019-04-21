<?php 
    

    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
   if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];  

            $vil_id=$_GET['vil_id'];
                $query_viloyat_name="CALL `getViloyatById`('$vil_id')";
                $result_viloyat_name = mysqli_query($db, $query_viloyat_name);
                $row_viloyat_name = mysqli_fetch_array($result_viloyat_name);
                $viloyat_name=$row_viloyat_name[0];


                                $query = "CALL `getTumanSvod`('$vil_id')";  // getQaror - procedure 1 
                                $search_viloyat_svod = filterTable($query);

                    
         }

                                // $query_viloyat = "CALL `getViloyatlar`()";  // getViloyatlar - procedure 1 
                                // $search_viloyat = filterTable($query_viloyat);



         function filterTable($query)
                {
                    include('db_connect.php');
                    $filter_Result = mysqli_query($db, $query);
                    return $filter_Result;
                } 

                if(isset($_POST["submit"])){   //  buni fermerlani insert

    // $input_staff_id = $_POST['staff_id'];
    // $input_tashkilot_nomi = $_POST["tashkilot_nomi"];
    // $input_department = $_POST["department"];
    // $input_staff_lavozim = $_POST["lavozim"];
    // $input_staff_name = $_POST["staff_name"];
    // $input_login = $_POST["login"];
    // $input_parol = md5($_POST["parol"]);
    // $input_branch_id = $_POST["branch_id"];
    // $sql_update=$db->query("CALL  `insertXodim`('$input_tashkilot_nomi','$input_department','$input_staff_lavozim','$input_staff_name','$input_login','$input_parol','$input_branch_id','$input_staff_id')"); // procedure
    
 
}    



                if(isset($_POST['submit_doc']))    // buni viloyatlar insert
                {
                        // $hujjat_raqami = $_POST['hujjat_raqami'];
                        // $hujjat_nomi = $_POST['hujjat_nomi'];
                        // $hujjat_sanasi = $_POST['hujjat_sanasi'];
                        // $hujjat_turi = $_POST['hujjat_turi'];
                        // $hujjat_orgon = $_POST['hujjat_orgon'];

                        // $sql_hujjat=$db->query("CALL `insertQaror`('$hujjat_raqami','$hujjat_nomi','$hujjat_sanasi','$hujjat_turi','$hujjat_orgon')");   // insertQaror - > procedure 2 

                        // header('location:blank.php');


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
    <!-- Custom CSS -->
    
    <link href="css/style.css" rel="stylesheet">
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
                    <h3 class="text-primary">Туманлар рўйхати</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Бош</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:window.history.back();">Вилоятлар</a></li>
                        <li class="breadcrumb-item active">Туманлар</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" ><center><b><?php 
                            if($viloyat_name=='Қорақалпогистон Республикаси')
                                {
                                    echo $viloyat_name.' ';
                                }
                            else
                                {
                                    echo $viloyat_name.' вилояти ';
                                }?>бўйича фаолият кўрсатаётган кўп тармоқли фермер хўжаликлари</b></center></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button class="btn btn-success" onclick="exportTableToExcel('exportTableExcel')"><i class="ti-export"> </i>Excel (.xls)</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="exportTableExcel" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           
                                
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">№</th>
                                                <!-- <th rowspan="2" style="vertical-align:middle;">Xududlar</th> -->
                                                <th rowspan="2" style="vertical-align:middle;">Туманлар</th>
                                                <th rowspan="2" style="vertical-align:middle;">Кўп тармоқли<br>Фермер<br>хўжалигининг сони</th>
                                                <th colspan="11" class="text-center">Кўп тармоқли фермер хўжалигининг ихтисослашуви</th>
                                                <th colspan="9" class="text-center">Кўп тармоқли фермер хўжалигининг ўз асосий воситалари рўйҳати</th>
                                                <!-- <th rowspan="2" style="vertical-align:middle;">Ер участкаси-нинг<br> контурлари</th> -->
                                                <th colspan="2" >Ер майдонининг ҳолати</th>
                                                <!-- <th colspan="4" class="text-center">Алоқа воситалари</th> -->
                                                <th rowspan="2" style="vertical-align:middle;">Молиявий натижа<br>(фойда, зарар),<br> млн.сўм</th>
                                                <!-- <th rowspan="2" style="vertical-align:middle;"><br>Реестрдан чиқарилганлиги<br> тўғрисида маълумот<br> (Кенгаш қарори ва<br> санаси)</th> -->
                                                <!-- <th rowspan="2" style="vertical-align:middle;">Харакатлар</th> -->
                                            </tr>

                                            <TR>
                                  <TH style="vertical-align:middle;">Пахта<br>-чилик, га</TH>
                                  <TH style="vertical-align:middle;">Ғаллачи<br>-лик, га</TH>
                                   <TH style="vertical-align:middle;">Боғдор-чилик<br> ва узумчи<br>-лик, га</TH>
                                   <TH style="vertical-align:middle;">Сабзавотчи<br>-лик ва полиз<br>-чилик, га</TH>
                                    <TH style="vertical-align:middle;">Чорва-чилик<br>, минг бош</TH>
                                    <TH style="vertical-align:middle;">Тутчилик,<br> га</TH>
                                     <TH style="vertical-align:middle;">Парран<br>-дачилик,<br> минг бош</TH>
                                     <TH style="vertical-align:middle;">Балиқ<br>-чилик, га</TH>
                                      <TH style="vertical-align:middle;">Асаларичи<br>-лик, қути</TH>
                                      <TH style="vertical-align:middle;">Терак-чилик,<br>га</TH>
                                       <TH style="vertical-align:middle;">Бошқа<br>-лар</TH>

                                       <TH style="vertical-align:middle;">Бинолар, <br>иншоот-лар<br>, кв.м.</TH>
                                       <TH style="vertical-align:middle;">Иссиқ-<br>хоналар,<br> га</TH>
                                       <TH style="vertical-align:middle;">Ҳўл-мева ва саб<br>-завотлар сақлаш <br>учун мўлжаллан<br>-ган музлатгич-<br>лар,  тонна</TH>
                                       <TH style="vertical-align:middle;">Юк автомо<br>-биллари, сони</TH>
                                       <TH style="vertical-align:middle;">Енгил автомо<br>-биллар, дона</TH>
                                       <TH style="vertical-align:middle;">Трактор<br>-лар, дона</TH>
                                       <TH style="vertical-align:middle;">Комбайн<br>-лар, дона</TH>
                                       <TH style="vertical-align:middle;">Қишлоқ хўжалик<br> маҳсулот-ларини қу<br>-ритиш ускуналари <br>қуввати, га</TH>
                                       <TH style="vertical-align:middle;">Бошқа<br>-лар</TH>
                                       
                                       <th style="vertical-align:middle;">Суғорилади<br>-ган, га</th>
                                       <th style="vertical-align:middle;">Лалми, га</th>
                                       <!-- <th style="vertical-align:middle;">Телефон,<br> факс</th> -->
                                       <!-- <th style="vertical-align:middle;">Веб-саҳифа</th> -->
                                       <!-- <th style="vertical-align:middle;">Ижтимоий тармоқ<br>-лардаги ман-зиллари <br>(телеграм, фасебук,<br> ватсап, вайбер,<br> скайп ва ҳ.к.)</th> -->
                                       <!-- <th style="vertical-align:middle;">Электрон почта</th> -->
                                       
                                </TR>
                                


                                            
                                            
                                            

                                        </thead>
                                        
                                        <tbody>
                        <?php $t = 1;
                     while($row = mysqli_fetch_array($search_viloyat_svod))
                            {  ?>   
                                        <tr>
                                                <td><?php echo $t;?></td>
                                                <td><a href="street_t.php?vil_id=<?php echo $_GET['vil_id'];?>&tuman_id=<?php echo $row['id'];?>"><?php echo $row['filial'];?></a></td>
                                                <td><?php 
                                                if(empty($row[3]))
                                                    {
                                                       echo ''; 
                                                    }
                                                else
                                                    {
                                                       echo $row[3].' та';
                                                    }
                                                
                                                ?> </td>
                                                <td><?php echo $row[4];?></td>
                                                <td><?php echo $row[5];?></td>
                                                <td><?php echo $row[6];?></td>
                                                <td><?php echo $row[7];?></td>
                                                <td><?php echo $row[8];?></td>
                                                <td><?php echo $row[9];?></td>
                                                <td><?php echo $row[10];?></td>
                                                <td><?php echo $row[11];?></td>
                                                <td><?php echo $row[12];?></td>
                                                <td><?php echo $row[13];?></td>
                                                <td><?php echo $row[14];?></td>
                                                <td><?php echo $row[15];?></td>
                                                <td><?php echo $row[16];?></td>
                                                <td><?php echo $row[17];?></td>
                                                <td><?php echo $row[18];?></td>
                                                <td><?php echo $row[19];?></td>
                                                <td><?php echo $row[20];?></td>
                                                <td><?php echo $row[21];?></td>
                                                <td><?php echo $row[22];?></td>
                                                <td><?php echo $row[23];?></td>
                                                <td><?php echo $row[24];?></td>
                                                <td><?php echo $row[25];?></td>
                                                <td><?php echo $row[26];?></td>
                                        </tr>


                        <?php $t++; } ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            
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