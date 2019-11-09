
<div id="container-view">
        <div class="form_box">
            <h1>S'inscire</h1>

            <?php if (array_key_exists('error', $_SESSION)): ?>
                        <script>
                            document.write("<?= implode('<br>', $_SESSION['error']); ?>");
                        </script>
            <?php unset($_SESSION['error']); endif; ?>

            <?php if (array_key_exists('success', $_SESSION)): ?>
                        <script>
                            document.write("Votre compte a été créer avec succes !");
                        </script>
            <?php unset($_SESSION['error']); endif; ?>

            <form method="post" action="./app/controler/create_account.php">
                <div class="form-group">
                    <label>Adresse mail</label>
                    <input type="text" class="form-control" name="mail" value="<?= isset($_SESSION['input']['mail']) ? $_SESSION['input']['mail'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="name" value="<?= isset($_SESSION['input']['name']) ? $_SESSION['input']['name'] : '' ?>" >
				</div>
				<div class="form-group">
                    <label>Prénom</label>
                    <input type="text" class="form-control" name="surname" value="<?= isset($_SESSION['input']['name']) ? $_SESSION['input']['name'] : '' ?>" >
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="passwd" value="<?= isset($_SESSION['input']['passwd']) ? $_SESSION['input']['passwd'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Confirmer mot de passe</label>
                    <input type="password" class="form-control" name="confirm_passwd" value="<?= isset($_SESSION['input']['confirm_passwd']) ? $_SESSION['input']['confirm_passwd'] : '' ?>">
				</div>
				<div class="form-group">
                    <label>Adresse</label>
                    <input type="text" class="form-control" name="adresse" value="<?= isset($_SESSION['input']['passwd']) ? $_SESSION['input']['passwd'] : '' ?>">
				</div>
				<br />
				<div class="form-group">      
                    <input type="checkbox" class="check_box" name="CGV" value="OK" >
					<label>Confirmez-vous avoir lu les <a href="" title="Conditions générales">conditions générales de vente</a> ?</label>
				</div>
                <button type="submit" name="submit" class="btn-primary" value="OK">Valider</button>
            </form>
        </div>
    </div>

<?php

unset($_SESSION['input']);
unset($_SESSION['error']);
unset($_SESSION['success']);

?>