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

        if(empty($_POST['nqty'])){
            $errors[] = "you forgot to enter Quantity";
        }else{
            $nqty = trim($_POST['nqty']);
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
                    $cQTY = $row['quantity'];
                    $nAmout = $cQTY + $nqty;
                    
                    $u = "UPDATE inventory SET quantity = '$nAmout' Where inventoryID = '$inventoryID'";
                    $ur = mysqli_query($db,$u);

                    if($ur){
                        echo"UPDATED!!";
                    }





                }    
            }else{
                echo"No SUCH Inventory";
            }
        }
    }
 
 
 










?>

<form method="POST">
        <br><br>
        
        <input require type="text" name="albumName" placeholder="Album Name"><br><br>
        <input require type="text" name="artistName" placeholder="Artist Name"><br><br>
        <input require type="number" name="cost" placeholder="Cost"><br><br>
        <input require type="number" name="yearRelease" placeholder="Year Release"><br><br>
        <input require type="number" name="qty" placeholder="Current Quantity"><br><br>
        <input require type="number" name="nqty" placeholder="Add Quantity Amount"><br><br>
        <input type ="submit" >
    </form>
<?php include('includes/footer.html');
