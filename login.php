<?php 
$page_title = 'Login';
include('includes/header.html');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');

    if (empty($errors)){
        if($type == 'owner'){
            $query = "SELECT o.ownerID, s.storeName, s.storeID  FROM owner o, store s  WHERE o.email = '$email' AND o.password = SHA1($pass)";
            $url .= '/catalog.php';
        }else{
            $query = "SELECT customerID, fName FROM customer WHERE email='$email' AND password = SHA1($pass)";
            $url .= '/catalog.php';
        }
        
        $result = mysqli_query($db, $query);

        if (@mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                if($type == 'owner'){
                    $_SESSION['ownerID']=$row['ownerID'];
                    $_SESSION['storeID']=$row['storeID'];
                    $_SESSION['storeName']=$row['storeName'];
                    $_SESSION['type'] = $type;
                }else{
                    $_SESSION['customerID'] = $row['customerID'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['type'] = $type;
                }
            }
            header("Location: $url");
        }else{
            echo 'username or password is incorrect!';
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