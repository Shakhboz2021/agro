<?php


function filterTable($query)
                {
                    include('db_connect.php');
                    $filter_Result = mysqli_query($db, $query);
                    return $filter_Result;
                }

               
	if (! empty($_POST["vil_id"])){
	    	$query = "CALL `getFilial`(".$_POST["vil_id"].")"; 
                                $filial_result = filterTable($query); 


	    ?>
		<select name="filialc" id="filial-list" class="demoInputBox1">
			<option value disabled selected>Филиални номи</option>
		<?php
		    foreach ($filial_result as $state) {
		        ?>
		<option value="<?php echo $state["filial"]; ?>"><?php echo $state["filial"]; ?></option>
		</select>
	<?php
	    }
	}


?>