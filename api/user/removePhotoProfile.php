<?php 
   require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	//get file name posted from android app
	$filename = $_POST['filename'];

//	$file = fopen('../../image/user/'.$filename, 'wb');

	if(file_exists("../../image/user/".$filename)){
		unlink("../../image/user/".$filename);
		$response["value"] = 1;
		$response["message"] = "Photo Berhasil Dihapus";
	} else {
		$response["value"] = 2;
		$response["message"] = "Photo Tidak Ditemukan";
	}
	
	//fclose($file);

		
	echo json_encode($response);
	mysqli_close($con);

}
 ?>