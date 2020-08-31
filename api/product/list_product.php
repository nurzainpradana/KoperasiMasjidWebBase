<?php
error_reporting(0);
include '../connection.php'; 

$id_cat=$_GET['idCat'];

	$cari=$_GET['cari'];
    $id_category=$_GET['id_category'];


    $response = array();

    if ( $id_kategori!="null") {
        $q="SELECT b.id as idbarang,b.harga,a.id as id_stok,b.*,a.id as idstok,a.jumlahstok from stok a
            left join barang b on a.id_barang=b.id where b.id_category='$id_kategori'";
    }elseif ($cari!="null" ||$cari!="" ) {
        $q="SELECT b.id as idbarang,b.harga,a.id as id_stok,b.*,a.id as idstok,a.jumlahstok from stok a
            left join barang b on a.id_barang=b.id where  b.NamaBarang like '%$cari%' ";
    } else {
               $q="SELECT b.id as idbarang,b.harga,a.id as id_stok,b.*,a.id as idstok,a.jumlahstok from stok a left join barang b on a.id_barang=b.id order by id_stok desc ";
    }
    
         $result = mysql_query("$q");

         $cekdata=mysql_num_rows($result);
        
        if ($cekdata <1) {
             
            $response["success"] = 0;
            $response["message"] = "kosong";
            die(json_encode($response));
        }
        else{ 
            while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
         $tmp["id_products"] = $row["id_products"];
             $tmp["name"] = $row["name"];
               $tmp["price"] = $row["price"];
           $tmp["image"] = $row["image"];
           
           $tmp["message"] = "ada";
                
        
        array_push($response, $tmp);

    }
   $n++;



}

header('Content-Type: application/json');
echo json_encode($response);


