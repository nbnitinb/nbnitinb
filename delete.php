<?php
$data = file_get_contents('product.json');
$id = $_GET['id'];

$json_arr = json_decode($data, true);


$arr_index = array();
foreach ($json_arr as $key => $value)
{
    if ($value['Id'] == $id)
    {
        $arr_index[] = $key;
    }
}


foreach ($arr_index as $i)
{
    unset($json_arr[$i]);
}


$json_arr = array_values($json_arr);
file_put_contents('product.json', json_encode($json_arr));
header("Location: getProduct.php");
?>