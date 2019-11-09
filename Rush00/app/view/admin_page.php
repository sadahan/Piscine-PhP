<?php if ($_SESSION['admin'] == 1) : ?>
		<div class="admin_middle">
			<!-- all users -->
			<h3>Commandes</h3>
			<p class="button_admin"><a href="index.php?view=list_orders" title="check_orders"> Vérifier les commandes </a></p><br />
			<h3>Gestion des articles</h3>
			<p class="button_admin"><a href="index.php?view=add_new_item" title="add_item"> Ajouter un article </a></p><br />
			<p class="button_admin"><a href="index.php?view=modif_item" title="mod_item"> Modifier un article </a></p><br />
			<p class="button_admin"><a href="index.php?view=sup_item" title="sup_item"> Supprimer un article </a></p><br />
			<h3>Gestion des catégories</h3>
			<p class="button_admin"><a href="" title="add_cat"> Ajouter une catégorie </a></p><br />
			<p class="button_admin"><a href="" title="mod_cat"> Modifier une catégorie </a></p><br />
			<p class="button_admin"><a href="" title="sup_cat"> Supprimer une catégorie </a></p><br />
			<!-- if admin only -->
			<h3>Gestion des utilisateurs</h3>
			<p class="button_admin"><a href="../../index.php?view=add_user" title="mod_user"> Ajouter un utilisateur </a></p><br />
			<p class="button_admin"><a href="../../index.php?view=sup_user" title="sup_user"> Supprimer un utilisateur</a></p><br />
		</div>
<?php endif;?>
<?php 
	if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
		header('Location: index.php');
	}
?>
