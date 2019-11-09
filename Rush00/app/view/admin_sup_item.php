<?php if($_SESSION['admin'] == 1): ?>
<div id="container-view" class="admin_middle">
        <div class="form_box">
            <h1>Supprimer un article</h1>
            <form method="post" action="">
                <div class="form-group">
					<label>référence de l'article à supprimer</label>
					<br />
                    <input type="text" class="form-control" name="référence" value="">
				</div>
				<br />
                <button type="submit" name="submit" class="btn-primary" value="OK">Valider</button>
            </form>
		</div>
</div>
<?php endif;?>