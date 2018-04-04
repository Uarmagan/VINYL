<?php
$page_title = 'Customer Registration';
include('includes/header.html');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    require('connect.php');

}
?>
<h1>Customer Registration</h1>
<form action="register.php" method="POST">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value=<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>></p>
    <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value=<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>></p>
    <p>Email Address: <input type="text" name="email" size="15" maxlength="60" value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>></p>
    <p>password: <input type="password" name="pass1" size="15" maxlength="20" value=<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>></p>
</form>
<?php include('includes/footer.html');