<?php
date_default_timezone_set("Asia/Tashkent");
    $date = date('Y-m-d H:i:s');

    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
   if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];      
              $staff_filial=$_SESSION['filialc'];
            
                $viloyat=$_POST['viloyat'];    //   bu FORM da get VALUE
                $tomonidanFilial=$_POST['tomonidanFilial'];
                $xudud=$_POST['xudud']; 
                          

                    
         }

                                // $query_viloyat = "CALL `getViloyatlar`()";  // getViloyatlar - procedure 1 
                                // $search_viloyat = filterTable($query_viloyat);



         function filterTable($query)
                {
                    include('db_connect.php');
                    $filter_Result = mysqli_query($db, $query);
                    return $filter_Result;
                }
        // Data qoshish
            if(isset($_POST['submit_first']))
            {
                    /*     USER EXIST TEKSHIRISH
                $user_check = $db->query("SELECT * FROM `docs` WHERE user_id= '$inn'");
            if($user_check->num_rows >= 1)
                {
                    $query_data_qoshish = "UPDATE `docs` SET date_kelgan='$date', 
                        WHERE user_id = '$inn'";
                } 
            else 
                {
                    $query_data_qoshish = "INSERT INTO `xujjatlar` () 
                        VALUES ()";
                }    
            $db->query($query_data_qoshish) or die('Error, query_data_qoshish failed Test');
                    */
            //$query_data_qoshish = "INSERT INTO `xujjatlar` ()  VALUES ()";
            //$db->query($query_data_qoshish) or die('Error, query_data_qoshish failed Test');

            }


        if(isset($_POST['submit']))
        {

            $viloyat=$_POST['viloyat'];   //   bu FORM da POST VALUE
            $tomonidanFilial=$_POST['tomonidanFilial'];
            $xudud=$_POST['xudud'];  



            //  POST lar
            $xojalik_nomi=$_POST['xojalik_nomi'];
            $inn=$_POST['inn'];
            $passport=$_POST['passport'];
            $xojalik_raxbar=$_POST['xojalik_raxbar'];
            $xojalik_joylashgan=$_POST['xojalik_joylashgan'];

            //
            $paxtachilik=$_POST['paxtachilik'];
            $gallachilik=$_POST['gallachilik'];
            $bogdorchilik=$_POST['bogdorchilik'];
            $sabzavotchilik=$_POST['sabzavotchilik'];
            $chorvachilik=$_POST['chorvachilik'];
            $tutchilik=$_POST['tutchilik'];
            $parrandachilik=$_POST['parrandachilik'];
            $baliqchilik=$_POST['baliqchilik'];
            $asalarichilik=$_POST['asalarichilik'];
            $terakchilik=$_POST['terakchilik'];
            $boshqalar_1=$_POST['boshqalar_1'];

            //
            $binolar=$_POST['binolar'];
            $issiqxonalar=$_POST['issiqxonalar'];
            $xol_meva=$_POST['xol_meva'];
            $avtomobillar=$_POST['avtomobillar'];
            $yengil_avto=$_POST['yengil_avto'];
            $traktorlar=$_POST['traktorlar'];
            $kombaynlar=$_POST['kombaynlar'];
            $xojalik_mahsulot=$_POST['xojalik_mahsulot'];
            $boshqalar_2=$_POST['boshqalar_2'];
            $yer_uchaska=$_POST['yer_uchaska'];
            $sugoriladigon=$_POST['sugoriladigon'];
            $lalmi=$_POST['lalmi'];
            $telefon=$_POST['telefon'];
            $veb_sahifa=$_POST['veb_sahifa'];
            $ijtimoiy_tarmoq=$_POST['ijtimoiy_tarmoq'];
            $pochta=$_POST['pochta'];
            $moliyaviy_natija=$_POST['moliyaviy_natija'];

            // end
            $fermer_token_auth=md5($inn);
            $sektor=$_POST['sektor'];

            
         
            $file1 = $_FILES['file1']['name'];
            $tmpName1  = $_FILES['file1']['tmp_name'];
            $fileSize1 = $_FILES['file1']['size'];
            $fileType1 = $_FILES['file1']['type'];
        
             if(!empty($tmpName1))
                {
            $fp1      = fopen($tmpName1, 'r');
            $content1 = fread($fp1, filesize($tmpName1));
            $content1 = addslashes($content1);
            fclose($fp1);
                }
            else
                {
                    $content1='';
                } 

             if(!get_magic_quotes_gpc())
        
            {
                $file1 = addslashes($file1);
            }
            ////////////////////////////////////////////////   FAYL 2

            $file2 = $_FILES['file2']['name'];
            $tmpName2  = $_FILES['file2']['tmp_name'];
            $fileSize2 = $_FILES['file2']['size'];
            $fileType2 = $_FILES['file2']['type'];
            if(!empty($tmpName2))
            {
                $fp2      = fopen($tmpName2, 'r');
            $content2 = fread($fp2, filesize($tmpName2));
            $content2 = addslashes($content2);
            fclose($fp2);
            }
            else
            {
               $content2=''; 
            }
            

            if(!get_magic_quotes_gpc())
            {
                $file2 = addslashes($file2);
            }

           
            // $file1_check = $db->query("SELECT * FROM `docs` WHERE user_id= '$inn'");
            // if($file1_check->num_rows >= 1){
            //     $query = "UPDATE `docs` SET date_kelgan='$date', name_pas='$file1', size_pas='$fileSize1',type_pas='$fileType1',pass_copy='$content1', status =''
            //         WHERE user_id = '$inn'";
            // } else {

            ///      viloyat va tomonidanFilial -> id da saqlansin
                $query = "INSERT INTO `xujjatlar` (xojalik_nomi,inn,passport,fermer_ism,paxtachilik,gallachilik,bogdorchilik,sabzavotchilik,chorvachilik,tutchilik,parrandachilik,baliqchilik,asalarichilik,terakchilik,boshqalar_11,binolar,issiqxonalar,hulmeva,yukavto,yengilavto,traktor,kombayn,xojalikmahsulot,boshqalar_9,yeruchast,sugoriladigon,lalmi,telefon,vebsahifa,ijtimoiytarmoq,elektronpochta,moliyaviynatija,viloyat,xudud,sektor,reg_date,fermer_token_auth,filename1, size1, type1, file1,filename2, size2, type2, file2,tomonidan,tomonidanFilial) 
                    VALUES ('$xojalik_nomi','$inn','$passport','$xojalik_raxbar','$paxtachilik','$gallachilik','$bogdorchilik','$sabzavotchilik','$chorvachilik','$tutchilik','$parrandachilik','$baliqchilik','$asalarichilik','$terakchilik','$boshqalar_1','$binolar','$issiqxonalar','$xol_meva','$avtomobillar','$yengil_avto','$traktorlar','$kombaynlar','$xojalik_mahsulot','$boshqalar_2','$yer_uchaska','$sugoriladigon','$lalmi','$telefon','$veb_sahifa','$ijtimoiy_tarmoq','$pochta','$moliyaviy_natija','$viloyat','$xudud','$sektor','$date','$fermer_token_auth','$file1', '$fileSize1', '$fileType1', '$content1','$file2', '$fileSize2', '$fileType2', '$content2','$staff_login','$tomonidanFilial')";
           // }    
                $db->query($query) or die('Error, query failed Test');
                //header("location: table.php");
                echo '<script>window.close();</script>';

        
        


        }


                /*
    select v.viloyat, COUNT(x.xojalik_nomi), SUM(x.paxtachilik),SUM(x.gallachilik),SUM(x.bogdorchilik),SUM(x.sabzavotchilik),SUM(x.chorvachilik),SUM(x.tutchilik),SUM(x.parrandachilik),SUM(x.baliqchilik),SUM(x.asalarichilik),SUM(x.terakchilik),SUM(x.boshqalar_11),SUM(x.binolar),SUM(x.issiqxonalar),SUM(x.hulmeva),SUM(x.yukavto),SUM(x.yengilavto),SUM(x.traktor),SUM(x.kombayn),SUM(x.xojalikmahsulot),SUM(x.boshqalar_9),SUM(x.sugoriladigon),SUM(x.lalmi),SUM(x.moliyaviynatija) FROM viloyatlar AS v INNER JOIN xujjatlar AS x ON v.viloyat=x.viloyat

                */


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content1="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content1="width=device-width, initial-scale=1">
    <meta name="description" content1="">
    <meta name="author" content1="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/icon.png">
    <title>Реестр </title>
    <!-- Custom CSS -->
    
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Main wrapper  -->
    <div>
        <div>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content1 -->
                <div class="row">
                    <div class="col-lg-12 responsive-md-100">
                      <div class="card card-outline-info">
                            <div >
                                <h4 class="box-title"></h4>
                            </div>
                            <div class="card-body">
                                <form action="form.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="viloyat" value="<?php echo $viloyat;?>">
                                    <input type="hidden" name="tomonidanFilial" value="<?php echo $tomonidanFilial;?>">
                                    <input type="hidden" name="xudud" value="<?php echo $xudud;?>">
                                    <div class="form-body">
                                      <div class="card-header">
                                        <h3 class="m-b-0 text-white"><center>Маълумотлар</center></h3>
                                      </div>
                                        <hr class="m-t-0 m-b-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12"><label class="control-label  "> Хўжалигининг номи</label>
                                                        <input type="text" class="form-control" name="xojalik_nomi" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger row">
                                                    <div class="col-md-6"><label class="control-label  ">Passport</label>
                                                        <input type="text" maxlength="9" class="form-control" name="passport" required="">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">INN</label>
                                                        <input type="number" minlength="111111111" maxlength="999999999" class="form-control" name="inn" required="">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-8"><label class="control-label">Хўжалигининг раҳбари(Ф.И.Ш.)</label>
                                                        <input type="text" class="form-control form-control-danger" name="xojalik_raxbar" required="">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  "><i class="ti-file"> </i>Fayl 1</label>
                                                        <input type="file" class="form-control" id="file1" name="file1" >
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"><label class="control-label  ">Сектор жойи</label>
                                                    <select class="form-control"  tabindex="1" name="sektor" required>
                                                            <option value="" selected disabled hidden>Секторни танланг</option>
                                                            <option value="1" >Туман ҳокими скетори</option>
                                                            <option value="2">Туман прокурор сектори</option>
                                                            <option value="3">Туман Ички ишлар бошқармаси сектори</option>
                                                            <option value="4">Туман солиқ бошқармаси сектори</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        
                                        <div class="card-header"><h4 class="m-b-0 text-white"><center>Кўп тармоқли фермер хўжалигининг ихтисослашуви</center></h4>
                                        </div>
                                        <hr class="m-t-0 m-b-40">
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Пахтачилик, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="paxtachilik">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Ғаллачилик, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="gallachilik">
                                                    </div>
                                                     <div class="col-md-4"><label class="control-label  ">Боғдор,узумчи(-лик) га</label>
                                                        <input type="number" step="0.01" class="form-control" name="bogdorchilik">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Сабзавотчи,полиз(-чилик) га</label>
                                                        <input type="number" step="0.01" class="form-control" name="sabzavotchilik">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Чорвачилик,минг бош</label>
                                                        <input type="number" step="0.01" class="form-control" name="chorvachilik">
                                                    </div>
                                                     <div class="col-md-4"><label class="control-label  ">Тутчилик, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="tutchilik">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Паррандачилик,минг бош</label>
                                                        <input type="number" step="0.01" class="form-control" name="parrandachilik">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Балиқчилик, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="baliqchilik">
                                                    </div>
                                                     <div class="col-md-4"><label class="control-label  ">Асаларичилик, қути</label>
                                                        <input type="number" step="0.01" class="form-control" name="asalarichilik">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Терак-чилик, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="terakchilik">
                                                    </div>
                                                    <div class="col-md-8"><label class="control-label  ">Бошқа-лар</label>
                                                        <input type="number" step="0.01" class="form-control" name="boshqalar_1">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <!--/row-->
                                        <div class="card-header"><h3 class="m-b-0 text-white"><center>Кўп тармоқли фермер хўжалигининг ўз асосий воситалари рўйҳати</center></h3>
                                        </div>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Бинолар, иншоот-лар, кв.м.</label><input type="number" step="0.01" class="form-control" name="binolar" required="">
                                                    </div>
                                                        
                                                    <div class="col-md-4"><label class="control-label  ">Иссиқ-хоналар, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="issiqxonalar">
                                                    </div>
                                                     <div class="col-md-4"><label class="control-label  ">Юк автомо-биллари, сони</label>
                                                        <input type="number" step="0.01" class="form-control" name="avtomobillar">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-8"><label class="control-label  ">Ҳўл-мева ва сабзавотлар сақлаш,  тонна</label>
                                                        <input type="number" step="0.01" class="form-control" name="xol_meva">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Енгил автомо-биллар, дона</label>
                                                        <input type="number" step="0.01" class="form-control" name="yengil_avto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-6"><label class="control-label  ">Трактор-лар, дона</label>
                                                        <input type="number" step="0.01" class="form-control" name="traktorlar">
                                                    </div>
                                                    <div class="col-md-6"><label class="control-label  ">Комбайн-лар, дона</label>
                                                        <input type="number" step="0.01" class="form-control" name="kombaynlar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-8"><label class="control-label  ">хўжалик маҳсулот-ларини қуритиш ускуналари қуввати, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="xojalik_mahsulot">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Бошқа-лар</label>
                                                        <input type="number" step="0.01" class="form-control" name="boshqalar_2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br><h3 class="box-title"><center></center></h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="control-label  ">Ер участкасининг контурлари</label>
                                                        <input type="number" step="0.01" class="form-control" name="yer_uchaska" required="">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Суғориладиган, га</label>
                                                        <input type="number" step="0.01" class="form-control" name="sugoriladigon" required="">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  ">Лалми,га</label>
                                                        <input type="number" step="0.01" class="form-control" name="lalmi" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-8"><label class="control-label  ">Молиявий натижа (фойда, зарар), млн.сўм</label>
                                                        <input type="number" step="0.01" class="form-control" name="moliyaviy_natija" required="">
                                                    </div>
                                                    <div class="col-md-4"><label class="control-label  "><i class="ti-file"> </i>Fayl 2 </label>
                                                        <input type="file" class="form-control" id="file2" name="file2" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header"><h3 class="m-b-0 text-white"><center>Алоқа воситалари</center></h3>
                                        </div>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-6"><label class="control-label  ">Телефон, факс</label>
                                                        <input type="text" class="form-control" name="telefon" required="">
                                                    </div>
                                                    <div class="col-md-6"><label class="control-label  ">Веб-саҳифа</label>
                                                        <input type="text" class="form-control" name="veb_sahifa">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-6"><label class="control-label  ">Ижтимоий тармоқлар</label>
                                                        <input type="text" class="form-control" name="ijtimoiy_tarmoq">
                                                    </div>
                                                    <div class="col-md-6"><label class="control-label  ">Электрон почта</label>
                                                        <input type="text" class="form-control" name="pochta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" name="submit" class="btn btn-success"><i class="ti-plus"> </i>Қўшиш</button>
                                                        <button type="button" class="btn btn-inverse" onClick="cancel();"><i class="ti-back-left"> </i>Бекор қилиш</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- End PAge Content1 -->
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