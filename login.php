<?php 
session_start();
$page_title = 'Login';
include('includes/header.html');


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
            header("Location: catalog.php");
        }else{
            echo 'username or password is incorrect!';
            echo '<br>';
            echo 'try again!';
        }    
    }else{
        echo '<h1>Error!</h1>';
        echo '<p class="error">The following error(s) occurred:<br>';
        foreach ($errors as $msg) {
            echo " - $msg<br>\n";
        }
        echo '</p><p>Please try again.</p>';
    }
}

?>
<h1>Login</h1>
    <div>
        <form action="login.php" method="post">
            <label for="email">Email Address:</label>
            <input type="email" name="email" size="20" maxlength="60" value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
            <label for="pass">Password:</label>
            <input type="password" name="pass" size="20" maxlength="20">
            <select name="type">
                <option disabled selected value="null"> -- select a user type -- </option>
                <option value="customer">Customer</option>
                <option value="owner">Owner</option>
            </select>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

<?php include('includes/footer.html');