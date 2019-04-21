<?php


    include('server.php');

    if(empty($_SESSION['staff_login']))
        {
          header('Location:login.php');
        }
   if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];      

                                

                    
         }

                                // $query_viloyat = "CALL `getViloyatlar`()";  // getViloyatlar - procedure 1 
                                // $search_viloyat = filterTable($query_viloyat);



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
                    <h3 class="text-primary">Blank</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Бош</a></li>
                        <li class="breadcrumb-item active">Blank</li>
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
                            <div class="card-body"> Text form. </div>
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
    
<!-- footer -->
            <div style="position: absolute;
  bottom: 2px;
  left: 25%;">
        © 2018 - 𝕆'ℤ𝔹𝔼𝕂𝕀𝕊𝕋𝕆ℕ 𝔽𝔼ℝ𝕄𝔼ℝ,𝔻𝔼𝕏ℚ𝕆ℕ 𝕏𝕆'𝕁𝔸𝕃𝕀𝕂𝕃𝔸ℝ𝕀 𝕍𝔸 𝕋𝕆𝕄𝕆ℝℚ𝔸 𝕐𝔼ℝ 𝔼𝔾𝔸𝕃𝔸ℝ𝕀 𝕂𝔼ℕ𝔾𝔸𝕊ℍ𝕀
    </div>

            <!-- End footer -->
</body>

</html>
<?php include('footer-js.php');?>