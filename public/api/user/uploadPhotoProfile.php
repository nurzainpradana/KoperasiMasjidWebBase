<?php 
    require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	//get image string posted from android app
	$base = $_POST['image'];

	//get file name posted from android app
	$filename = $_POST['filename'];

	//Decode Image
	$binary = base64_decode($base);

	header('Content-Type: bitmap; charset=utf-8');

	//images will be saved under folder img
	$file = fopen('../../image/user/'.$filename, 'wb');

	//create file
	fwrite($file, $binary);
	fclose($file);

	$response["value"] = 1;
	$response["message"] = "Berhasil menambahkan user";
	echo json_encode($response);
	}
	mysqli_close($con);
 ?>