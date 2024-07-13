<?php include "./header.php" ?>
<?php include "./query/index.php" ?>


 <main class="hero">

    <div class="title">
      <h3 class="sm">
      CASUAL & EVERYDAY
      </h3>
      <h1 class="lg">
      Effortlessly Blend Comfort <br> & Style!
      </h1>
    </div>

    <p>Effortlessly blend comfort and style with our Casual & Everyday collection, featuring cozy sweaters, versatile denim, laid-back tees, and relaxed-fit joggers for your everyday adventures</p>

    <a href="">
        VIEW COLLECTION
    </a>
 </main>

 <section class="popular">
     <h2>Most Popular</h2>

     <div class="container">
      <?php
       $products = new db();
       $products->getData("products", "*", "categories ON categories.c_id = products.p_category");
       $res = $products->getRes();
       if(count($res) > 0){
         foreach($res as $data){
      ?>
        <a class="card" href="./single.php?id=<?php echo $data['p_id'] ?>">
        <div class="img">
           <img src="./admin/uploads/<?php echo $data['p_img'] ?>" alt="">
           </div>
           <h3 class="category"><?php echo $data['c_name'] ?></h3>
           <h3 class="title"><?php echo $data['p_title'] ?></h3>
           <h3 class="price">$<?php echo $data['p_price'] ?></h3>
         </a>
        <?php
         }
       }else{
         echo "<h1>NO PRODUCTS FOUND</h1>";
       }
        ?>
     </div>

 </section>

 <section class="feature-cate">
    <div class="container">
        <div class="card">
            <img src="./admin/img/bag.jpg" alt="">
            <h2>Explore Our Exquisite Bag Collection Now!</h2>
            <a href="" >VIEW COLLECTION</a>
        </div>
    </div>
 </section>

<?php include "./footer.php" ?>