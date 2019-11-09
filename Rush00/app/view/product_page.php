 <?php
	require('app/model/product_class.php');
	$data = add_product_info($_GET['ref']);
	$data = mysqli_fetch_assoc($data);
?>
<div class="product_desc">
		<h2><?php echo $data['name']; ?></h2>
	<a href="#"><img class="img_prod" alt="t-shirt" src="<?php echo $data['src_img']; ?>" /></a>
	<p>Prix <?php echo $data['price']; ?>&#8364</p>
	<form method="post" action="./app/controler/add_to_basket.php?ref=<?= $data['ref']?>">
	<p>Choisissez la couleur : <select name="color"><option>noir<option>blanc<option>marron</select></p>
	<p>Choisissez votre taille : <select name="size"><option>37<option>38<option>39<option>40<option>41<option>42</select></p>
	<p>Quantité souhaitée : <select name="quantity"><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9</select></p>
	<?php if($data['stock'] > 0):?>
		<button type="submit" name="add_to_basket" class="btn-basket" value="OK">Ajouter au panier</button>
	<?php endif;?>
	<?php if($data['stock'] <= 0):?>
 		Rupture de stock, sorry!
	<?php endif;?>
</form>
</div>