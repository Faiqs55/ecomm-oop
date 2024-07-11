<?php 
session_start();
if(isset($_SESSION['admin'])){
    header("Location: http://localhost/ecomm.oop/admin/products.php");
    die();
}
if(isset($_POST['submit'])){
    $conn = new mysqli("localhost", "root", "", "oop_ecomm");
    $res = $conn->query("SELECT name FROM admin WHERE name = '{$_POST['name']}' AND pass = '{$_POST["pass"]}'");
    if($res->num_rows > 0){
        $user = $res->fetch_assoc()["name"];
        $_SESSION["admin"] = true;
        $conn->close();
        header("Location: http://localhost/ecomm.oop/admin/products.php");
    }else{
        echo "<h1 style='text-align: center'>USER NAME OF PASSWORD INCORRECT PLEASE REFRESH THE PAGE</h1>";
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>Welcome admin</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div>
                    <label for="">Username</label>
                    <input name="name" type="text">
                </div>
                <div>
                    <label for="">Password</label>
                    <input name="pass" type="password">
                </div>
                <button type="submit" name="submit">Login In</button>
            </form>
        </div>
    </div>
</body>
</html>