<?php
session_start();
$page_title = 'Catalog';
include('includes/header.html');
require('connect.php');

//check if user is logged in
if(!isset($_SESSION['type']) && $_SESSION['type'] == ""){
    header('Location: login.php'); //redirect URL   
}

if(isset($_POST["addToCart"]))
 {
      if(isset($_SESSION["cart"]))
      {
           $item_array_id = array_column($_SESSION["cart"], "itemID");
           if(!in_array($_GET["id"], $item_array_id))
           {
             $count = count($_SESSION["cart"]);
             $item_array = array(
                    'itemID'               =>     $_GET["id"],
                    'albumName'             =>     $_POST["album"],
                    'artist'            =>     $_POST["artist"],
                    'cost'            =>     $_POST["cost"],
                    'quantity'         =>     $_POST["quantity"],
                    'store'            =>      $_POST["storeDropDown"]

                );
                if($_POST["quantity"] >= 1){
                    $_SESSION["cart"][$count] = $item_array;
                }else{
                    echo '<script>alert("Item less than 0 cannot be added")</script>';
                }
                
           }
           else
           {
                //echo '<script>alert("Item Already Added")</script>';
           }
      }
      else
      {
          $item_array = array(
             'itemID'               =>     $_GET["id"],
             'albumName'             =>     $_POST["album"],
             'artist'            =>     $_POST["artist"],
             'cost'            =>     $_POST["cost"],
             'quantity'         =>     $_POST["quantity"],
             'store'            =>      $_POST["storeDropDown"]
           );
           $_SESSION["cart"][0] = $item_array;
      }
 }

?>

<div class="items" style="width: 90%;margin: auto 5% auto 5% ">
    <input type="search" class="searchBar"  style="border:1px solid #333; width: 60%; margin: 20px 20% auto 20%" placeholder=" Search by Album Name" onkeyup="filterSearch()">
    <?php
        $itemQuery = "SELECT * FROM inventory WHERE quantity > 0";
        if ($ItemResult = mysqli_query($db, $itemQuery)) {

            echo '<div style="display: grid; width: 100%; grid-template-columns: repeat(3, 1fr);">';

            while($itemRow = mysqli_fetch_array($ItemResult)){

                $storeQuery = "SELECT  DISTINCT s.storeName FROM store s, storeInventory x, inventory i WHERE s.storeID = x.storeID 
                  AND {$itemRow['inventoryID']} = x.inventoryID";

                $storeResult = mysqli_query($db, $storeQuery);

                echo '<div class="card" style="width: 80%; margin: 20px;">
                        <form method="post" action="catalog.php?action=add&id='.$itemRow["inventoryID"].'">
                            <ul class="list-group">
                                <li class="list-group-item" style="color: white;background-color: black; text-align: center"><strong>Song Name</strong></li>
                                <li class="list-group-item" style="background-color: whitesmoke"> Price: <strong style="float: right">$'. $itemRow['cost'] .'</strong></li>
                                <li class="list-group-item"> Album: <strong style="float: right">'.$itemRow['albumName'].'</strong></li>
                                <li class="list-group-item"> Artist: <strong style="float: right">'. $itemRow['artistName'] .'</strong></li>
                                <li class="list-group-item"> Available: <strong style="float: right">'. $itemRow['quantity'] .'</strong></li>
                                <li class="list-group-item" >
                                    <input style="width: 30%;min-width: 25px;float: left" type="number" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="album" value="'. $itemRow['albumName'] .'"/>
                                    <input type="hidden" name="artist" value="'. $itemRow['artistName'] .'"/>
                                    <input   type="hidden" name="cost" value="'. $itemRow['cost'] .'"/>  
                                    <select required name="storeDropDown" class="custom-select" style="width: 70%;float: left">';
                while($storeRow = mysqli_fetch_array($storeResult)){
                    echo '<option value="' . $storeRow['storeName'] .'">' . $storeRow['storeName'] .'</option>';
                }
                echo '</select>
                    </li>
                    <li style="background-color: whitesmoke; list-style-type: none">';

                    $added = "select * from inventory where inventoryID = ".$itemRow["inventoryID"];
                    $result = mysqli_query($db,$added);
                    $already_added = mysqli_fetch_all($result)[0];
//                    echo '<p>'.implode(" ",$already_added).'</p>';
                    if($already_added)//($itemRow["inventoryID"] != 2)
                        echo '<input type="submit" name="addToCart" class="btn btn-primary" style="margin: 10px 20% 10px 20%;width: 60%;" value="Add to Cart" />';
                    else
                        echo '<input type="submit" name="addToCart" class="btn btn-secondary" style="margin: 10px 20% 10px 20%;width: 60%;" value="Added to Cart" />';
                    echo '</li>
                    </ul>
                    </form>
                    </div>';
            }
            echo '</div>';

            mysqli_close($db);
        }else{
            echo 'No Vinyl Available';
        }
    ?>
</div>

<!-- browser sync script -->
<script>
    function filterSearch() {
        const search = document.querySelector('.searchBar').value;
        const cards = document.querySelectorAll('.card');
        if(search != null){
            cards.forEach( element => {
                const elementName = element.querySelectorAll('.list-group-item');
                const htmlTerm = elementName[2].innerText; //index from li
                const regx = /(?<=: )[^\]]+/g;
                const albumName = htmlTerm.match(regx)[0];

                if (albumName.indexOf(search) > -1) {
                    element.style.display = "";
                } else {
                    element.style.display = "none";
                }
            })
        }
        
    }
</script>
    
<?php
include('includes/footer.html');