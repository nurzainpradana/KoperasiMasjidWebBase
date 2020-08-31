<?php 
	//Importing Database
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//mendapatkan nilai dari variabel ID member yang ingin ditampilkan
	$username = $_POST['username'];

	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tb_user WHERE username = '$username';";

	
	$r = mysqli_query($con, $sql);
	
		$result = array();
		$row = mysqli_fetch_array($r);

		array_push($result, array(
			"id_user" => $row['id_user'],
			"name" => $row['name'],
			"no_phone" => $row['no_phone'],
			"username" => $row['username'],
			"password" => $row['password'],
			"email" => $row['email'],
			"address" => $row['address'],
			"date_of_birth" => $row['date_of_birth'],
			"photo_profile" => $row['photo_profile']
		));
		echo json_encode($result);

	//Menampilkan dalam format JSON
	
	mysqli_close($con);
}
 ?>