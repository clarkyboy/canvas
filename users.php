<?php
    require 'product.php';
    $prod = new Product;
    $prodlist = $prod->getAllProduct();
    if(isset($_POST['save'])){
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc'];
        $prod_img = $_FILES['prod_img']['name'];
        $tmp_file_name = $_FILES['prod_img']['tmp_name'];
        $directory = "images/";
        $result = $prod->addProduct($prod_name, $prod_desc, $prod_img, $tmp_file_name, $directory);
        echo $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="prod_name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <input type="text" name="prod_desc" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="prod_img" id="" class="form-control">
            </div>
            <input type="submit" value="Save" name="save" class="btn btn-primary">
        </form>
    </div>

    <div class="container">
        <?php foreach($prodlist as $key=>$value){?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $value['prod_img'];?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value['prod_name']; ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php }?>
    </div>
</body>
</html>