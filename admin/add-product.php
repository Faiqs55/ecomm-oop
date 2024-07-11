<?php include "header.php" ?>

<div class="wrapper-f">
    <h1>Add New Post</h1>
    <form action="" class="add-p">
        <input type="text" placeholder="Add Title of Product">
        <input type="text" placeholder="Add Title of Product">
        <textarea name="" id="" placeholder="Add Desciption of Product"></textarea>
        <h3>Select Sizes</h3>
        <div class="sizes">
            <div>
                <label for="">XS:</label>
                <input type="checkbox">
            </div>
            <div>
                <label for="">S:</label>
                <input type="checkbox">
            </div>
            <div>
                <label for="">M:</label>
                <input type="checkbox">
            </div>
            <div>
                <label for="">L:</label>
                <input type="checkbox">
            </div>
            <div>
                <label for="">XL:</label>
                <input type="checkbox">
            </div>
        </div>
         <input type="text" placeholder="Add colors and seperate with ','">        
         <h3>Add an Image</h3>
         <input type="file">
         <button type="submit">Save</button>
    </form>
</div>

<?php include "footer.php" ?>