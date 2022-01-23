<div class="container">
    <form action="utils/insert.php" method="get">
        <fieldset class="border p-3">
            <legend class="w-auto text-big">Registrazione Utente Base</legend>
            <input type="hidden" name="IdRuolo" value="5">
            <input type="hidden" name="codiceInsert" value="fornitore">
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="psw">Password : </label>
                <input type="password" class="form-control" name="psw" id="psw" placeholder="Password">
            </div>
        </fieldset>
        <fieldset class="border p-3">
            <legend class="w-auto text-big">Registrazione Venditore</legend>
            <div class="form-group">
                <label for="p_iva">Partita IVA (16 caratteri) : </label>
                <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Partita IVA">
            </div>
            <div class="form-group">
                <label for="ragione_sociale">Ragione Sociale : </label>
                <input type="text" class="form-control" name="ragione_sociale" id="ragione_sociale" placeholder="Ragione Sociale">
            </div>
            <div class="form-group">
                <label for="via">Via : </label>
                <input type="text" class="form-control" name="via" id="via" placeholder="Via">
            </div>
            <div class="form-group">
                <label for="numero_civico">Numero Civico : </label>
                <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
            </div>
            <div class="form-group">
                <label for="citta">Citt&agrave; : </label>
                <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
            </div>
        </fieldset>
        <button type="submit" class="custom-btn btn-6 text-small">
            Registrazione
        </button>
    </form>
</div>
<section class="container top-40 gfx-link">
    Clicca <a href="index.php">qui</a> per tornare alla homepage
</section>