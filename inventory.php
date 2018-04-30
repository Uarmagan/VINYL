<?php

session_start();
$page_title = 'inventory page';
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
        $id = $_GET["id"];
        $dq = "DELETE storeInventory FROM storeInventory INNER JOIN inventory ON storeInventory.inventoryID = inventory.inventoryID WHERE storeInventory.inventoryID = '$id'";
        if($deleteForKey = mysqli_query($db, $dq)){
            $deleteQuery = "DELETE FROM inventory WHERE inventoryID = '$id'";
            if($deleteResult = mysqli_query($db, $deleteQuery)){
                echo '<script>window.location="inventory.php"</script>';
                echo 'it worked!';
            }else{
                echo 'that did not work';
            }
        }else{
            echo 'did not delete foreign key';
        }
      }

      if($_GET["action"] == "update")
      {
        if(isset($_SESSION['updateID'])){
            unset($_SESSION['updateID']);
        }
        $_SESSION['updateID'] = $_GET["id"];
        echo '<script>window.location="ownerUpdate.php"</script>';

      }
 }
?>

<h1 style="width:80%; margin-left:5%; margin-bottom:-10px; margin-top:10px;">inventory</h1>
<hr>
<div style="width:80%; margin-left:5%;">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Album Name</th>
        <th scope="col">Artist Name</th>
        <th scope="col">Cost</th>
        <th scope="col">Quantity</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $storeID = $_SESSION['storeID'];
        $invQuery = "SELECT * FROM storeInventory s, inventory i WHERE s.inventoryID = i.inventoryID AND s.storeID = '$storeID'";
        
        if($invResult = mysqli_query($db, $invQuery)){

            $count = 1;
            while($invRow = mysqli_fetch_array($invResult)){ ?>
                <tr>
                <th scope="row"><?php echo $count ?></th>
                <td><?php echo $invRow['albumName'] ?></td>
                <td><?php echo $invRow['artistName'] ?></td>
                <td><?php echo $invRow['cost'] ?></td>
                <td><?php echo $invRow['quantity'] ?></td>
                <td><a href="inventory.php?action=update&id=<?php echo $invRow['inventoryID']; ?>" style="color:green;">Update</a></td>
                <td><a style="color:red;" href="inventory.php?action=delete&id=<?php echo $invRow['inventoryID']; ?>">Delete</a></td>
                </tr>
                <?php
                $count++;
            }
        }else{
            echo '<h6>You do not have any inventory. Add some Vinyl!</h6>';
        } 
    ?>
    </tbody>
    </table>
    <a class="btn btn-success" href=ownerAdd.php>Add Inventory</a>
</div>

<?php

include('includes/footer.html');
?>