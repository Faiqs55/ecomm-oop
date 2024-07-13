<?php include "header.php" ?>
<?php include "./query/db.php" ?>

<?php

 if(isset($_POST['submit'])){
    $title = addslashes($_POST['title']);
    $price = addslashes($_POST['price']);
    $des = addslashes($_POST['des']);
    $xs = (isset($_POST['xs'])) ? addslashes($_POST['xs']) : null;
    $s = (isset($_POST['s'])) ? addslashes($_POST['s']) : null;
    $m = (isset($_POST['m'])) ? addslashes($_POST['m']) : null;
    $l = (isset($_POST['l'])) ? addslashes($_POST['l']) : null;
    $xl = (isset($_POST['xl'])) ? addslashes($_POST['xl']) : null;
    $sizes = [$xs, $s, $m, $l, $xl];
    $p_size = "";
    foreach($sizes as $size){
        if($size){
            $p_size .= "$size, ";
        }
    }
    $colors = addslashes($_POST['colors']);
    $category = addslashes($_POST['category']);
    if(isset($_FILES['img'])){
        $img_name = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
        move_uploaded_file($img_temp, "./uploads/" . $img_name);
    }
    
    $product = new db();
    $product->add("products", [
        "p_title"=> $title,
        "p_price"=> $price,
        "p_des"=> $des,
        "p_sizes"=> trim($p_size, " ,"),
        "p_colors"=> $colors,
        "p_category"=> $category,
        "p_img"=> $img_name
    ]);

    header("Location: http://localhost/ecomm.oop/admin/products.php");
 }
?>

<div class="wrapper-f">
    <h1>Add New Post</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" class="add-p" method="post" enctype="multipart/form-data">
        <input required name="title" type="text" placeholder="Add Title of Product">
        <input required name="price" type="number" placeholder="Add Price of Product">
        <textarea required name="des" id="" placeholder="Add Desciption of Product"></textarea>
        <h3>Select Sizes</h3>
        <div class="sizes">
            <div>
                <label for="">XS:</label>
                <input type="checkbox" name="xs" value="XS">
            </div>
            <div>
                <label for="">S:</label>
                <input type="checkbox" name="s" value="S">
            </div>
            <div>
                <label for="">M:</label>
                <input type="checkbox" name="m" value="M">
            </div>
            <div>
                <label for="">L:</label>
                <input type="checkbox" name="l" value="L">
            </div>
            <div>
                <label for="">XL:</label>
                <input type="checkbox" name="xl" value="XL">
            </div>
        </div>
         <input required type="text" name="colors" placeholder="Add colors and seperate with ','">   
         <select required name="category" id="">
             <option value="" selected disabled>Select Category</option>
             <?php
              $cat = new db();
              $cat->getData("categories", "c_id, c_name");
              $cat = $cat->getRes();
              foreach($cat as $c){
             ?>
            <option value="<?php echo $c['c_id'] ?>"><?php echo $c['c_name'] ?></option>
            <?php
              }
            ?>
         </select>     
         <h3>Add an Image</h3>
         <input required type="file" name="img">
         <button type="submit" name="submit">Save</button>
    </form>
</div>

<?php include "footer.php" ?>