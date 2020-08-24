<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pixel6 Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/index.css">  
</head>
<body> 
<?php
           $titleError = $descriptionError = $quantityError = $priceError =" ";
            if (isset($_POST['upload'])) {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $i=0;$j=0;
                if(empty($title)){
                    $titleError = "Product title is required"; 
                    $i++; 
                }

                 if(empty($description)){
                    $descriptionError = "Description  is required"; 
                    $i++;
                }

                 if(empty($quantity)){
                    $quantityError = "Quantity  is required"; 
                    $i++;
                     }else if(!preg_match("/[0-9]+/",$quantity)) { 
                    $quantityError =  "Only Numbers allowed";
                    $j++;
                    }

                 if(empty($price)){
                    $priceError = "Price is required";
                    $i++;
                 } else if(!preg_match("/[0-9]+([\.,][0-9]+)?/",$price)){
                    $priceError = "Only Numbers allowed";
                    $i++;
                 }

                 if($i == 0 && $j ==0){
                    header("Location: saveProduct.php?title=$title&description=$description&quantity=$quantity&price=$price");  
                 }
            }
        
?>

<div class="container">
    <div class="product_form">
        <div class="row">
        <?php
            if (isset($_GET['prdct'])) {
            $status="success";
            $newStatus=$_GET['prdct'];
          if($status==$newStatus){
        ?>
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?php echo  $_GET['add_msg']; ?>.
            </div>
            <?php } }?> 
            <div class="col-md-10">
                <h6 class="text-left">Pixel6 Test</h6>
                <div class="card">
                    <div class="card-body">
                    <?php
                        if (isset($_GET['uid'])) {
                        $json=file_get_contents("product.json");
                        $data =  json_decode($json);
                        $i = $_GET['uid'];
                        foreach($data as $item)
                            {
                                if ($item->Id ==$i ) {
                     ?>
                        <form method="post" action="update.php?id=<?php echo $item->Id;?>"> 
                           <div class="form-group">
                               <label for="">Title*</label>
                               <input type="text" class="form-control" value="<?php echo $item->Title;?>" id="input" name="title">
                               <span class="error"> <?php if(isset($titleError)){ echo $titleError;}?> </span>
                           </div>
                           <div class="form-group">
                                <label for="">Description*</label>
                                <input type="text" class="form-control" value="<?php echo $item->Description;?>" id="input" name="description">
                                <span class="error"><?php if(isset($descriptionError)){ echo $descriptionError;}?> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity*</label>
                                <input type="text" class="form-control" value="<?php echo $item->Quantity;?>" id="input" name="quantity">
                                <span class="error"><?php if(isset($quantityError)){ echo $quantityError;}?> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Price*</label>
                                <input type="text" class="form-control" value="<?php echo $item->Price;?>" id="input" name="price">
                                <span class="error"><?php if(isset($priceError)){ echo $priceError;}?> </span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" name="upload" >Update</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </form>
                        <?php }}}else if(empty($item)){?>
                            <form method="post" action=""> 
                           <div class="form-group">
                               <label for="">Title*</label>
                               <input type="text" class="form-control"  id="input" name="title">
                               <span class="error"> <?php if(isset($titleError)){ echo $titleError;}?> </span>
                           </div>
                           <div class="form-group">
                                <label for="">Description*</label>
                                <input type="text" class="form-control"  id="input" name="description">
                                <span class="error"><?php if(isset($descriptionError)){ echo $descriptionError;}?> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity*</label>
                                <input type="text" class="form-control"  id="input" name="quantity">
                                <span class="error"><?php if(isset($quantityError)){ echo $quantityError;}?> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Price*</label>
                                <input type="text" class="form-control"  id="input" name="price">
                                <span class="error"><?php if(isset($priceError)){ echo $priceError;}?> </span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" name="upload" >Add Product</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </form>
                    <?php } ?>        
                    </div>
                </div>                    
            </div>
        </div>
    </div>
    <br>
<div class="text-right">
            <a href="getProduct.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View Product</a>
</div>
</div>  
</body>
</html>
