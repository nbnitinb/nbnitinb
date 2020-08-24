<?php

$data = file_get_contents('product.json');
$id = $_GET['id'];

$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
    if ($value['Id'] == $id) {
        $json_arr[$key]['Title'] = $_POST['title'];
        $json_arr[$key]['Description'] = $_POST['description'];
        $json_arr[$key]['Quantity'] = $_POST['quantity'];
        $json_arr[$key]['Price'] = $_POST['price'];
    }
}
file_put_contents('product.json', json_encode($json_arr));
header("Location: getProduct.php");
?>