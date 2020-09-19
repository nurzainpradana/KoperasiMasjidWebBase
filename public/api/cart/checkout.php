<?php
    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //mendapatkan nilai variabel
        $id_transaction = $_POST['id_transaction'];
		$id_user = $_POST['id_user'];
		$total = $_POST['total'];
		date_default_timezone_set("Asia/Jakarta");
		$date_order = date("Y-m-d");
		$status = "belum diproses";


		//membuat query SQL
		$sql = "INSERT INTO tb_transaction (id_transaction, date_order, id_user, total_order, status) values ($id_transaction, '$date_order', '$id_user', '$total', '$status');";

        //eksekusi query database
        $response = array();
		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil menambahkan Cart";
			
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menambahkan Cart";

		}
		echo json_encode($response);
		mysqli_close($con);
	}

?>