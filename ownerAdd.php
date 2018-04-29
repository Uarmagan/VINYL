
    <?php
       session_start();
       include('includes/header.html');
       
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

            if(empty($_POST['qty'])){
                $errors[] = "you forgot to enter Quantity";
            }else{
                $qty = trim($_POST['qty']);
            }

            if(count($errors)<1 ){
                
             $q = "INSERT INTO inventory(albumName, artistName, cost, quantity)VALUES('$albumName', '$artistName', '$cost', '$qty')";   
             $result = mysqli_query($db, $q);   
            
              
             if($result){
                 echo"added";
                
                $getInventoryID = "SELECT inventoryID FROM inventory WHERE albumName = '$albumName' AND artistName = '$artistName' AND cost = '$cost' AND quantity = '$qty'";
                $runGetInventoryID = mysqli_query($db, $getInventoryID);
                if($runGetInventoryID){
                    $getID = mysqli_num_rows($runGetInventoryID);
                    if($getID > 0){
                        $row = mysqli_fetch_assoc($runGetInventoryID);
                        
                        $inventoryID = $row['inventoryID'];
                        echo "InventoryID: $inventoryID";
                        
                        $storeID = $_SESSION['storeID'];
                        echo "<br> storeID:  $storeID <br>";
                        $qStore = "INSERT INTO storeInventory(storeID, inventoryID)VALUES('$storeID','$inventoryID')";
                        $rQStore = mysqli_query($db, $qStore);
                        
                        if($rQStore){
                            header("Location: inventory.php");
                        }else{
                            echo"FAIL STOREINVENTORY<br>";
                        }
                        
                    }
                }


                 
             }



            }else{
                for($i =0; $i <= count($errors)-1; $i++)
                {
                    echo $errors[$i]."<br>";
                }
            }
        }
    ?> 
    <form method="POST">
        <br><br>
        
        <input require type="text" name="albumName" placeholder="Album Name" ><br><br>
        <input require type="text" name="artistName" placeholder="Artist Name"><br><br>
        <input require type="number" name="cost" placeholder="Cost"><br><br>
        <input require type="number" name="qty" placeholder="Quantity"><br><br>

        <input type ="submit" >
    </form>
    <?php include('includes/footer.html');

