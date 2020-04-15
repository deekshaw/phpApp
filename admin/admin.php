<!DOCTYPE html>
<html lang="en">
<?php
    if(isset($_SESSION['user_logged_in'])){
        header("location: index.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/admin.css">

</head>
<body>
    <div class="container">
        <div class="col-8 offset-2" align="center">
            <div class="col-8 offset-2" id="login_box">
                <h2><img src="../images/logo_3.png" alt="this is the logo" height= "100px" id="logo"></h2>
                <form action="admin.php" align="center" method="POST"id ="login_form">
                    <div class="col-md-12">
                       <input type="text" class="form-control form-control-lg" name="login" id="login" placeholder="Login Username">
                    </div>
                    <div class="col-md-12">
                        <input type="password" class="form-control form-control-lg" name="password" id="password"  placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-success" value="Log In">
                </form>
            </div>
        </div>
    </div>
</body>
<?php
    $password = $_POST["password"];
    
    $password1 = hash("sha256", $password);
    $_POST["password"] = $password1;
    
    require_once('../connection.php');
    
    $query = "SELECT * from users where status = 'admin'";
    
    $queryResult = $conn->query($query);
    $rows = $queryResult->fetch_assoc();

    $usernames = $rows['username'];
    
    if($usernames === $_POST['login']){
        if($password1 === $_POST["password"]){
            session_start();
            $_SESSION['user_logged_in'] =TRUE;
            $_SESSION['username'] = openssl_encrypt($_POST['login'], "AES-128-ECB", $_POST['password']);
        }
        else {
            echo "<script>alert('invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('invalid credentials');</script>";
    }

    if(isset($_SESSION['user_logged_in'])){
        header("location: index.php");
    }
?>
</html>