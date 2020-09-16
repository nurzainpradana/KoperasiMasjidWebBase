<?php

include '../connection.php'; 

$id_user = $_POST['id_user'];

//creating a query
$stmt = $con->prepare("SELECT tb_product.id_products, tb_product.name, tb_product.price, tb_product.description, tb_product.image  FROM `tb_favorite` INNER JOIN tb_product WHERE tb_favorite.id_products = tb_product.id_products && tb_favorite.id_user = '$id_user'");
	
//executing the query 
$stmt->execute();

//binding results to the query 
$stmt->bind_result($id_products, $name, $price,  $description, $image);

$result["product"] = array();

//traversing through all the result 
while($stmt->fetch()){
    $temp['id_products'] = $id_products; 
    $temp['name'] = $name; 
    $temp['price'] = $price; 
    $temp['description'] = $description; 
    $temp['image'] = $image; 
    array_push($result["product"], $temp);
}

//displaying the result in json format 
echo json_encode($result);
?>