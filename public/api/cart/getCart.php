<?php 
	//Importing Database
	require_once('../connection.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//mendapatkan nilai dari variabel ID member yang ingin ditampilkan
	$id_user = $_POST['id_user'];


	//Membuat SQL query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT c.id_cart, c.id_user, c.id_products, p.name, p.price, p.status, p.description, p.image, c.quantity, c.quantity * p.price as subtotal FROM `tb_cart` as c LEFT JOIN tb_product as p ON c.id_products = p.id_products WHERE id_user = $id_user";
	//$sql = "SELECT * FROM tb_cart LEFT JOIN tb_product ON tb_product.id_products = tb_cart.id_products WHERE id_user = $id_user";
	$sql2 = "SELECT sum(c.quantity*p.price) as total FROM tb_cart as c LEFT JOIN tb_product as p ON c.id_products = p.id_products WHERE id_user = $id_user";

	$r = mysqli_query($con, $sql);
	
	$result = array();
	//$row = mysqli_fetch_array($r);

	while($row = mysqli_fetch_array($r)){
			array_push($result, array(
				"id_cart" => $row['id_cart'],
				"id_user" => $row['id_user'],
				"id_products" => $row['id_products'],
				"name" => $row['name'],
				"price" => $row['price'],
				"status" => $row['status'],
				"image" => $row['image'],
				"quantity" => $row['quantity'],
				"subtotal" => $row['subtotal']
			));
		}
		
		$r2 = mysqli_query($con, $sql2);
		$result2 = array();
		$row2 = mysqli_fetch_array($r2);

		array_push($result2, array(
			"total" => $row2['total']
		));


	echo json_encode(array('result' => $result, 'total' => $row2['total']));

	//Menampilkan dalam format JSON
	mysqli_close($con);
}
 ?>