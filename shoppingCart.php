<?php
session_start();
include('includes/header.html');
?>
<h3>Order Details</h3>
<table style="width:600px;">
    <tr>
        <th>Album Name</th>
        <th>Artist</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    <?php
    if(!empty($_SESSION["cart"]))
    {
        $total = 0;
        foreach($_SESSION["cart"] as $keys => $values)
        {
    ?>
    <tr>
        <td><?php echo $values["albumName"]; ?></td>
        <td><?php echo $values["artist"]; ?></td>
        <td><?php echo $values["quantity"]; ?></td>
        <td>$ <?php echo $values["cost"]; ?></td>
        <td>$ <?php echo number_format((float) $values["quantity"] * (float) $values["cost"], 2); ?></td>
    </tr>
    <?php
            $total = intval($total + ((float)$values["quantity"] * (float)$values["cost"]));
        }
    ?>
    <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
include('includes/footer.html');
