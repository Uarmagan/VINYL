<?php
session_start();
$page_title = "Welcome to Vinyl";
include('includes/header.html');?>
    <h1 class="text-center" style="font-size: 100px;margin-top: 100px">Welcome to Vinyl</h1>
    <h2 class="text-center" style="margin-top: 10px">Vinyl is a platform that provides a marketplace for vinyl record sellers and enthusiasts </h2>

    <button style="margin: 80px auto 20px auto; width: 100%;min-width: 300px;max-width: 800px"
            type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='login.php'">Click Here to Login</button>
    <p class="text-center" style="font-size: larger">I want to register as a...</p>
    <div style="margin: auto; width: 100%;min-width: 300px;max-width: 800px">
        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
                onclick="window.location.href='OwnerRegistration.php'">Store Owner</button>
        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
                onclick="window.location.href='CustomerRegistration.php'">Customer</button>
    </div>

<?php include('includes/footer.html');?>