<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_products = $_POST['id_products'];	
        $id_user = $_POST['id_user'];
        
        if(!empty($id_products) && !empty($id_user)){
            $id_favorite = rand(111111,999999);

            //membuat query SQL
            $sql = "INSERT INTO tb_favorite (id_favorite, id_products, id_user) values ('$id_favorite', '$id_products', '$id_user');";
    
            //eksekusi query database
            $response = array();
            if(mysqli_query($con, $sql)) {
                $response["value"] = 1;
                $response["message"] = "Berhasil menambahkan favorite";
                
            } else {
                $response["value"] = 0;
                $response["message"] = "Gagal menambahkan favorite";
    
            }
            
        } else {
            $response["value"] = 2;
                $response["message"] = "Data Tidak Lengkap";
        }

        echo json_encode($response);
            mysqli_close($con);
		
	}

?>