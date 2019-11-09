<?php if($_SESSION['admin'] == 1): ?>
<div id="container-view" class="admin_middle">
        <div class="form_box">
            <h1>Ajouter un article</h1>
            <form method="post" action="app/controler/adm_add_item.php">
                <div class="form-group">
                    <label>nom</label>
                    <input type="text" class="form-control" name="nom" value="">
                </div>
                <div class="form-group">
                    <label>référence</label>
                    <input type="text" class="form-control" name="référence" value="">
				</div>
				<div class="form-group">
                    <label>taille</label>
                    <input type="number" class="form-control" name="taille" value="">
                </div>
                <div class="form-group">
                    <label>couleur</label>
                    <input type="text" class="form-control" name="couleur" value="">
                </div>
                <div class="form-group">
                    <label>prix</label>
                    <input type="number" class="form-control" name="prix" value="">
				</div>
				<div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" name="description" value="">
				</div>
				<div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control" name="img_upload" value="">
				</div>
				<div class="form-group">
                    <label>catégorie</label>
                    <input type="text" class="form-control" name="catégorie" value="">
				</div>
				<div class="form-group">
                    <label>stock</label>
                    <input type="number" class="form-control" name="stock" value="">
				</div>
				<br />
                <button type="submit" name="submit" class="btn-primary" value="OK">Valider</button>
            </form>
		</div>
</div>
<?php endif; ?>
<?php 
	if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1){
		header('Location: index.php');
	}
?>
