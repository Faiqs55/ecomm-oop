<?php include "header.php"; ?>
<?php include "./query/db.php"; ?>

<div class="wrapper-p">
    <h1>All Posts</h1>
    <a href="./add-product.php" class="add">Add Product</a>
    <table>
       <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Colors</th>
            <th>Sizes</th>
            <th>Controls</th>
        </tr>
       </thead>
       <tbody>
        <?php
         $products = new db();
         $products->getData("products", "*", "categories ON categories.c_id = products.p_category");
         $res = $products->getRes();

         if(count($res) > 0){
          foreach($res as $data){
        ?>
        <tr>
            <td><?php echo $data["p_id"] ?></td>
            <td><?php echo $data["p_title"] ?></td>
            <td><?php echo $data["p_price"] ?></td>
            <td><?php echo substr($data["p_des"], 0, 50) ?>...</td>
            <td><?php echo $data["c_name"] ?></td>
            <td><?php echo $data["p_colors"] ?></td>
            <td><?php echo $data["p_sizes"] ?></td>
            <td>
                <a href="" class="green">Edit</a>
                <a href="" class="red">Delete</a>
            </td>
        </tr>
        <?php
          }
        }else{
            echo "<h1>No Records Found</h1>";
        }
        ?>
       </tbody>
    </table>
</div>

<?php include "footer.php" ?>