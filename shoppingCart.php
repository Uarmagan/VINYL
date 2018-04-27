<?php
session_start();
$page_title = 'Shopping Cart';
include('includes/header.html');
require('connect.php');

//check if user is logged in
if(!isset($_SESSION['type']) && $_SESSION['type'] == ""){
    header('Location: login.php'); //redirect URL
}

if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["cart"] as $keys => $values)
           {
                if($values["itemID"] == $_GET["id"])
                {
                     unset($_SESSION["cart"][$keys]);
                     //echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="shoppingCart.php"</script>';
                }
           }
      }
 }

?>
<h2 style="text-align: center;margin: 10px">Order Details</h2>

<div style="width: 100%;">
    <table style="width:80%;float: left;margin: auto 10% auto 10%" class="table table-striped table-hover">
        <?php
        if(isset($_SESSION["cart"])) {
            $total = 0;
            foreach ($_SESSION["cart"] as $keys => $values) {
                $total = intval($total + ((float)$values["quantity"] * (float)$values["cost"]));
            }
        }
        if (!empty($total)) {
            echo '
            <thead class="thead-dark">
                <tr style="width: 100% ">
                    <th>Album Name</th>
                    <th>Artist</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>';


        if(!empty($_SESSION["cart"]))
        {
            foreach($_SESSION["cart"] as $keys => $values)
            {
        ?>
        <tr>
            <td><?php echo $values["albumName"]; ?></td>
            <td><?php echo $values["artist"]; ?></td>
            <td><?php echo $values["quantity"]; ?></td>
            <td>$ <?php echo $values["cost"]; ?></td>
            <td>$ <?php echo number_format((float) $values["quantity"] * (float) $values["cost"], 2); ?></td>
            <td><a href="shoppingCart.php?action=delete&id=<?php echo $values["itemID"]; ?>" style="color:red;">Remove</a></td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="3"></td>
            <td>Total</td>
            <td>$ <?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
        <?php
        }
        }
//        else {
//            echo '
//            <div style="width:60%;float: left;margin: 20px 20% 20px 20%">
//                <input required class="btn btn-primary btn-lg btn-block" type="submit" name="toShop" value="Add Items To Your Order!"
//                onclick="window.location.href=\'catalog.php\'">
//            </div>
//            ';
//        }
        ?>

    </table>
    <div style="width:60%;float: left;margin: 20px 20% 20px 20%">
        <input required class="btn btn-primary btn-lg btn-block" type="submit" name="toShop" value="Add Items To Your Order!"
               onclick="window.location.href='catalog.php'">
    </div>
</div>
<div style="width:100%";>
    <h2 style="text-align: center;margin: 10px">Billing Info</h2>
    <?php
    if($_SESSION['customerID']){
        $ID = trim($_SESSION['customerID']);
        $billingQuery = "SELECT `fName`, `lName`, `address` FROM customer WHERE customerID =" . $ID;
        $result = mysqli_query($db, $billingQuery);
//        $card = "";                     //TODO test $card
//        $card = "XXXX-XXXX-XXXX-1111";  // test $card
        if($result){
            while($row = mysqli_fetch_array($result)){
                echo '<table style="width:80%;float: left;margin: auto 10% auto 10%" class="table">';
                echo '<tr><thead class="thead-dark"><th>First Name</th><th>Last Name</th><th>Address</th><th>Card #</th></thead></tr><tr>';
                echo '<td>' . $row['fName'] . '</td><td>' . $row['lName'] .'</td>';
                echo '<td>' . $row['address'] . '</td>';
                if(!empty($card))
                    echo '<td>' . $card . '</td>';
                else
                    echo '<td class="table-danger">No card on file</td>';
                echo '</tr></table>';
            }
        }
    }
    ?>

</div>
<form action="shoppingCart.php" method="POST">
    <div style="width:100%">
        <div style="width:60%;float: left;margin: 20px 20% auto 20%">
            <input required class="btn btn-primary btn-lg btn-block" type="submit" name="checkout" value="Checkout!">
        </div>
    </div>
</form>
<?php
include('includes/footer.html');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_SESSION["cart"])){
        date_default_timezone_set('America/Chicago');
        $date = date('Y-m-d');
        $customerID = $_SESSION["customerID"];
        $orderQuery = "INSERT INTO `orders`(`orderDate`, `customerID`, `total`) VALUES ('$date', '$customerID', '$total')";
        if($orderResult = mysqli_query($db, $orderQuery)){
            $getOrderID = "SELECT DISTINCT orderID FROM orders WHERE customerID = '$customerID'";
            if($getOrderIDResult = mysqli_query($db, $getOrderID)){
                //get the orderID
                while($row = mysqli_fetch_array($getOrderIDResult)){
                    $orderID = $row['orderID'];
                }

                //loop through items and insert inventoryID
                foreach($_SESSION["cart"] as $keys => $values)
                {
                    $inventoryID = $values["itemID"];
                    $orderItemQuery = "INSERT INTO orderItem(orderID, inventoryID) VALUES ('$orderID', '$inventoryID')";
                    $orderItemResult = mysqli_query($db, $orderItemQuery);
                }

                //if inserted orderItems into database
                if($orderItemResult){
                    echo '<script>alert("it fuckin worked")</script>';
                    header("Location: catalog.php");
                }else{
                    echo '<script>alert("orderItems did not insert")</script>';
                }
            }else{
                echo 'Get Order ID did not work';
            }
        }else{
            echo 'Order Query did not work ', $_SESSION["customerID"];
        }
    }else{
        echo '<script>alert("shopping cart empty")</script>';
    }
 }
