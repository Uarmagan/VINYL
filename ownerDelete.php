 <?php
    session_start();
    //include('includes/header.html');
    $page_title = 'Delete Inventory';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        require('connect.php');
        

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

        if(empty($_POST['yearRelease'])){
            $errors[] = "you forgot to enter the YearRelease";
        }else{
            $yearRelease = trim($_POST['yearRelease']);
        }

        if(empty($_POST['qty'])){
            $errors[] = "you forgot to enter Quantity";
        }else{
            $qty = trim($_POST['qty']);
        }

        if(count($errors)<1 ){

            $q = "SELECT * FROM inventory WHERE albumName = '$albumName' AND artistName = '$artistName' AND cost = '$cost' AND quantity = '$qty'";
            $qr = mysqli_query($db, $q);

            if($qr){
                echo"past 1 <br>";
                $getID = mysqli_num_rows($qr);
                if($getID > 0){
                    echo"past 2 <br>";
                    $row = mysqli_fetch_assoc($qr);
                    $inventoryID = $row['inventoryID'];
                    $storeID = $_SESSION['storeID'];
                    
                    echo"StoreID: $storeID <br> invenID: $inventoryID<br>";

                    $sq = "SELECT storeInventoryID FROM storeInventory where inventoryID = '$inventoryID' AND storeID = '$storeID'";
                    $sqr = mysqli_query($db, $sq);
                    if($sqr){
                        echo"past 3 <br>";
                        $g = mysqli_fetch_assoc($sqr);
                        $si = $g['storeInventoryID'];

                        $d= "DELETE FROM storeInventory Where storeInventoryID = '$si'";
                        $dr = mysqli_query($db, $d);
                        if($dr){
                            echo"past 4 <br>";
                            $b = "DELETE FROM inventory WHERE inventoryID = '$inventoryID'";
                            $br = mysqli_query($db, $b);
                            if($br){
                                echo"past 5 <br>";
                                echo "DELETED!<br>";
                            }
                        }
                        
                    }
                }    
            }else{
                echo"No Such Inventory!";
            }


        }else{
            echo"Errors!<br>";
        }
    
    
    
    
    
    
    
    }

?>

    <form method="POST">
        <br><br>
        
        <input require type="text" name="albumName" placeholder="Album Name"><br><br>
        <input require type="text" name="artistName" placeholder="Artist Name"><br><br>
        <input require type="number" name="cost" placeholder="Cost"><br><br>
        <input require type="number" name="yearRelease" placeholder="Year Release"><br><br>
        <input require type="number" name="qty" placeholder="Quantity"><br><br>

        <input type ="submit" >
    </form>
    <?php include('includes/footer.html');