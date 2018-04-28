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
            header("Location:login.php");;
        }
    }else{
        $errors [] = "PassWords do not match";
    }

    

}
?>

<h1 style="text-align: center;margin-top: 8%">Customer Registration</h1>
<div style="margin: auto; width: 30%;min-width: 300px" class="form-group" >
    <form method="POST" class = "form-horizontal">
        <input required class="form-control" type="text" name="firstName" placeholder="First Name" style="margin-top: 20px">
        <input required class="form-control" type="text" name="lastName" placeholder="Last Name">
        <input required class="form-control" type="address" name="address" placeholder="Street Address">
        <input required class="form-control" type="email" name="email" placeholder="Email" style="margin-top: 20px">
        <input required class="form-control" type="password" name="password" placeholder="Password">
        <input required class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" style="margin-bottom: 20px">
        <input required class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Submit">
    </form>
</div>
<?php include('includes/footer.html');