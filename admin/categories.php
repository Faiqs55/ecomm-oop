<?php 
error_reporting(E_ERROR | E_PARSE);
include "header.php";
include "./query/db.php";
 
?>

<div class="wrapper-p">
    <h1>All Categories</h1>
    <a href="./add-category.php" class="add">Add Catecory</a>
    <table>
       <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Products</th>            
            <th>Controls</th>
        </tr>
       </thead>
       <tbody>
        <?php
         $categories = new db();
         $categories->getData("categories");
         $categories = $categories->getRes();
         foreach($categories as $cat){
        ?>
        <tr>
            <td><?php echo $cat['c_id'] ?></td>
            <td><?php echo $cat['c_name'] ?></td>
            <td><?php echo $cat['no_products'] ?></td>
            <td>
                <a href="" class="green">Edit</a>
                <a href="" class="red">Delete</a>
            </td>
        </tr>
        <?php
         }
        ?>
       </tbody>
    </table>
</div>

<?php include "footer.php" ?>