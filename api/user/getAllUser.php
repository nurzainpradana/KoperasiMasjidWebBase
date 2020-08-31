<?php 

//mendapatkan nilai dari variabel ID Anggota yang ingin ditampilkan
	//$id = $_GET['id'];

	//Importing Database
	require_once('../connection.php');

	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tb_user";

	//Mendapatkan Hasil Query
	$r = mysqli_query($con, $sql);

	//Memasukkan hasil ke dalam Array
	$result = array();

	while($row = mysqli_fetch_array($r)){
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
	}

	//Menampilkan dalam format JSON
	echo json_encode(array('result' => $result));

	mysqli_close($con);
 ?>