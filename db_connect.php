<?php
ob_start();

 $db = new mysqli("localhost","root","");
 
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
     
	 $db->query("CREATE DATABASE IF NOT EXISTS restr");
	 
             mysqli_select_db($db,"restr"); 
            mysqli_set_charset($db,"utf8");
			 
					
?>