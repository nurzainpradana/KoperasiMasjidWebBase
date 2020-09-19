<?php 
	require_once('../connection.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_user = $_POST['id_user'];
		$name = $_POST['name'];	
		$no_phone = $_POST['no_phone'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$date_of_birth = $_POST['date_of_birth'];
		$date = date('Y-m-d', strtotime($date_of_birth));
		$photo_profile = $_POST['photo_profile'];
		//$id_user = rand(111111,999999);

		//membuat query SQL
		$sql = "INSERT INTO tb_user (id_user, name, no_phone, username, password, email, address, date_of_birth, photo_profile) values ('$id_user','$name','$no_phone','$username','$password','$email','$address','$date','$photo_profile')";


		//eksekusi query database
		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil menambahkan user";
			
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menambahkan user";

		}
		echo json_encode($response);
		mysqli_close($con);
	}
?>