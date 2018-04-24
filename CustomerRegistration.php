<?php
session_start();
$page_title = 'Customer Registration';
include('includes/header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $errors = array();
    require('connect.php');

    if(empty($_POST['email'])){
        $errors[] = 'you forgot to enter your email';
    }else{
        $email = trim($_POST['email']);
    }
    
    if(empty($_POST['password'])){
        $errors[] = 'you forgot to enter your password';
    }else{
        $password = trim($_POST['password']);
    }

    if(empty($_POST['confirmPassword'])){
        $errors[] = 'you forgot to confirm password';
    }else{
        $cpass = $_POST['confirmPassword'];
    }

    if(empty($_POST['firstName'])){
        $errors[] = 'you forgot to enter your first name';
    }else{
        $firstName = trim($_POST['firstName']);
    }

    if(empty($_POST['lastName'])){
        $errors[] = 'you forgot to enter your last name';
    }else{
        $lastName = trim($_POST['lastName']);
    }

    if(empty($_POST['address'])){
        $errors[] = 'you forgot to enter your address';
    }else{
        $address = trim($_POST['address']);
    }

    if($password == $cpass){
        $password = SHA1($cpass);

        $sql = "INSERT INTO customer(fName, lName, address, email, password)VALUES('$firstName','$lastName','$address','$email', '$password')";
        $result = mysqli_query($db, $sql);

        if($result){
            echo"Success.....letter this will go to another page!";
        }
    }else{
        $errors [] = "PassWords do not match";
    }

    

}
?>

<h1>Customer Registration</h1>
<form method="POST" style="display:flex; flex-direction:column; width:500px;">
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="password" name="confirmPassword" placeholder="Confirm password"><br><br>
            <input type="text" name="firstName" placeholder="first Name"><br><br>
            <input type="text" name="lastName" placeholder="last name"><br><br>
            <input type="address" name="address" placeholder="address"><br><br>

            <input type="submit" name="submit" value="submit">
</form>

<?php include('includes/footer.html');