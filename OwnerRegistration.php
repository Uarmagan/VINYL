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
        $password = trim($_POST['password']);
    }

    if(empty($_POST['confirmPassword'])){
        $cpass = $_POST['ConfirmPassword'];
    }else{
        $errors[] = "you forgot to confrim Password";
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

    if(empty($_POST['StoreName'])){
        $errors[] = 'you forgot to enter your store name';
    }else{
        $storeName = trim($_POST['storeName']);
    }

    if(empty($_POST['StoreDesc'])){
        $errors[] = 'you forgot to enter your store description';
    }else{
        $StoreDescription = trim($_POST['storeDesc']);
    }

    if(empty($_POST['address'])){
        $errors[] = 'you forgot to enter your address';
    }else{
        $address = trim($_POST['address']);
    }


    if($password == $cpass){
        $password = SHI1($cpass);
        $ownerQuery = "INSERT INTO owner(fName, lName, address, email,password) VALUES('$firstName', '$lastName', '$address', '$email', '$password')";
        
        $result = mysqli_query($db, $ownerQuery);
        if($result)
        {
           $getOwnerID = "SELECT ownerID FROM owner WHERE email = '$email'";
           $q = mysqli_query($db, $getOwnerID);

            if($q){
                echo"Store Created!";
            }
        }

    }

}

?>
<h1>Owner Registration</h1>
<form method="POST" style="display:flex; flex-direction:column; width:500px;">
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="password" name="confirmPassword" placeholder="Confirm password"><br><br>
            <input type="text" name="storeName" placeholder="Store Name"><br><br>
            <input type="text"  name="storeDescription" placeholder="store Description" id="des"><br><br>
            <input type="text" name="firstName" placeholder="first Name"><br><br>
            <input type="text" name="lastName" placeholder="last name"><br><br>
            <input type="address" name="address" placeholder="address"><br><br>

            <input type="submit" name="submit" value="submit">
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