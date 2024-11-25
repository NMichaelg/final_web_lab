<?php
    require_once '../db_exercise/db_connect.php';
    $database = new Database();
    $q = $_GET['q'];
    
    $products = $database->get_search($q);

    $return_name_list = ""; 
    foreach ($products as $product) {
        $return_name_list = $return_name_list . "<a href='?page=products&query=".$product['name']."'>".$product['name']."</a>";
        $return_name_list = $return_name_list."<br>";
      }
    echo $return_name_list;
?>