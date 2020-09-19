<?php
    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //mendapatkan nilai variabel
        $id_transaction = $_POST['id_transaction'];
		$id_product = $_POST['id_product'];
		$harga_satuan = $_POST['harga_satuan'];
		$quantity = $_POST['quantity'];
		$subtotal = $_POST['subtotal'];


		//membuat query SQL
		$sql = "INSERT INTO tb_detail_transaction (id_transaction, id_product, harga_satuan, quantity, subtotal) values ($id_transaction, $id_product, $harga_satuan, $quantity, $subtotal);";

        //eksekusi query database
        $response = array();
		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil menambahkan Transaksi Detail";
			
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menambahkan Transaksi Detail";

		}
		echo json_encode($response);
		mysqli_close($con);
	}

?>