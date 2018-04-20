<?php
$page_title = 'Catalog';
session_start();
include('includes/header.html');
require('connect.php');

//check if user is logged in
if(!isset($_SESSION['type']) && $_SESSION['type'] == ""){
    header('Location: login.php'); //redirect URL   
}

?>
<div class="search">
    <input type="search" class="searchBar" size="100px" style="border:1px solid #333; margin:20px;" onkeyup="filterSearch()">
    <button>Search</button>
</div>

<div class="items">
    <?php
        $itemQuery = "SELECT * FROM inventory WHERE quantity > 0";
        if ($ItemResult = mysqli_query($db, $itemQuery)) {

            echo '<div style="display:flex; flex-wrap:wrap;">';

            while($itemRow = mysqli_fetch_array($ItemResult)){

                $storeQuery = "SELECT  DISTINCT s.storeName FROM store s, storeInventory x, inventory i WHERE s.storeID = x.storeID AND {$itemRow['inventoryID']} = x.inventoryID";
                 
                $storeResult = mysqli_query($db, $storeQuery);
                
                echo '<div class="card" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; margin:20px; width:250px;">';
                    echo '<form method="post" action="">';
                        echo '<h5 class="albumName">Album Name: '.$itemRow['albumName'].'</h5>';
                        echo '<h5 class="artist"> Artist: '. $itemRow['artistName'] .'</h5>';
                        echo '<h5> Price: $'. $itemRow['cost'] .'</h5>';
                        echo '<h5> Qty Available: '. $itemRow['quantity'] .'</h5>';
                        echo '<input type="text" name="quantity" class="form-control" value="1" />';
                        echo '<input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />';
                        echo '<select name="storeDropDown">';
                            while($storeRow = mysqli_fetch_array($storeResult)){
                                echo '<option value="' . $storeRow['storeName'] .'">' . $storeRow['storeName'] .'</option>';
                            }       
                        echo '</select>';
                        echo '<hr>';
                    echo '</form>';
                echo '</div>';
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
                const elementName = element.querySelectorAll('.albumName');
                const htmlTerm = elementName[0].innerText;
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