<?php

function createNav(){
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-auto" href="./">VINYL</a>
        <ul class="navbar-nav">';
            if(@$_SESSION['type'] == 'customer'){
      echo '<li class="nav-item">
                <a class="navbar-brand" href="./">Hi ' . $_SESSION['fName'] . '</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./orders.php">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./catalog.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./shoppingCart.php">Cart</a>
            </li>';
            }
            if(@$_SESSION['type'] == 'owner'){
      echo '<li class="nav-item">
                <a class="navbar-brand" href="#">' .$_SESSION['storeName'] . '</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Inventory</a> //
            </li>';
            }
            echo '<li class="nav-item">';
        if(isset($_SESSION['type'])){
            echo '<a class="nav-link" href="./logout.php">Logout</a>';
        }else{
            echo '<a class="nav-link" href="./login.php">Login</a>';
        }
        echo '</li>
        </ul>
    </nav>';
//    if(isset($_SESSION['type'])){
//        return 'the type is ' . $_SESSION['type'] . '  ';
//    }
//    return 'sessions is not set    ';
    
}
