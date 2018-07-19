<?php
	include("../config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   		$pin = mysqli_real_escape_string($con, $_POST['pin']);
     	$password = mysqli_real_escape_string($con, $_POST['password']); 
    	$sql = "SELECT * FROM data WHERE pin = '$pin' and password = '$password'";
      	$result = mysqli_query($con, $sql);
      	$numResult = mysqli_num_rows($result);
      	if($numResult > 0){
			$row = mysqli_fetch_assoc($result);
		//	$Status = $xml->addChild("Status", "Sukses Login");
			// $_SESSION['nopin'] = $row['pin'];
	  //       $_SESSION['pass'] = $row['password']; 
	  //       $_SESSION['no_rek'] = $row['no_rekening']; 
	  //       $_SESSION['nama_pemilik'] = $row['nama'];
          $out = array(
            'status' => 200,
            'message' => "sukses",
            'data' => $row
          );
          echo json_encode($out);
	        //header("location: ../menu.php");
      	} else {
          $out = array(
            'status' => 400,
            'message' => "Gagal Login",
            'data' => null
          );
          echo json_encode($out);
      		//echo "<script>alert('Your login name or password is invalid'); window.location = '../index.php'</script>";
      	//	$Status = $xml->addChild("Status", "Gagal Login");
   //    		echo '<script language="javascript">';
			// echo 'alert("Your Login Name or Password is invalid")';
			// echo '</script>';
			// header("location: ../index.php");
      	}
   }
?>