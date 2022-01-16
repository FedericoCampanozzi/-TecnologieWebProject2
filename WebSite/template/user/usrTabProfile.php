<div class="row">
    <div class="col-6">
        <img id="loadImg" class="usr-profile-image" alt="" src="<?php echo UPLOAD_USER_DIR . $_SESSION["usr_image"]; ?>">
        <form action="utils/update.php" method="post" enctype="multipart/form-data" id="formLoadImage">
            <input type="hidden" name="codiceUpdate" value="user_img">
            <input class="hidden-field" type="file" name="Immagine" id="Immagine" title="Immagine" accept="image/*" />
        </form>
    </div>
    <div class="col-6">
        <form action="utils/update.php" method="post">
            <input type="hidden" name="codiceUpdate" value="password">
            <div class="form-group">
                <label for="old_psw">Vecchia Password:</label>
                <input type="password" class="form-control" id="old_psw" name="old_psw" placeholder="Old Password">
            </div>
            <div class="form-group">
                <label for="new_psw">Nuova Password:</label>
                <input type="password" class="form-control" id="new_psw" name="new_psw" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="conf_psw">Conferma Nuova Password:</label>
                <input type="password" class="form-control" id="conf_psw" name="conf_psw" placeholder="Confirm Password">
            </div>
            <button type="submit" class="custom-btn btn-5">Cambia</button>
        </form>
    </div>
</div>
<div class="row h-50">
    <div class="col-4">
        <p>Nome : <?php echo $_SESSION["usr_nome"]; ?></p>
    </div>
    <div class="col-4">
        <p>Cognome : <?php echo $_SESSION["usr_cognome"]; ?></p>
    </div>
    <div class="col-4">
        <p>Data di nascita : <?php echo $_SESSION["usr_dn"]; ?></p>
    </div>
</div>
<form action="utils/update.php" method="post">
    <input type="hidden" name="codiceUpdate" value="user">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION["usr_un"]; ?>" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["usr_email"]; ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="tell">Telefono : </label>
                <input type="text" class="form-control" name="tell" id="tell" value="<?php echo $_SESSION["usr_tell"]; ?>" />
            </div>
        </div>
        <div class="col-8">
            <button type="submit" class="custom-btn btn-5 top-40">Aggiorna</button>
        </div>
    </div>
</form>