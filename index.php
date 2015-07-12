<?php
require 'connect.php';
$result = mysqli_query($con, 'SELECT * FROM product WHERE quantity > 0');
?>

<table cellpadding="2" cellspacing="2" border="0">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Buy</th>

	</tr>
	<?php while($product = mysqli_fetch_object($result)) { ?>
	<tr>
		<td><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->price; ?></td>
		<td><a href="cart.php?id=<?php echo $product->id; ?>">Buy Now</a></td>
	</tr>
	<?php } ?>
</table>
