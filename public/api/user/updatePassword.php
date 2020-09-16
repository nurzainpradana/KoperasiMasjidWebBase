<?php 

	require_once('../connection.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//mendapatkan nilai dari variabel
		

		$username = $_POST['username'];
		$password = $_POST['password'];

		//membuat query SQL
			$sql = "UPDATE tb_user SET password = '$password'
			WHERE username = '$username';";

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