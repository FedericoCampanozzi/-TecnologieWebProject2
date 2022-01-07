<form action="utils/update.php" method="get">
                    <input type="hidden" name="obj_to_update" value="fornitore">
                    <div class="form-group">
                        <label for="via">Via : </label>
                        <input type="text" class="form-control" name="via" id="via" placeholder="<?php echo $_SESSION["ViaF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="numero_civico">Numero Civico : </label>
                        <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="<?php echo $_SESSION["NumeroCivicoF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="citta">Citt&agrave; : </label>
                        <input type="text" class="form-control" name="citta" id="citta" placeholder="<?php echo $_SESSION["CittaF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pecMail">Pec-Mail : </label>
                        <input type="text" class="form-control" name="pecMail" id="pecMail" placeholder="<?php echo $_SESSION["PecMail"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="infoMail">Info-Mail : </label>
                        <input type="text" class="form-control" name="infoMail" id="infoMail" placeholder="<?php echo $_SESSION["InfoMail"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tell">Telefono : </label>
                        <input type="text" class="form-control" name="tell" id="tell" placeholder="<?php echo $_SESSION["TelefonoF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax : </label>
                        <input type="text" class="form-control" name="fax" id="fax" placeholder="<?php echo $_SESSION["Fax"]; ?>">
                    </div>
                    <button type="submit" class="custom-btn btn-5">Aggiorna</button>
                </form>