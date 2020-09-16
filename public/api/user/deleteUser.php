<?php 
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$response = array();

		//mendapatkan data
		$id = $_POST['id'];
		$sql = "DELETE FROM tb_user WHERE id_user = '$id'";

		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil dihapus";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menghapus!";
			echo json_encode($response);
		}
		mysqli_close($con);
	}
 ?>