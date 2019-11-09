<?php
session_start();
?>

<html>

<head>
	<meta charset="utf-8">
	<title>Shoosing.com</title>
	<link href="./public/css/site.css" rel="stylesheet">
	<link href="./public/css/login.css" rel="stylesheet">
	<link href="./public/css/basket.css" rel="stylesheet">
	<link href="./public/css/product_page.css" rel="stylesheet">
	<link href="./public/css/admin_page.css" rel="stylesheet">
</head>

<body>
	<nav>
		<div>
			<?php if ($_SESSION['admin'] == 1) : ?>
				<p class="button"><a href="./index.php?view=admin" title="connectez-vous">ADMIN</a></p>
			<?php endif; ?>
			<?php if (!isset($_SESSION['token_connect'])) : ?>
				<p class="button"><a href="./index.php?view=sign_in" title="connectez-vous">Log in</a></p>
				<p class="button"><a href="./index.php?view=sign_up" title="inscrivez-vous">Sign in</a></p>
			<?php endif; ?>
			<?php if (isset($_SESSION['token_connect'])) : ?>
				<p class="button"><a href="./app/controler/controller_log_out.php" title="Log_out">Log out</a></p>
			<?php endif; ?>
			<a href="index.php?view=basket" title="vos achats"><img id="panier" alt="panier" src="https://cdn.pixabay.com/photo/2015/04/18/07/40/shopping-cart-728408_960_720.png" /></a>
			<p class="button"><a href="./index.php?view=home" title="Accueil">Accueil</a></p>
		</div>
		<br />
		<div id="banniere">
			<h1>Shoosing</h1>
		</div>
	</nav>


	<?php require('./app/controler/controller.php'); ?>


	<footer>
		<a href="index.php?view=contact" title="contactez-nous">
			<p>Contact</p>
		</a>
		<a href="index.php?view=cgv" title="Conditions générales de vente">
			<p>Conditions générales de vente</p>
		</a>
		<a href="index.php?view=faq" title="FAQ">
			<p>FAQ</p>
		</a>
	</footer>
</body>

</html>