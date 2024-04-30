<!-- Product Section -->
<?php
//add to cart function called
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['product_submit'])){
        $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}

$item_id = $_GET['item_id'] ?? 1;
foreach($product->getData() as $item):
    if($item['item_id'] == $item_id):
        
?>

<html>
<head>
    <link rel="stylesheet" href="./HTML Template/product.css">
</head>

<section class="product">
    <div class="row">
        <div class="image">
            <img id="mainImage" src="<?php echo $item['item_image']?>" alt="">
        </div>
        <div class="detail">
            <h6>Home / Books</h6>
            <h3 class="py-4"><?php echo $item['item_brand']," ",$item['item_name'];?></h3>
            <h2><?php echo $item['item_price']?></h2>
            <input type="number" name="quantity" id="qty" value="1">
            <br>
            <a href="<?php printf('%s?item_id=%s','payment.php',$item['item_id'])?>" class="buy-btn">Proceed to Buy</a>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                <button type='submit' name='product_submit' class='btn'>Add To Cart</button>
            </form>
            <h4 class="pdetails">Product Details</h4>
            <span>When sporty style meets luxury, you get this latest stunner from Citizen. 
                Joining ready-for-anything wearability with feminine elegance, this time-and-date 
                timepiece is the ultimate day-to-evening watch to wear. The two-tone stainless steel 
                case measures 33mm in diameter and is presented on a matching, 3-link stainless steel 
                bracelet for a sleek, versatile wear on the wrist. The radiant pink dial is characterized 
                by its highly legible style and diamond accents, elevating the sporty wearer one step further. 
                A water resistance up to 100 meters helps the dynamic watch maintain a host of functionality 
                without compromising its alluring appearance. Powered by Citizen’s proprietary Eco-Drive technology 
                to provide light-powered vitality continuously and sustainably without ever needing a battery. 
                Caliber E013.</span>
        </div>
    </div>
</section>

<?php
    endif;
    endforeach;
?>
</html>

<!-- !Product Section -->