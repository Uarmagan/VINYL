<?php
$page_title = 'Catalog';
include('includes/header.html');
require('connect.php');
?>

<div class="search">
    <input type="searchBar" size="100px" style="border:1px solid #333; margin:20px;">
    <button>Search</button>
</div>

<div class="items">
    <?php
        $query = "SELECT * FROM inventory";
        if ($result = mysqli_query($db, $query)) {

            echo '<div style="display:flex; flex-wrap:wrap;">';

            while($row = mysqli_fetch_array($result)){
                echo '<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; margin:20px; width:250px;">';
                    echo '<form method="post" action="">';
                        echo '<h5>Album Name: '.$row['albumName'].'</h5>';
                        echo '<h5> Artist: '. $row['artistName'] .'</h5>';
                        echo '<h5> Price: $'. $row['cost'] .'</h5>';
                        echo '<h5> Qty Available: '. $row['quantity'] .'</h5>';
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

<!-- browser sync script -->
<script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.23.5'><\/script>".replace("HOST", location.hostname));
    //]]></script>
    
<?php
include('includes/footer.html');