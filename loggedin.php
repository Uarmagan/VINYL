<?php # Script 12.9 - loggedin.php #2
// The user is redirected here from login.php.
session_start(); // Start the session.
// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) {
    // Need the functions:
    require('login_functions.php');
    redirect_user();
}
// Set the page title and include the HTML header:
$page_title = 'Logged In!';
// Print a customized message:
echo ">Logout</a></p>";
?>