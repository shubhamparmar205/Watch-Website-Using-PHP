<!DOCTYPE html>
<html lang="en">
<?php 
ob_start();
include('function admin.php');

if(isset($_POST['delete'])){
    echo"<script>console.log('working');</script>";
    $res = $product->deleteProduct($_POST['item_id']);
    echo"<script>console.log('working');</script>";
    if($res){
        echo"<script>console.log('working');</script>";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }else{
        echo"<script>alert('product not deleted');</script>";
    }

}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      font-family: Arial, sans-serif;
    }

    .admin-panel {
      margin-top: 50px;
    }

    .admin-panel .btn {
      margin-right: 10px;
    }

    .product-list th,
    .product-list td {
      text-align: center;
    }

    .product-list img{
        height: 100px;
    }

    @media (max-width: 768px) {
      .admin-panel {
        margin-top: 20px;
      }

      .admin-panel .btn {
        margin-bottom: 10px;
      }

      .product-list img {
        max-width: 100%; /* Make images responsive on smaller screens */
      }
    }
  </style>
</head>

<body>
  <div class="container admin-panel">
    <div class="row">
      <div class="col-md-6">
        <h2>Products</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Add Product</button>
        <table class="table product-list">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Image</th>
              <th>Size</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($product->getData() as $item) { ?>
              <tr>
                <td><?php echo $item['item_id'];?></td>
                <td><?php echo $item['item_brand'];?></td>
                <td><img src="<?php echo $item['item_image']; ?>" alt="product"></td>
                <td><?php echo $item['subject'];?></td>
                <td>
                <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                        <!-- <input type="hidden" name="user_id" value="<?php echo $user_id?>"> -->
                        <button name="delete" class="btn btn-danger">Cancel</button>
                    </form>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h2>Orders</h2>
        <table class="table product-list">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product ID</th>
              <th>Image</th>
              <th>User ID</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach($product->getData("order") as $item) { 
                $pro = $product->getProduct($item['item_id'],"product");  
                foreach($pro as $i){
                      
            ?>
              <tr>
                <td><?php echo $item['order_id'];?></td>
                <td><?php echo $item['item_id'];?></td>
                <td><img src="<?php echo $i['item_image']; ?>" alt="product"></td>
                <td>
                  <?php echo $item['user_id'];?>
                </td>
              </tr>
            <?php
            }
        } 
        ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productSize = $_POST['size'];
    $productPrice = $_POST['productPrice'];

    // Check if file was uploaded without errors
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0) {
        $targetDir = "./assets/products/";
        $filePath = $targetDir . basename($_FILES["productImage"]["name"]);
        echo "File location: " . $productName,$productPrice,$filePath,$productSize;
        // Now you can use $filePath as the path of the uploaded image
        // Insert the product data along with the file path into your database or perform any other necessary operations
    } else {
        echo "No file uploaded.";
    }
    $image_path = strval($filePath);
    try{
        $res = $product->insertProduct($productName,$productPrice,$image_path,$productSize);
    }catch(Exception $e){
        echo $e;
    }
    echo"i m working";
    if($res){
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }else{
        echo"<script>alert('product not inserted');</script>";
    }
}
?>

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="adminpanel.php" method="POST"> <!-- Set the form enctype to "multipart/form-data" for file upload -->
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <label for="size">Product Size</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="Enter product Size" required>
          </div>
          <div class="form-group">
            <label for="productImage">Choose Image</label>
            <input type="file" class="form-control-file" id="productImage" name="productImage" accept="image/*" required> <!-- Accept only image files -->
          </div>
          <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" required>
          </div>
          <button type="submit" class="btn btn-primary" id="add">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
