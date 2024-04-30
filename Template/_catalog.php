<!-- Catalog Section -->
<?php 
$product_all = $product_shuffle;
shuffle($product_all);
$sub = array_map(function($pro){return $pro['subject'];},$product_all);
$subject = array_unique($sub);
sort($subject);

//add to cart function called
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['catlog_submit'])){
        $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="./HTML Template/catalog.css">
</head>
<main id="main-site">
    <!-- Special Price -->
    <section id="special-price">
        <div class="container mt-5">
            <h4 class="font-rubik font-size-20">Special Price</h4>
            <div id="filter" class="button-group text-end font-baloo font-size-16">
                <button class="btn is-checked" data-filter="*">All Watches</button>
                <?php foreach($subject as $s) { ?>
                <button class="btn" data-filter="<?php echo $s?>"><?php echo $s?></button>
                <?php } ?>
            </div>
        </div>
        
        <div class="grid">
            <?php foreach($product_all as $item) { ?>
            <div class="box <?php echo $item['subject']?>">
                <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id'])?>">
                    <div class="image">
                        <img src="<?php echo $item['item_image']?>" alt="image">
                    </div>
                    <div class="content">
                        <h3><?php echo $item['item_brand']?></h3>
                        <h4><?php echo $item['item_name']?></h4>
                        <div class="price">₹<?php echo $item['item_price'] ?><span>₹20000</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                            <button type='submit' name='catlog_submit' class='btn'>Add To Cart</button>
                        </form>                    
                </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </section>
    <!--! Special Price -->
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('#filter button');
        const boxes = document.querySelectorAll('.box');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const filter = button.getAttribute('data-filter');

                boxes.forEach(box => {
                    if (filter === '*' || box.classList.contains(filter)) {
                        box.style.display = 'block';
                    } else {
                        box.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

<!-- !Catalog Section -->

</html>