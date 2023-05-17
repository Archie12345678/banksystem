<?php
include 'connection.php';

session_start();

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit();
    }else{
        echo '<div class="bg-danger text-center p-2 text-white">Invalid username or password</div>';
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
    <title>Login | Form</title>
</head>
<body>

<h1 class="text-center bg-primary text-white p-3" >Login | Form</h1>
<form action="" method="POST">
    <div class="container col-6">
        <div class="row">
            <label for="">Username : </label>
            <input type="text" name="username" class="form-control">
            <label for="">Password : </label>
            <input type="password" name="password" class="form-control">
            <input type="submit" class="btn btn-primary" name="submit" value="Login">
            <a href="registration.php">Click here if you don't have an account yet</a>
        </div>
    </div>
</form>
</body>
</html>
    