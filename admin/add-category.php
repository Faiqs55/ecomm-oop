<?php
include "header.php" ;
include "./query/db.php";
if(isset($_POST['submit'])) {
    $cName = addslashes($_POST['c_name']);
    $category = new db();
    $category->add("categories", ["c_name" => $cName], "c");
    header("Location: http://localhost/ecomm.oop/admin/categories.php");
}
?>

<div class="wrapper-f">
    <h1>Add new Category</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" class="add-p" method="post">

    <input type="text" placeholder="Enter Category Name" name="c_name">
        <button class="add" name="submit">Save</button>
    </form>
</div>

<?php include "footer.php" ?>