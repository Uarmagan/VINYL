<?php
    session_start();
    include('includes/header.html');
    $page_title = 'Update Inventory page';
    require('connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        
        if(empty($_POST['albumName'])){
            $errors[] = 'you forgot to enter your Album Name';
        }else{
            $albumName = trim($_POST['albumName']);
        }

        if(empty($_POST['artistName']))
        {
            $errors[] = "You forgot to enter Artist Name";
        }else{
            $artistName = trim($_POST['artistName']);
        }

        if(empty($_POST['cost']))
        {
            $errors[] = "You forgot to Enter Cost";
        }else{
            $cost = trim($_POST['cost']);
        }

        if(empty($_POST['qty'])){
            $errors[] = "you forgot to enter Quantity";
        }else{
            $qty = trim($_POST['qty']);
        }

        $inventoryID = $_SESSION['updateID'];
        $updateQuery = "UPDATE inventory SET albumName = '$albumName', artistName = '$artistName', cost = '$cost', quantity = '$qty' WHERE inventoryID = '$inventoryID'";

        if($updateResult = mysqli_query($db, $updateQuery)){
            echo '<script>window.location="inventory.php"</script>';
        }else{
            echo 'item update failed';
        }


    }

echo '<form method="POST" style="margin-left:20px;">';
         
        $inventoryID = $_SESSION['updateID'];
        $itemQuery = "SELECT * FROM inventory WHERE inventoryID = '$inventoryID'";
        if ($ItemResult = mysqli_query($db, $itemQuery)) {
            while($itemRow = mysqli_fetch_array($ItemResult)){
                ?>
        <label for="albumName">Album Name</label>
        <input required type="text" name="albumName" value="<?php echo $itemRow["albumName"]; ?>">
        <label for="artistName">Artist Name</label>
        <input required type="text" name="artistName" value="<?php echo $itemRow["artistName"]; ?>">
        <label for="albumName">Cost</label>
        <input required type="number" name="cost" value="<?php echo $itemRow["cost"]; ?>">
        <label for="albumName">Quantity</label>
        <input required type="number" name="qty" value="<?php echo $itemRow["quantity"]; ?>">
        <input type ="submit">

        <?php
            }
        }else{
            echo 'error with query';
        }
        ?>
    </form>
<?php include('includes/footer.html');
?>