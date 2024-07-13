<?php include "./header.php" ?>
<?php include "./query/index.php" ?>

<section class="single">
    <?php
    $id = $_GET['id'];
    $product = new db();
    $product->getData("products", "*", "categories ON categories.c_id = products.p_category", "p_id = $id");
    $res = $product->getRes()[0];
    $sizes = explode(", ", $res['p_sizes']);
    $colors = explode(", ", $res['p_colors']);
    ?>
    <div class="img">
        <img src="./admin/uploads/<?php echo $res['p_img'] ?>" alt="">
    </div>
    <div class="content">
        <div class="des-info">
            <h2 class="cat"><?php echo $res['c_name'] ?></h2>
            <h1 class="title"><?php echo $res['p_title'] ?></h1>
            <h1 class="price">$<?php echo $res['p_price'] ?></h1>
            <p class="t-des"><?php echo substr($res['p_des'], 0, 150) ?></p>
        </div>
        <div class="variations">
            <div class="sizes">
                <?php
                if ($sizes[0] != null) {
                    foreach ($sizes as $si) {
                ?>
                        <span><?php echo $si ?></span>
                <?php
                    }
                }
                ?>
            </div>
            <div class="colors">
                <?php
                foreach ($colors as $color) {
                ?>
                    <span style="background-color: <?php echo $color ?>;"></span>
                <?php
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="count">
            <div class="total">
                $<?php echo $res['p_price'] ?>
            </div>
            <div class="controls">
                <div class="quantity">
                    <button id="minus">-</button>
                    <span id="amount">1</span>
                    <button id="add">+</button>
                </div>
                <button class="add">Add to Cart</button>
            </div>
        </div>
    </div>

</section>

<section class="des">
    <hr>
    <h1>Product Description</h1>
    <p><?php echo $res['p_des'] ?></p>
</section>

<script src="./js/jq.js"></script>

<script>
    $("#add").click(function() {
        let amount = +$("#amount").text();
        amount++;
        $("#amount").text(amount);
    });
    $("#minus").click(function() {
        let amount = +$("#amount").text();
        if (amount > 1) {
            amount--;
        }
        $("#amount").text(amount);
    });
</script>
<?php include "./footer.php" ?>