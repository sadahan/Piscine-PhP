<?php
if (isset($_GET['id']))
{
    require('app/model/admin.php');
    sup_user($_GET['id']);
}
    
?>
<?php if($_SESSION['admin'] == 1): ?>
<div id="container-view" class="admin_middle">
        <div class="form_box">
            <h1>Supprimer un utilisateur</h1>
            <form method="get" action="index.php?view=sup_user">
                <div class="form-group">
					<label>id de l'utilisateur à supprimer</label>
					<br />
                    <input type="text" class="form-control" name="id" value="">
				</div>
				<br />
                <button type="submit" name="submit" class="btn-primary" value="OK">Valider</button>
            </form>
		</div>
</div>
<?php endif;?>