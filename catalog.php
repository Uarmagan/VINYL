<?php
$page_title = 'Catalog';
include('includes/header.html');
require('connect.php');
?>

<div class="search">
    <input type="searchBar" size="100px" style="border:1px solid #333; margin-left:20px;">
    <button>Search</button>
</div>

<div class="items">
    <?php
        $query = "SELECT * FROM inventory";
        if ($result = mysqli_query($db, $query)) {

            echo '<div style="display:flex; flex-wrap:wrap;">';

            while($row = mysqli_fetch_array($result)){
                echo '<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; margin:20px; width:200px;">';
                    echo '<form method="post" action="">';
                        echo '<h4>Album Name: '.$row['albumName'].'</h4>';
                        echo '<h4> Artist:'. $row['artistName'] .'</h4>';
                        echo '<h4> Price: $'. $row['cost'] .'</h4>';
                        echo '<h4> Qty Available: $'. $row['quantity'] .'</h4>';
                        echo '<input type="text" name="quantity" class="form-control" value="1" />';
                        echo '<input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />';
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


<?php
include('includes/footer.html');