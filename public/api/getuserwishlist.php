<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('connection.php');


$securecode = htmlentities($_POST['securecode'] );
$id_member = htmlentities($_POST['id_member'] );


$securecode = 1234; //stripslashes($securecode);
$id_member = 11; //stripslashes($id_member);

if(isset($securecode) && !empty($securecode) && !empty($id_member) ) {
    global $conn;
    if($conn-> connect_error) {
        die("Connection has failed" . $conn-> connect_error);
    }

    //Get Current date
    $status = 0;
    $msg = "Tidak ada product dikeranjang pengguna";
    $information = "Tidak ada product dikeranjang pengguna";
    $jsonarray =  array();
    $count = 0;
    $notExist = true;
    $rowProdJsonArray = array();

    $stmt = $conn->prepare("SELECT id_member, id_products FROM wishlist WHERE id_member=?");
    $stmt->bind_param(i, $id_member);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1, $col2);

    while($stmt->fetch()) {
        $notExist = false;

        $rowId_member = $col1;
        $rowProdJsonArray = $col2;
        
    }
    
    if($notExist) {
        $status = 1;
        $msg = "Tidak ada product diwishlit pengguna";
        $information = "Tidak ada product diwishlist pengguna";
    } else {
        $oldarray = json_decode($rowProdJsonArray, true);
        $prodIDexist = false;

        foreach($oldarray as $arraykey) {
            $stmt = $conn->prepare("SELECT id_products, name, description, price, image FROM tb_product WHERE id_products=?");
            $stmt->bind_param(i, $arraykey['id_products']);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($col1, $col2, $col3, $col4, $col5);

            while($stmt->fetch()) {
                $status = 1;
                $msg = "Detail keranjang Pengguna";
                $jsonarray[$count] = array (
                    'id_products' => $col1,
                    'name' => $col2,
                    'description' => $col3,
                    'price' => $col4,
                    'unit' => $arraykey['unit'],
                    'image' => $col5
                );
                $count = $count + 1;
            }
        }
    }

    $Information = $jsonarray;

    mysqli_close($conn);

} else {
    $status = 0;
    $msg = "";
    $information = "";
}

$post_data = array(
    'status' => $status,
    'msg' => $msg,
    'Information' => $Information
);

$post_data = json_encode($post_data);
echo $post_data;

?>