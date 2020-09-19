<?php 
	//Importing Database
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//mendapatkan nilai dari variabel ID member yang ingin ditampilkan
	$id_user = $_POST['id_user'];


	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tb_transaction WHERE id_user = $id_user";

	$r = mysqli_query($con, $sql);
	
	$result = array();

	while($row = mysqli_fetch_array($r)){
			array_push($result, array(
				"id_transaction" => $row['id_transaction'],
				"date_order" => $row['id_user'],
				"id_user" => $row['id_user'],
				"total_order" => $row['total_order'],
				"status" => $row['status']
			));
		}
		

	echo json_encode($result);

	//Menampilkan dalam format JSON
	mysqli_close($con);
}
 ?>