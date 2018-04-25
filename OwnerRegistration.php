<?php
session_start();
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
        $errors[] = "you forgot to confrim Password";
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

    if(empty($_POST['storeName'])){
        $errors[] = 'you forgot to enter your store name';
        echo"<br>StoreName";
    }else{
        $storeName = trim($_POST['storeName']);
    }

    if(empty($_POST['storeDescription'])){
        $errors[] = 'you forgot to enter your store description';
        echo"<br>storeDec!!<br>";
    }else{
        $storeDescription = trim($_POST['storeDescriptionß']);
    }

    if(empty($_POST['address'])){
        $errors[] = 'you forgot to enter your address';
    }else{
        $address = trim($_POST['address']);
    }


    if($password == $cpass){
        $password = SHA1($cpass);
        $ownerQuery = "INSERT INTO owner(fName, lName, address, email,password) VALUES('$firstName', '$lastName', '$address', '$email', '$password')";
        
        $result = mysqli_query($db, $ownerQuery);
        if($result)
        {
            
           $getOwnerID = "SELECT * FROM owner WHERE email ='$email'";
           $q = mysqli_query($db, $getOwnerID);
           if($q){
                $cget = mysqli_num_rows($q);
                if($cget>0){
                    echo"check two<br>";
                    $row= mysqli_fetch_assoc($q);
                    $ownerID = $row['ownerID'];
                    $sq = "INSERT INTO store(storeName, storeAddress, description,ownerID )VALUES('$storeName','$address','$storeDescription', $ownerID)";
                    $storeQuery = mysqli_query($db,$sq);
                    if($storeQuery){
                        echo"Store Created! Success";
                    }
                }

           }
        }

    }

}

?>
<h1 style="text-align: center;margin-top: 6%">Owner Registration</h1>
<div style="margin: auto; width: 30%;min-width: 300px" class="form-group">
    <form method="POST" class = "form-horizontal">
        <input class="form-control" type="text" name="firstName" placeholder="First Name" required style="margin-top: 20px">
        <input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
        <input class="form-control" type="address" name="address" placeholder="Street Address" required>
        <input class="form-control" type="text" name="storeName" placeholder="Store Name" required style="margin-top: 20px">
        <input class="form-control" type="textarea"  name="storeDescription" placeholder="Store Description" id="des" required>
        <input class="form-control" type="email" name="email" placeholder="Email" required style="margin-top: 20px">
        <input class="form-control" type="password" name="password" placeholder="Password"required>
        <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" required>
        <input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-lg btn-block" style="margin-top: 20px">
    </form>
</div>
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