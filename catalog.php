<?php
$page_title = 'Catalog';
include('includes/header.html');
require('connect.php');
?>

<div class="search">
    <input type="searchBar">
    <button>Search</button>
</div>

<div class="items">
    <?php
        $query = "SELECT * FROM inventory";
        if ($result = mysqli_query($db, $query)) {
            
            echo "<table border='1'>
            <tr>
            <th>Album Name</th>
            <th>artistName</th>
            <th>Cost</th>
            <th>Quantity</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['albumName'] . "</td>";
                echo "<td>" . $row['artistName'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_close($db);
        }
    ?>
</div>


<?php
include('includes/footer.html');