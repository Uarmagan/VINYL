<?php 
session_start();
$page_title = 'Login';
include('includes/header.html');
if(isset($_SESSION['type'])){
    echo '<script>alert("You are already logged in")</script>';
    header("Location: index.php");
}
?>

<h1 style="text-align: center;margin-top: 8%">Login</h1>
<div style="margin: auto; width: 30%;min-width: 300px">
    <div class="form-group">
        <form class = "form-horizontal" action="login.php" method="post">
            <!--            <label for="email">Email Address:</label>-->
            <input required class="form-control" type="email" name="email" size="20" maxlength="60" placeholder="Email" style="margin-top: 20px"
                   value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
            <!--            <label for="pass">Password:</label>-->
            <input required class="form-control" type="password" name="pass" size="20" maxlength="20" placeholder="Password">
            <!--            <a>I am a...</a>-->
            <select required class="form-control" name="type" style="margin-top: 10px">
                <option disabled selected value="null"> I am a...<!-- -- select a user type -- --></option>
                <option value="customer">Customer</option>
                <option value="owner">Owner</option>
            </select>
            <input type="submit" name="submit" value="Login" style="width: 100%;margin-top: 10px" class="btn btn-primary btn-lg btn-block">
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {

    $errors = [];
    require('connect.php');

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if(isset($_POST['type'])){
        $type = $_POST['type'];
    }else{
        $errors[] = 'You forgot to enter type.';
    }
    
    if (empty($email)) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = trim($email);
    }

    if (empty($pass)) {
        $errors[] = 'You forgot to enter your password.';
    } else {
        $p = trim($pass);
    }

    if (empty($errors)){
        if($type == 'owner'){
            $query = "SELECT o.ownerID, s.storeName, s.storeID  FROM owner o, store s  WHERE o.Email='$email' AND o.password = SHA1('$pass') AND s.ownerID = o.ownerID";
        }else if($type == 'customer'){
            $query = "SELECT customerID, fName, email FROM customer WHERE email='$email' AND password = SHA1('$pass')";
        }else{
            echo ' something went wrong in the query';
        }
        
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                session_start();
                if($type == 'owner'){
                    $_SESSION['ownerID']=$row['ownerID'];
                    $_SESSION['storeID']=$row['storeID'];
                    $_SESSION['storeName']=$row['storeName'];
                    $_SESSION['type'] = $type;
                }
                else if($type == 'customer'){
                    echo 'putting the sessions in for customer ;';
                    $_SESSION['customerID'] = $row['customerID'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['fName'] = $row['fName'];
                    $_SESSION['type'] = $type;
                }
                else{
                    header('Location: '.$_SERVER['PHP_SELF']);
                    die;
                }
            }


            if($type == "customer")
                header("Location: catalog.php");
            else
                header("Location: storeProfile.php");
        }else{
            echo '<div style="width: 100%;text-align: center;color: red">Incorrect Username and/or Password!</div>';
        }
    }else{
        echo '<p style="color: red;text-align: center " class="error">The following error(s) occurred:<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br>\n";
        }
        echo '</p>';
    }
}

?>
<?php include('includes/footer.html');