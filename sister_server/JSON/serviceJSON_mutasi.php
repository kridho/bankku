<?php
	include("../../config.php");
    <?php

	$no_rek = $_GET["no_rek"];
	//$con = mysqli_connect("sql112.epizy.com", "epiz_22340213", "hlCDykFN6fY", "epiz_22340213_client");
	if($no_rek != "kosong" || $no_rek != null){
		$sql = "SELECT * FROM transaksi WHERE no_rekening = '$no_rek'";
		$result = mysqli_query($db, $sql);
		$numResult = mysqli_num_rows($result);

		// $xml = new SimpleXMLElement("<data-client/>");
		// while ($row = mysqli_fetch_assoc($result)) {
		// 	$no_rek = $xml->addChild("no_rek", $row["no_rekening"]);	
		// 	$nama_pengirim = $xml->addChild("nama_pengirim", $row["nama_pengirim"]);
  //           $nama_penerima = $xml->addChild("nama_penerima", $row["nama_penerima"]);
		// 	$nominal = $xml->addChild("nominal", $row["nominal"]);
  //           $tanggal_transaksi = $xml->addChild("tanggal_transaksi", $row["tanggal_transaksi"]);
			
		//}

		// echo $xml->asXml();
		// mysqli_free_result($result);
		$json = mysqli_fetch_assoc($result);
		echo json_encode($json);
		mysqli_close($con);		
	} else {
		$sql = "SELECT * FROM transaksi";
		$result = mysqli_query($con, $sql);

		// $xml = new SimpleXMLElement("<data-client/>");
		// while ($row = mysqli_fetch_assoc($result)) {
		// 	$no_rek = $xml->addChild("no_rek", $row["no_rekening"]);	
		// 	$nama_pengirim = $xml->addChild("nama_pengirim", $row["nama_pengirim"]);
  //           $nama_penerima = $xml->addChild("nama_penerima", $row["nama_penerima"]);
		// 	$nominal = $xml->addChild("nominal", $row["nominal"]);
  //           $tanggal_transaksi = $xml->addChild("tanggal_transaksi", $row["tanggal_transaksi"]);
		// }

		// echo $xml->asXml();
		// mysqli_free_result($result);
		$json = mysqli_fetch_assoc($result);
		echo json_encode($json);
		mysqli_close($con);
	}
?>
