<?php 
	//Importing Database
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//mendapatkan nilai dari variabel ID member yang ingin ditampilkan
	$id_transaction = $_POST['id_transaction'];


	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM tb_detail_transaction LEFT JOIN tb_product ON tb_detail_transaction.id_product = tb_product.id_products WHERE id_transaction = $id_transaction";

	$r = mysqli_query($con, $sql);
	
	$result = array();

	while($row = mysqli_fetch_array($r)){
			array_push($result, array(
				"id_transaction" => $row['id_transaction'],
				"id_product" => $row['id_product'],
				"image" => $row['image'],
				"name" => $row['name'],
				"harga_satuan" => $row['harga_satuan'],
				"quantity" => $row['quantity'],
				"subtotal" => $row['subtotal']
			));
		}
		

	echo json_encode($result);

	//Menampilkan dalam format JSON
	mysqli_close($con);
}
 ?>