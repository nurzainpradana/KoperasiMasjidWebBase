<?php

include '../connection.php'; 

//creating a query
$stmt = $con->prepare("SELECT id_products, name, description, price, image FROM tb_product WHERE id_category = '2';");
	
//executing the query 
$stmt->execute();

//binding results to the query 
$stmt->bind_result($id_products, $name, $description, $price, $image);

$result["product"] = array();

//traversing through all the result 
while($stmt->fetch()){
    $temp['id_products'] = $id_products; 
    $temp['name'] = $name; 
    $temp['description'] = $description; 
    $temp['price'] = $price; 
    $temp['image'] = $image; 
    array_push($result["product"], $temp);
}

//displaying the result in json format 
echo json_encode($result);
?>