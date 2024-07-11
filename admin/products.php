<?php include "header.php"; ?>

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
        <tr>
            <td>1</td>
            <td>Jacket</td>
            <td>250$</td>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, aliquam...</td>
            <td>Casual</td>
            <td>Red, Green, Blue</td>
            <td>XL, M, XS</td>
            <td>
                <a href="" class="green">Edit</a>
                <a href="" class="red">Delete</a>
            </td>
        </tr>
       </tbody>
    </table>
</div>

<?php include "footer.php" ?>