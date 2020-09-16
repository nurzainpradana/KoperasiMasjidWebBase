<?php
    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_products = $_POST['id_products'];	
		$id_user = $_POST['id_user'];
        $quantity = $_POST['quantity'];
		$id_cart = rand(111111,999999);

		//membuat query SQL
		$sql = "INSERT INTO tb_cart (id_cart, id_products, id_user, quantity) values ('$id_cart', '$id_products', '$id_user', '$quantity');";

        //eksekusi query database
        $response = array();
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