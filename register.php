<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kit Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href="css/StyleSheet.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/fav.png">


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    <script src="js/webfont.js" type="text/javascript" async=""></script>
    <script src="js/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>
    <script src="js/YSuKFGsBGRyii5oc9H18zTpuwTw.js"></script>
    <link rel="stylesheet" href="css/9fae8cdcd4712da134ac88c26592f43f.css" data-minify="1">
    <script src="js/243f2d21a43ee8afc3cdfe883594887e.js" data-minify="1"></script>
    <style type="text/css"></style>
    <link href="css/StyleSheet.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="images/fav.png">


    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    
    <div id="header">
        <script>
            $('#header').load('header.html')
        </script>
    </div>
    
    <div class="col-md-8 offset-md-2">    
        <form action="register.php" method="post" id="details" align="center">
            <div class="col-md-12">
                <input type="text" name="registration_number" class="form_register rounded" placeholder="Registration number" required> 
            </div>
            <div class="col-md-12">
                <select name="shop_name" class="form_register rounded" required>
                    <option value="none" selected disabled hidden> 
                        Pick the shop location  
                    </option> 
                    <?php
                        function getShopLocation (){
                            require_once('./connection.php');
                            $query = "Select shop_location from users";
                            $queryResult = $conn->query($query);
                            $rows = $queryResult -> fetch_assoc();
                            foreach ($rows as $key => $value) {
                                echo"<option value='".$value."'>Motorglaze - ".$value."</option>";
                            }
                        } 
                        getShopLocation();
                    ?>
                </select>
            </div>
            <div class="col-md-12">
                <input type="text" name="car_name" class = "form_register rounded" placeholder="Owner's car model" required>
            </div>
            <div class="col-md-12">
                <input type="text" name="customer_name" class = "form_register rounded" placeholder="Owner's name" required>
            </div>
            <div class="col-md-12">
                <input type="text" name="applicant_name" class = "form_register rounded" placeholder="Technician's name" required>
            </div>
            <div class='col-md-12'><input type='text' name='shop_owner' placeholder='enter the authotized username' class= 'form_register rounded'>
            </div>
            <div class='col-md-12'>
            <input type='password' name='shop_owner_password' placeholder='enter the password' class= 'form_register rounded'>
            </div> 
            <input type='submit' id='submit' value='submit' name='submit' align='center' class='btn btn-success'>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST["registration_number"])){
        require('./connection.php');

        global $conn;
        $registration_number = $_POST["registration_number"];
        $shop_name =$_POST["shop_name"];
        $car_name = $_POST["car_name"];
        $customer_name = $_POST["customer_name"];
        $applicant_name = $_POST["applicant_name"];
        $shop_owner = $_POST["shop_owner"];
        $shop_owner_password = $_POST["shop_owner_password"];
        $shop_owner_password1 = hash("sha256", $shop_owner_password);
        $_POST["shop_owner_password"] = $shop_owner_password1;
        if($registration_number != '' && $shop_name != '' && $car_name != '' && $customer_name != '' && $applicant_name != '' && $shop_owner != '' && $shop_owner_password != '')
        {
            $query = "SELECT * from users where username='".$shop_owner."'";
            
            $queryResult = $conn -> query($query);
            $rows = $queryResult -> fetch_assoc();
            if ($shop_owner == $rows["username"]) {
                if($rows["password"] === $shop_owner_password1){
                    $query = "INSERT into registered_kits(registration_number, car_model, owner_name, technician_name) values('".$registration_number."', '".$car_name."', '".$customer_name."', '".$applicant_name."')";
                    $queryResult = $conn -> query($query);
                    // var_dump($query);
                    if($queryResult){
                    echo "<script>alert('success')</script>";
                    } else {
                        echo "<script>alert('error')</script>";
                    }
                }
            }
            else {
                echo "<script>alert('Invalid authentication credentials');</script>";
            }
        }
    }
?>