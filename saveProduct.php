<?php 
        ini_set( "display_errors", 0);/* added this because when i am getting last id for id increment if json file does not contain any data it shows warning msg*/ 
        $file_name ='product.json'; 
        $jsonid = json_decode(file_get_contents($file_name), true);
        $last = end($jsonid);
        $id = $last['Id'];

        if(file_exists($file_name)){
            $current_data = file_get_contents($file_name);
            $array_data = json_decode($current_data,true);
            $extra = array(
                'Id' =>++$id, 
                'Title' => $_GET['title'], 
                'Description' => $_GET['description'], 
                'Quantity' =>$_GET['quantity'], 
                'Price' => $_GET['price']
            ); 
            $exercise_json = json_encode($jsonid, JSON_PRETTY_PRINT);
            file_put_contents($file_name, $exercise_json, FILE_APPEND);
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents($file_name,$final_data)){
                $add = "New Product added.";
                $prdct ="success";
                header("Location: index.php?prdct=$prdct&add_msg=$add");
            }
        }
        else{
            echo "<script>alert('file does not exist');</script>"; 
        }
?>