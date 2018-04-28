<?php
session_start();
$page_title = "Order Confirmed";
include('includes/header.html');
require('connect.php');

//check if user is logged in
if(!isset($_SESSION['type']) && $_SESSION['type'] == ""){
header('Location: login.php'); //redirect URL
}
?>
<div>
    <h1 style="font-size:60px;text-align: center;margin-top: 25px;">ORDER CONFIRMED</h1>
    <div>
        <button type="button" class="btn btn-primary btn-lg" style="width: 40%;float: left;margin: 25px 5% 25px 5%"
                onclick="window.location.href='catalog.php'">Back to Catalog</button>
        <button type="button" class="btn btn-primary btn-lg" style="width: 40%;float: left;margin: 25px 5% 25px 5%"
                onclick="window.location.href='orders.php'">Orders</button>
    </div>
</div>
<?php include('includes/footer.html');?>
