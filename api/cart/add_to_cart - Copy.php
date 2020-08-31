<?php
    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_products = $_POST['id_products'];	
		$id_user = $_POST['id_user'];
        $quantity = $_POST['quantity'];
		$id_cart = rand(111111,999999);

		//membuat query SQL
		$sql = "INSERT INTO tb_cart (id_cart, id_products, id_user, quantity) values ('$id_cart','$id_products','$id_user','$quantity');";

		//eksekusi query database
		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil menambahkan user";
			
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menambahkan user";

		}
		echo json_encode($response);
		mysqli_close($con);
	}

?>

<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//include('../connection.php');

/*

$securecode = htmlentities($_POST['securecode'] );
$id_products = htmlentities($_POST['id_products'] );
$id_user = htmlentities($_POST['id_user'] );
$quantity = htmlentities($_POST['quantity'] );

//$securecode = isset ($array['securecode']) ? $array['securecode']:'';

$securecode = stripslashes($securecode); //"12345567890";
//$id_products = stripslashes($id_products); //; 
$id_user = stripslashes($id_user); //"12";


if(isset($securecode) && !empty ($securecode) && isset($id_products) && !empty($id_products) 
    && isset($id_user) && !empty($id_user) && isset($quantity) && !empty($quantity) ) {

        global $con;

        if($con -> connect_error) {
            die("Connection has failed ". $con -> connect_error);
        }

        

        date_default_timezone_set("Asia/Kolkata");
	    $date = date("Y-m-d");

        //get Cureent date
        $status = 0; 
        $msg = "Gagal menambah ke Keranjang";
        $information = "Failed to add tb_tb_cart";
        $detailsarray = array();

        //Check id_user exist or not
        $notExist = true;
        $qouteId = 1000;
        $rowUser_id = 0;
        $rowProdJsonArray = array();

        $stmt = $con->prepare("SELECT id_user, id_products, qoute_id FROM tb_cart WHERE id_user=?");
        $stmt->bind_param(i, $id_user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($col1, $col2, $col3);

        while ($stmt->fetch()) {
            $notExist = false;

            $rowUser_id = $col1;
            $rowProdJsonArray = $col2; 
            $qouteId = $col3;
        }

        if ($notExist) {
            //No id_user doesn't exist on table
            $stmt = $con->prepare("SELECT qoute_id FROM tb_cart ORDER BY id_user DESC LIMIT 1");
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result ($col4);
            //$qouteno = 1000;

            while ($stmt->fetch()) {
                $qouteId = $col4;
                //echo "Last qoute id" . $qouteId;
            }
            
            //Create id_products json array
            $prod_json_array[0] = array(
                    'id_products' => $id_products,
                    'date' => $date);
            //echo "Product array is" . json_encode ($prod_json_array);
            $prod_jsonarray = json_encode($prod_json_array);

            $qouteId = $qouteId+1;
            //echo "Qoute_id" . $qouteId;

            //add id_product into wishlit table
            
            $stmt2 = $con->prepare("INSERT INTO tb_cart (id_user, id_products, quantity, qoute_id) VALUES (?,?,?,?)");
            $stmt2->bind_param(iiii, $id_user, $id_products, $quantity, $qouteId );
            $stmt2->execute();

            //if(!empty($stmt2->insert_id)) {
                $status = 1; 
                $msg = "Berhasil menambahkan ke Keranjang";
                $information = $qouteno;
            //} 
            

        } else {
            //Yes id_user exist
            $newJsonObject = array(
                'id_products' => $id_products,
                'date' => $date );

            $oldarray = json_decode ($rowProdJsonArray, true);
            $prodIdExist = false;

            foreach($oldarray as $arraykey) {
                //echo "id_products" . $arraykey['id_products'];

                if ($id_products == $arraykey['id_products'] ) {
                    $prodIdExist = true;
                    //echo "Id_products exist in table";


                }
            }
            if ($prodIdExist) {
                //echo "Don't Update table";
                $status =1;
                $msg = "Succesfully Product Added into the tb_cart";
                $information  = $qouteId;

            } else {
                array_push($oldarray, $newJsonObject);

                $tempnewarray = json_encode($oldarray);
                //echo "New Update Json Array is " . json_encode($oldarray);

                $stmt2 = $con->prepare("UPDATE tb_cart SET id_products=? WHERE id_user=?");
                $stmt2->bind_param(si, $tempnewarray, $id_user );
                $stmt2->execute();

                $rows=$stmt2->affected_rows;
                if($rows>0){	
                        $status =1;
                        $msg = "Succesfully Product Added into the tb_cart";
                        $information  = $qouteId;
                        
                
                
                }else{
                
                
                    $status =0;
                    $msg = "Fail to add prodocut into tb_cart";
                    $information  = "Please try again.";
                
                
                }
            }
        }

        

        $post_data = array(
            'status' => $status,
            'msg' => $msg,
            'Information' => $information );

            $post_data = json_encode ($post_data);
            echo $post_data;
            mysqli_close($con);

    
    }

    */

    require_once('../connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//mendapatkan nilai variabel
		$id_products = $_POST['id_products'];	
		$id_user = $_POST['id_user'];
        $quantity = $_POST['quantity'];
		$id_cart = rand(111111,999999);

		//membuat query SQL
		$sql = "INSERT INTO tb_cart (id_cart, id_products, id_user, quantity) values ('$id_cart','$id_products','$id_user','$quantity')";

		//eksekusi query database
		if(mysqli_query($con, $sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil menambahkan user";
			
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menambahkan user";

		}
		echo json_encode($response);
		mysqli_close($con);
	}

?>