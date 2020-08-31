<?php 

	require_once('../connection.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//mendapatkan nilai dari variabel
		

		$id_user = $_POST['id_user'];
		$name = $_POST['name'];
		$no_phone = $_POST['no_phone'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$date_of_birth = $_POST['date_of_birth'];
		$date = date('Y-m-d', strtotime($date_of_birth));

		$photo_profile = $_POST['photo_profile'];

		//membuat query SQL
			$sql = "UPDATE tb_user SET name = '$name', no_phone = '$no_phone', username = '$username',
			email = '$email', address = '$address', date_of_birth = '$date', photo_profile = '$photo_profile'
			WHERE id_user = '$id_user';";

		//meng-update database
		$response = array();
		if (mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil diperbaharui";
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal merubah!";
		}
		echo json_encode($response);
		mysqli_close($con);

	}
 ?>