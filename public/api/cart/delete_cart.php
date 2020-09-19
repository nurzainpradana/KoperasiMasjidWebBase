<?php
   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_cart = $_POST['id_cart'];	
        
        if(!empty($id_cart)){

            //membuat query SQL
            $sql = "DELETE FROM tb_cart WHERE  id_cart = $id_cart";
            //eksekusi query database
            $response = array();
            if(mysqli_query($con, $sql)) {
                $response["value"] = 1;
                $response["message"] = "Berhasil menghapus cart";
                
            } else {
                $response["value"] = 0;
                $response["message"] = "Gagal menghapus cart";
    
            }
            
        } else {
            $response["value"] = 2;
                $response["message"] = "Data Tidak Lengkap";
        }

        echo json_encode($response);
            mysqli_close($con);
		
	}

?>