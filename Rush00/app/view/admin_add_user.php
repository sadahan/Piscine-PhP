<?php if($_SESSION['admin'] == 1): ?>
<div id="container-view" class="admin_middle">
        <div class="form_box">
            <h1>Ajouter un utilisateur</h1>
            <form method="post" action="">
				<div class="form-group">
                    <label>adresse mail</label>
                    <input type="text" class="form-control" name="mail" value="">
                </div>
                <div class="form-group">
                    <label>nom</label>
                    <input type="text" class="form-control" name="nom" value="">
                </div>
                <div class="form-group">
                    <label>prénom</label>
                    <input type="text" class="form-control" name="prénom" value="">
				</div>
				<div class="form-group">
                    <label>mot de passe</label>
                    <input type="password" class="form-control" name="passwd" value="">
                </div>
				<div class="form-group">
                    <label>confirmez mot de passe</label>
                    <input type="password" class="form-control" name="passwd" value="">
                </div>
				<br />
                <button type="submit" name="submit" class="btn-primary" value="OK">Valider</button>
            </form>
		</div>
</div>
<?php endif;?>