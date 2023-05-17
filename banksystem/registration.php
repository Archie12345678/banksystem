<?php 
include 'connection.php';

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($name) || empty($username) || empty($password)){
        echo '<div class="bg-danger text-center p-2 text-white">Please fill up this form</div>';
    }else{
    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?,?,?)");
    $stmt->execute([$name, $username, $password_hash]);

    echo '<div class="bg-success text-center p-2 text-white">Successfully Registered</div>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="Bcash.PNG" type="image/x-icon">
    <title>Registration | Form</title>
</head>
<body>

<h1 class="text-center bg-primary text-white p-3" >Registration | Form</h1>
<form action="" method="POST">
    <div class="container col-6">
        <div class="row">
            <label for="">Name : </label>
            <input type="text" name="name" class="form-control">
            <label for="">Username : </label>
            <input type="text" name="username" class="form-control">
            <label for="">Password : </label>
            <input type="password" name="password" class="form-control">
            <input type="submit" class="btn btn-primary" name="submit" value="Register">
            <a href="login.php">Click here if you already have an account</a>
        </div>
    </div>
</form>
</body>
</html>