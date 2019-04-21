<?php 
    

    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
   if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];  
              
              $fermer_id=$_GET['fermer_id']; // xudud
              $tuman_get=$_GET['tuman_get'];
              $viloyat_get=$_GET['viloyat_get'];

                  $query_xudud_name="CALL `getXududById`('$fermer_id')";
                    $result_xudud_name = mysqli_query($db, $query_xudud_name);
                    $row_xudud_name = mysqli_fetch_array($result_xudud_name);
                    $xudud_name=$row_xudud_name[0];


                                $query = "CALL `getQaror`('$fermer_id','$viloyat_get','$tuman_get')";  // getQaror - procedure 
                                $search_result = filterTable($query);

                    
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
                    <h3 class="text-primary">Фермер хўжаликлар рўйхати</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Бош</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:window.history.go(-3);">Вилоятлар</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:window.history.go(-2);">Туманлар</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:window.history.back();">Худудлар</a></li>
                        <li class="breadcrumb-item active">Фермер хўжаликлар</li>
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
                                <h4 class="card-title"><center><b><?php echo $xudud_name;?> худуди бўйича фаолият кўрсатаётган кўп тармоқли фермер хўжаликлари</b></center></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                      <button class="btn btn-success" onclick="exportTableToExcel('exportTableExcel')">.xls DATA</button>
                                        <div class="pull-right">
                                          <form target="_blank" action="form.php" method="post">
                                            <input type="hidden" name="viloyat" value="<?php echo $_GET['viloyat_get'];?>">
                                            <input type="hidden" name="tomonidanFilial" value="<?php echo $_GET['tuman_get'];?>">
                                            <input type="hidden" name="xudud" value="<?php echo $_GET['fermer_id'];?>">
                                            <button class="btn btn-success" name="submit_first"><span class="fa fa-plus">&nbsp;</span>Қўшиш</button>
                                            </form>
                                          
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="exportTableExcel" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           
                                
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">№</th>
                                                <!-- <th rowspan="2" style="vertical-align:middle;">Xududlar</th> -->
                                                <th rowspan="2" style="vertical-align:middle;">Кўп тармоқли<br>Фермер<br>хўжалигининг номи</th>
                                                <th rowspan="2" style="vertical-align:middle;">Солиқ тўловчининг<br>идентификацион<br>рақами (ИНН)</th>
                                                <th rowspan="2" style="vertical-align:middle;">Кўп тармоқли<br>фермер хўжалигининг<br>раҳбари                   (Ф.И.Ш.)</th>
                                                <th rowspan="2" style="vertical-align:middle;">Кўп тармоқли Ф/Хнинг <br>давлат рўйҳатидан ўтганлиги<br>  тўғрисидаги хужжат (туман<br>ҳокимининг қарори рақами<br> ва санаси) ихтисослашуви</th>
                                                <!-- <th rowspan="2" style="vertical-align:middle;">Кўп тармоқли<br>фермер хўжалигининг<br>жойлашган жойи</th> -->
                                                <th colspan="11" class="text-center">Кўп тармоқли фермер хўжалигининг ихтисослашуви</th>
                                                <th colspan="9" class="text-center">Кўп тармоқли фермер хўжалигининг ўз асосий воситалари рўйҳати</th>
                                                <th rowspan="2" style="vertical-align:middle;">Ер участкаси-нинг<br> контурлари</th>
                                                <th colspan="2" >Ер майдонининг ҳолати</th>
                                                <th colspan="4" class="text-center">Алоқа воситалари</th>
                                                <th rowspan="2" style="vertical-align:middle;">Молиявий натижа<br>(фойда, зарар),<br> млн.сўм</th>
                                                <th rowspan="2" style="vertical-align:middle;"><br>Реестрдан чиқарилганлиги<br> тўғрисида маълумот<br> (Кенгаш қарори ва<br> санаси)</th>
                                                <th rowspan="2" style="vertical-align:middle;">Харакатлар</th>
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
                                       <th style="vertical-align:middle;">Телефон,<br> факс</th>
                                       <th style="vertical-align:middle;">Веб-саҳифа</th>
                                       <th style="vertical-align:middle;">Ижтимоий тармоқ<br>-лардаги ман-зиллари <br>(телеграм, фасебук,<br> ватсап, вайбер,<br> скайп ва ҳ.к.)</th>
                                       <th style="vertical-align:middle;">Электрон почта</th>
                                       
                                </TR>
                                


                                            
                                            
                                            

                                        </thead>
                                        
                                        <tbody>
                        <?php $t = 1;
                     while($row = mysqli_fetch_array($search_result))
                            {  
                               
                    ?>
                                            <tr>
                                                <td><?php echo $t; ?></td>
                                                
                                                <td><?php echo $row['xojalik_nomi']; ?></td>
                                                <td><?php echo $row['inn']; ?></td>
                                                <td><?php echo $row['fermer_ism']; ?></td>
                                                <td><?php if(!empty($row['file1']))
                                                {  ?>
                                                    
                    
                      <a href="filedownload.php?filename1=<?php echo base64_encode($row['filename1']);?>" title="Yuklab olish"><span class="fa fa-file-pdf-o ks-icon" style="font-size: 20px;"></span>&nbsp;Yuklab olish 
                      </a> 

                    
                  
                                             <?php   } 
                                                else
                                                {
                                                    echo "<b style='color:red;'>Yuklanmagan</b>";
                                                }
                                                 ?></td>
                                                
                                                <!-- <td><?php echo $xudud_name.'-да'; ?></td> -->
                                                <td><?php echo $row['paxtachilik']; ?></td>
                                                <td><?php echo $row['gallachilik']; ?></td>
                                                <td><?php echo $row['bogdorchilik']; ?></td>
                                                <td><?php echo $row['sabzavotchilik']; ?></td>
                                                <td><?php echo $row['chorvachilik']; ?></td>
                                                <td><?php echo $row['tutchilik']; ?></td>
                                                <td><?php echo $row['parrandachilik']; ?></td>
                                                <td><?php echo $row['baliqchilik']; ?></td>
                                                <td><?php echo $row['asalarichilik']; ?></td>
                                                <td><?php echo $row['terakchilik']; ?></td>
                                                <td><?php echo $row['boshqalar_11']; ?></td>
                                                <td><?php echo $row['binolar']; ?></td>
                                                <td><?php echo $row['issiqxonalar']; ?></td>
                                                <td><?php echo $row['hulmeva']; ?></td>
                                                <td><?php echo $row['yukavto']; ?></td>
                                                <td><?php echo $row['yengilavto']; ?></td>
                                                <td><?php echo $row['traktor']; ?></td>
                                                <td><?php echo $row['kombayn']; ?></td>
                                                <td><?php echo $row['xojalikmahsulot']; ?></td>
                                                <td><?php echo $row['boshqalar_9']; ?></td>
                                                <td><?php echo $row['yeruchast']; ?></td>
                                                <td><?php echo $row['sugoriladigon']; ?></td>
                                                <td><?php echo $row['lalmi']; ?></td>
                                                <td><?php echo $row['telefon']; ?></td>
                                                <td><?php echo $row['vebsahifa']; ?></td>
                                                <td><?php echo $row['ijtimoiytarmoq']; ?></td>
                                                <td><?php echo $row['elektronpochta']; ?></td>
                                                <td><?php echo $row['moliyaviynatija']; ?></td>
                                                <td><?php
                                                 if(!empty($row['file2']))
                                                {  ?>
                                                    
                    
                      <a href="filedownload.php?filename2=<?php echo base64_encode($row['filename2']);?>" title="Yuklab olish"><span class="fa fa-file-pdf-o ks-icon" style="font-size: 20px;"></span>&nbsp;Yuklab olish 
                      </a> 
                                    <?php      } 
                                                else
                                                {
                                                    echo "<b style='color:red;'>Yuklanmagan</b>";
                                                }
                                                 ?></td>

                                                <td>
                                                    <a href="qaror_read.php"><i class="font-icon fa fa-eye" title="Ko'rish"> </i> </a>&nbsp;&nbsp;
                                                    <a href="qaror_read.php" title=""><i class="font-icon fa fa-pencil" title="O'zgartirish"></i> </a> &nbsp; &nbsp;
                                                    <a href="qaror_read.php" title="adf"> <i class="font-icon fa fa-trash " title="O'chirish"></i> </a>

                                                </td>
                                                
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