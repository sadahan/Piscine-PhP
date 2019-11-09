<?php
require('app/model/product_class.php');
?>
<div class="middle">
	<h2>Mon panier</h2>

	<?php
	if (!isset($_SESSION['basket']))
		echo "Votre panier est vide\n.";
	else {
		foreach ($_SESSION['basket'] as $key => $VALUE) {
			$data = add_product_info($VALUE['ref']);
			$data = mysqli_fetch_assoc($data);
			$_SESSION['basket'][$key]['price'] = $data['price'];
			echo "<div class='item-basket'>";
			echo "<a href=\"\"><img class=\"img_mid\" src=\"" . $data['src_img'] . "\"/></a>";
			echo "<p>Produit :" . " " . $data['name'] . "<br />";
			echo "Taille :" . " " . $VALUE['size'] . "<br />";
			echo "Couleur :" . " " . $VALUE['color'] . "<br />";
			echo "Quantité :" . " " . $VALUE['quantity'] . "<br />";
			echo "Prix :" . " " . $data['price'] . "&#8364<br /></p>";
			echo "</div>";
			echo "<form method='post' action='./app/controler/remove_item.php?ref=" . $data['ref'] . "'><button type='submit' name='submit' class='btn-order remove_item' value='OK'>Supprimer</button></form>";
		}
	}
	?>
	<div class="confirm_order">
		<hr />
		<p>Prix total :
			<?php
			$total_price = 0;
			if (isset($_SESSION['basket']))
				foreach ($_SESSION['basket'] as $value) {
					$total_price += (int) $value['quantity'] * (int) $data['price'];
				}
			echo $total_price;
			?>
			&#8364</p>
		<?php if (array_key_exists('error', $_SESSION)) : ?>
			<script>
				document.write("<?= implode('<br>', $_SESSION['error']); ?>");
			</script>
		<?php unset($_SESSION['error']);
		endif; ?>
		<form method="post" action="./app/controler/order.php">
			<button type="submit" name="submit" class="btn-order" value="OK">Commander</button>
		</form>
	</div>
</div>

<?php
unset($_SESSION['error']);
?>