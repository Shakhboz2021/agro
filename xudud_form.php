<?php
//  XUDUD QO'SHISH FORM


    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
        if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];      
              $staff_filial=$_SESSION['filialc'];
            
         }
    
  
    
        function filterTable($query)
                {
                    include('db_connect.php');
                    $filter_Result = mysqli_query($db, $query);
                    return $filter_Result;
                } 
            


        if(isset($_POST['submit']))
        {

            $tuman_id=$_POST['tuman_id'];   //   bu FORM da POST VALUE Xudud table uchun
            $tuman_nomi=$_POST['tuman_nomi'];
            $xudud_nomi=$_POST['xudud_nomi'];

            



           
              $query = "CALL `insertXudud`('$xudud_nomi','$tuman_nomi','$tuman_id','$staff_login','$staff_filial')";
          
                $db->query($query) or die('Error, query failed Test');
                //header("location: table.php");
                echo '<script>window.close();</script>';

        
        }


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
                                <form action="xudud_form.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="tuman_id" value="<?php echo $_POST['tuman_id'];?>">
                                    <input type="hidden" name="tuman_nomi" value="<?php echo $_POST['tuman_nomi'];?>">
                                    <div class="form-body">
                                      <div class="card-header">
                                        <h3 class="m-b-0 text-white">Худуд қўшиш</h3>
                                      </div>
                                        <hr class="m-t-0 m-b-5">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12"><center><label class="control-label  "><h3>Жойлашган худуднинг номи</h3></label></center>
                                                        <input type="text" class="form-control" name="xudud_nomi" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                            <div class="col-md-3"></div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" name="submit" class="btn btn-success"><i class="ti-plus"> </i>Қўшиш</button>
                                                        <button type="button" class="btn btn-inverse"  onClick="cancel();"><i class="ti-back-left"> </i>Бекор қилиш</button>
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

