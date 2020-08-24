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
  <style>
      .plist{margin-top:60px;}
      .form-control ,.btn{border-radius: 0px;}
  </style>
</head>
<body> 
<div class="container">
        <div class="plist">
            
                <div class="">
                <h5>Product List</h5>
                </div>
                <div class="text-right" style="position:relative;bottom:30px;">
                <a href="index.php" class="btn btn-warning"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Product</a>
                </div>
            
        <div class="card">
        <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
        <?php
    $json=file_get_contents("product.json");
    $data =  json_decode($json);
    $tot=0;
    foreach($data as $item)
        {
            $mult = ($item->Price)*($item->Quantity);  
            $tot+=$mult;
      ?>
            <tr>
                <td><?php echo $item->Id;?></td>
                <td><?php echo $item->Title;?></td>
                <td><?php echo $item->Description;?></td>
                <td><?php echo $item->Quantity;?></td>
                <td><?php echo $item->Price;?></td>
                <td><?php echo $mult;?></td>
                <td><a href="index.php?uid=<?php echo $item->Id;?>"><i class="fa fa-pencil-square" aria-hidden="true"> &nbsp; Edit</i></a>
                / <a href="" onclick="return delCheck(id=<?php echo $item->Id;?>)"><i class="fa fa-trash" aria-hidden="true"> &nbsp;Delete</i></a></td>
                </tr>      
            <?php } ?>
            <tr>
                <td colspan="5" class="text-right"><strong>Grand Total</strong></td><td colspan=""><?php echo $tot;?>/-</td>
            </tr>
        </tbody>
              </table>
              </div>
        </div>
    </div>
</div>
<script>
    function  delCheck(o){
        var yes = confirm('Do you really want to delete?');
        if(!yes){
           window.location='getProduct.php';
        }else{
            window.location.href='delete.php?id='+o;
            return false;
        }
    }
</script>
</body>
</html>