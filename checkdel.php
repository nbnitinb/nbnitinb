<?php 
$id = $_GET['id'];
echo "<script>
        var yes = confirm('Do you really want to delete?');
        if(!yes){
           window.location='getProduct.php';
        }else{
            window.location='delete.php?id=$id';
        }
    </script>";

?>