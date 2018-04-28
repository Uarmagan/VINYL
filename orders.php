<?php
require_once('connect.php');
session_start();
$page_title = 'Orders page';
include('includes/header.html');
?>

<h1 style="width:80%; margin-left:5%; margin-bottom:-10px; margin-top:10px;">Orders</h1>
<hr>
<table class="table" style="width:80%; margin-left:5%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">order Date</th>
      <th scope="col">total</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $customerID = $_SESSION['customerID'];
    $orderQuery = "SELECT * FROM orders WHERE customerID = '$customerID'";
    if($orderResult = mysqli_query($db, $orderQuery)){
        $count = 1;
        while($orderRow = mysqli_fetch_array($orderResult)){
            echo '<tr>';
            echo '<th scope="row">'. $count .'</th>';
            echo '<td>' .$orderRow['orderDate'] . '</td>';
            echo '<td>$' .$orderRow['total'] . '</td>';
            echo '</tr>';
            $count++;
        }
    }else{
        echo '<h4>You do not have any orders in your cart</h4>';
    } 
?>
  </tbody>
</table>
<?php

include('includes/footer.html');