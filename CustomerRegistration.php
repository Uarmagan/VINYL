<?php
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
        $pass = trim($_POST['password']);
    }

    if(empty($_POST['firstName'])){
        $errors[] = 'you forgot to enter your first name';
    }else{
        $fn = trim($_POST['firstName']);
    }

    if(empty($_POST['lastName'])){
        $errors[] = 'you forgot to enter your last name';
    }else{
        $ln = trim($_POST['lastName']);
    }

    if(empty($_POST['address'])){
        $errors[] = 'you forgot to enter your address';
    }else{
        $address = trim($_POST['address']);
    }
}
?>

<h1>Customer Registration</h1>
<form action="register.php" method="POST">
    <p>Email Address: <input type="text" name="email" size="15" maxlength="60" value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>></p>
    <p>password: <input type="password" name="password" size="15" maxlength="20" value=<?php if(isset($_POST['password'])) echo $_POST['password']; ?>></p>
    <p>First Name: <input type="text" name="firstName" size="15" maxlength="20" value=<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>></p>
    <p>Last Name: <input type="text" name="lastName" size="15" maxlength="40" value=<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>></p>
    
</form>

<?php include('includes/footer.html');