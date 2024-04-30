<!-- Features Section -->
<?php
  //  include('function.php');
    $product_featured = $product->getDataFeatured();

    //add to cart function called
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['feature_submit'])){
            $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
        }
    }
?>
<section class="featured" id="featured">
    <h1 class="heading"><span>Featured Watches</span></h1>

    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
        <?php foreach($product_featured as $item) { ?>
            <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id'])?>">
                    <div class="image">
                        <img src="<?php echo $item['item_image'];?>" alt="images">
                    </div>
                    <div class="content">
                        <h3><?php echo $item['item_brand'] ?></h3>
                        <h4><?php echo $item['item_name'] ?></h4>
                        <div class="price">₹<?php echo $item['item_price'] ?><span>₹20000</span></div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                            <button type='submit' name='feature_submit' class='btn'>Add To Cart</button>
                        </form>
                    </div>
                </a>
            </div>
        <?php } //closing foreach function?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section>

<!-- !Features Section -->