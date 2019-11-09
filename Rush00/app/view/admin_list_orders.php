<?php if ($_SESSION['admin'] == 1) : ?>
	<div class="admin_middle">
		<h1>Commandes passées</h1>
		<br />

		<?php
			require('config/db.php');
			$orders = mysqli_query($db, "SELECT * FROM orders");
			$orders = mysqli_fetch_all($orders);
			foreach ($orders as $var) : ?>
			<div class="list_adm_order middle">
				ID = <?= $var[0]?><br/>
				Ref = <?= $var[1]?><br/>
				Id du client = <?= $var[2]?><br/>
				Date = <?= $var[3]?><br/>
				Articles = <?= $var[4]?><br/>
			</div>
		<?php endforeach; ?>

	</div>
<?php endif ?>
<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
	header('Location: index.php');
}
?>