<?php 

include('server.php');

   $id_encode=base64_encode($_SESSION['inn']);

    if(isset($_GET['filename1'])) 
    {
        $filename1 = base64_decode($_GET['filename1']);
    
        $query = "SELECT filename1, size1, type1, file1 FROM xujjatlar WHERE filename1 = '$filename1'";
        $result = $db->query($query) or die('Error, filename1 failed');
        list($name, $size, $type, $content) = mysqli_fetch_array($result);

        header("Content-length: $size");
        header("Content-type: $type");
        header("Content-Disposition: attachment; filename=$name");
        echo $content; exit;
    }
//INN
    if(isset($_GET['filename2'])) 
    {
        $filename2 = base64_decode($_GET['filename2']);
        $query = "SELECT filename2, size2, type2, file2 FROM xujjatlar WHERE filename2 = '$filename2'";
        $result = $db->query($query) or die('Error, filename2 failed');
        list($name, $size, $type, $content) = mysqli_fetch_array($result);

        header("Content-length: $size");
        header("Content-type: $type");
        header("Content-Disposition: attachment; filename=$name");
        echo $content; exit;
    }



  ?>
  <!-- YUKLANGAN HUJJAT XOLATI -->
<!-- <?php
    if (isset($_GET['status_pass_yes'])){
        $yes = "Тасдиқланган";
        $status_pass = base64_decode($_GET['status_pass_yes']);
        $qayt=$_GET['status_pass_yes'];
        $query = "UPDATE `docs` SET `status`= '$yes' WHERE `user_id` = '$status_pass' ";
            $db->query($query) or die('Error, query failed Passport_Copy');
            header("location: view.php?inn=$qayt");
    }
    if (isset($_GET['status_pass_no'])){
        $yes = "Тасдиқланмаган";
        $status_pass = base64_decode($_GET['status_pass_no']);
        $qayt = $_GET['status_pass_no'];
        $query = "UPDATE `docs` SET `status`= '$yes' WHERE `user_id` = '$status_pass' ";
            $db->query($query) or die('Error, query failed Passport_Copy');
            header("location: view.php?inn=$qayt");    
    }
?>
 -->
  
  
  