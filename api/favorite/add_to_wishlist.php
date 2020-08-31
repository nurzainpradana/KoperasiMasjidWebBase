<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('connection.php');

$securecode = htmlentities($_POST['securecode']);
$id_products = htmlentities($_POST['id_products']);
$id_member = htmlentities($_POST['id_member']);

$securecode = "1234567890"; //stripslashes($securecode);
$id_products = "1";// stripslashes($id_products); 
$id_member = "12";// stripslashes($id_member); //"12";


if(isset($securecode) && !empty ($securecode) && isset($id_products) && !empty($id_products) 
    && isset($id_member) && !empty($id_member)) {

        global $conn;

        if($conn -> connect_error) {
            die("Connection has failed ". $conn -> connect_error);
        }

        //get Cureent date
        $status = 0; 
        $msg = "Gagal menambah ke Favorite";
        $information = "Failed to add Favorite";
        $detailsarray = array();

        //add id_product into wishlit table
        $stmt2 = $conn->prepare("INSERT INTO wishlist (id_member, id_products) VALUES (?,?)");
        $stmt2->bind_param(ii, $id_member,  $id_products);
        $stmt2->execute();
        $stmt2->store_result();

        if(!empty($stmt2->insert_id)) {
            $status = 1; 
            $msg = "Berhasil menambahkan ke Favorite";
            $information = "Succesfully added product into user wishlist";
        }

        $post_data = array(
            'status' => $status,
            'msg' => $msg,
            'Information' => $information );

            $post_data = json_encode ($post_data);
            echo $post_data;
            mysqli_close($conn);

    
        

    }

?>