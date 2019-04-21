
<?php

include('db_connect.php');


    if(empty($_SESSION['staff_login']))
        {
          //header('Location:login.php');
        	
        }

	if(isset($_SESSION['staff_login'])) 
         {
              $staff_login=$_SESSION['staff_login'];      
              $staff_id = $_SESSION['staff_id'];
                                

                    
         }
         
	
	$sql = "CALL `getXodim`('$staff_login')";   // get Xodim procedure 3
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	$tashkilot_nomi_row = $row['tashkilot_name'];
	$department_row = $row['department'];
	$staff_lavozim_row = $row['lavozim'];
	$staff_name_row = $row['surname'];
	$parol_row = $row['parol'];
	$branch_id_row = $row['branch_id'];



	// $input_tashkilot_nomi = $input_department = $input_staff_lavozim = $input_staff_name = $input_branch_id = $input_login =$input_parol = "";
	// Processing form data when form is submitted



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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Foydalanuvchi ma'lumotlari</h4>
                                <form class="form-horizontal p-t-20" action="#" method="post">
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $tashkilot_nomi_row;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $department_row;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $staff_lavozim_row;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $staff_name_row;?>">
                                            </div>
                                        </div>
                                    </div>

	
	
									<div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $parol_row;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Test 1</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="text" class="form-control form-type" id="exampleInputuname3" value="<?php echo $branch_id_row;?>">
                                            </div>
                                        </div>
                                    </div>

	
                                    
                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Saqlash</button>
                                        </div>
                                    </div>
                                </form>
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

    


