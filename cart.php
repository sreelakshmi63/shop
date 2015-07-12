<?php
session_start();
require 'connect.php';
require 'item.php';
$result = mysqli_query($con, 'SELECT * FROM product where id='$_GET['id']);
$product = mysqli_fetch_object($result);
if(isset($_GET['id'])) {
	$item = new Item();
	$item->id = product->id;
	$item->name = product->name;
	$item->price = product->price;
	$item->quantity = 1;
	$_SESSION['cart'][] = $item;
	
}
?>

<table>
	<tr
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Subtotal</th>
	</tr>
	<?php
	$cart = unserialize(serialize($_SESSION['cart'])) 
	for($i=0; $i<count($cart); $i++) {
	?>
	<tr>
	<td><?php echo $cart[$i]->id; ?></td>
	<td><?php echo $cart[$i]->name; ?></td>
	<td><?php echo $cart[$i]->price; ?></td>
	<td><?php echo $cart[$i]->quantity; ?></td>
	<td><?php echo $cart[$i]->quantity * $cart[$i]->price; ?></td>
	</tr>
	



	<?php } ?>
</table>
