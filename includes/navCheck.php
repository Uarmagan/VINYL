<?php

function createNav(){
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-auto" href="home.php"><img src="includes/logo.png" style="width:100px; margin: -25px 0;" alt="logo"></a>
        <ul class="navbar-nav">';
            if(@$_SESSION['type'] == 'customer'){
      echo '<li class="nav-item">
                <a class="navbar-brand" href="./home.php">Hi ' . $_SESSION['fName'] . '</a>
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
                <a class="navbar-brand" href="storeProfile.php">' .$_SESSION['storeName'] . '</a>
            </li>
            <li class="nav-item" id="inventoryNav">
                <a class="nav-link" href="inventory.php">Inventory</a>
            </li>';
            }
        if(isset($_SESSION['type'])){
            
            echo '<a class="nav-link" href="./logout.php">Logout</a>';
            
        }else{
            echo '<li class="nav-link">
                    <a class="nav-link" href="./login.php">Login</a>
                  </li>';
            echo '<li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 9%">Register</a>
                        <!--<a class="nav-link" href="./customerRegistration.php">Register</a>-->
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./CustomerRegistration.php">Customer</a>
                            <a class="dropdown-item" href="./OwnerRegistration.php">Owner</a>
                        </div>
                  </li>';
        }
        echo '
        </ul>
    </nav>';
//    if(isset($_SESSION['type'])){
//        return 'the type is ' . $_SESSION['type'] . '  ';
//    }
//    return 'sessions is not set    ';
    
}
