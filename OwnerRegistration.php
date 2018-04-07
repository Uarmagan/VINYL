<?php
$page_title = 'Owner Registration';
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

    if(empty($_POST['StoreName'])){
        $errors[] = 'you forgot to enter your store name';
    }else{
        $storeName = trim($_POST['storeName']);
    }

    if(empty($_POST['StoreDesc'])){
        $errors[] = 'you forgot to enter your store description';
    }else{
        $StoreDesc = trim($_POST['storeDesc']);
    }

    if(empty($_POST['address'])){
        $errors[] = 'you forgot to enter your address';
    }else{
        $address = trim($_POST['address']);
    }

}
?>
<h1>Owner Registration</h1>
<form action="register.php" method="POST" style="display:flex; flex-direction:column; width:500px;">
<label for="email">Email Address:</label>
    <input type="text" name="email" maxlength="60" value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
    <label for="password">password:</label>
    <input type="password" name="password" maxlength="20" value=<?php if(isset($_POST['password'])) echo $_POST['password']; ?>>
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" maxlength="20" value=<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>>
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" maxlength="40" value=<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>>
    <label for="storeName">Store Name:</label>
    <input type="text" name="storeName" maxlength="40" value=<?php if(isset($_POST['storeName'])) echo $_POST['storeName']; ?>>
    <label for="StoreDesc">Store Description:</label>
    <input type="text" name="storeDesc" maxlength="40" value=<?php if(isset($_POST['storeDesc'])) echo $_POST['storeDesc']; ?>>
    <label for="Address">Address:</label>
    <input type="text" name="address" maxlength="40" value=<?php if(isset($_POST['address'])) echo $_POST['address']; ?>>
    <input type="submit">
</form>

<!-- NO TOUCHY - will implement javascript form validation later.
<script>
    const email = document.querySelector('input.email');
    email.onblur = function() {
        if(!email.value.includes('@')){
            email.style.borderColor = 'red';      
        }
    }
</script> NO TOUCHY -->
<?php include('includes/footer.html');