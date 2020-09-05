<?php 
	//Importing Database
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//mendapatkan nilai dari variabel ID member yang ingin ditampilkan
    $id_user = $_POST['id_user'];
    $id_products = $_POST['id_products'];

	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tb_cart WHERE id_user = '$id_user' && id_products = '$id_products'";

	$r = mysqli_query($con, $sql);
	
		$response = array();
        $row = mysqli_num_rows($r);

        //printf("Result set has %d rows.\n", $row);

        if($row == 0){
            $response["value"] = 0;
			$response["message"] = "Belum Terdaftar";
        } else if($row > 0) {
            $response["value"] = 1;
			$response["message"] = "Sudah Terdaftar";
        }
		echo json_encode($response);

	//Menampilkan dalam format JSON
	
	mysqli_close($con);
}
 ?>