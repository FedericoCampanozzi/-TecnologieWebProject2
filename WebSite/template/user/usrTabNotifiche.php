<div id="accordion">
    <div class="container top-40">
        <div class="card">
            <div class="card-header" id="ricevuti_h">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed show" data-toggle="collapse" data-target="#ricevuti" aria-expanded="false" aria-controls="ricevuti">
                        Ricevute
                    </button>
                </h5>
            </div>
            <div id="ricevuti" class="collapse" aria-labelledby="ricevuti_h" data-parent="#accordion">
                <div id="accordion_ricevuti">
                    <?php
                    foreach ($dbh->get_notifiche($_SESSION["IdUtente"]) as $n) :
                        if (!isset($n["IdUtenteNotificato"]) || $n["IdUtenteNotificato"] == $_SESSION["IdUtente"]) : ?>
                            <div class="card <?php if (!isset($n["DataLettura"])) echo "notifica-non-letta";
                                                elseif (!isset($n["IdUtenteNotificato"])) echo "notifica-broadcast"; ?>">
                                <div class="card-header" id="notifica_ric_h_<?php echo $n["IdNotifica"]; ?>">
                                    <h4 class="mb-0">
                                        <button class="btn btn-link btn-leggi" data-toggle="collapse" data-target="#notifica_ric_<?php echo $n["IdNotifica"]; ?>" aria-expanded="true" aria-controls="notifica_ric_<?php echo $n["IdNotifica"]; ?>">
                                            <?php echo $n["Titolo"]; ?>
                                        </button>
                                    </h4>
                                </div>
                                <div id="notifica_ric_<?php echo $n["IdNotifica"]; ?>" class="collapse" aria-labelledby="notifica_ric_h_<?php echo $n["IdNotifica"]; ?>" data-parent="#accordion_ricevuti">
                                    <div class="card-body">
                                        <?php echo $n["Messaggio"]; ?> <br>
                                        <hr>
                                        <span>Inviato Il : <?php echo $n["DataInvio"]; ?></span><span> da : <?php echo $n["UsernameUC"]; ?></span>
                                        <?php
                                        if (isset($n["DataLettura"])) :
                                        ?><span>Letta il : <?php echo $n["DataLettura"]; ?></span>
                                        <?php
                                        endif
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endif;
                    endforeach
                    ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="inviati_h">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed show" data-toggle="collapse" data-target="#inviati" aria-expanded="false" aria-controls="inviati">
                        Inviate
                    </button>
                </h5>
            </div>
            <div id="inviati" class="collapse" aria-labelledby="inviati_h" data-parent="#accordion">
                <div id="accordion_inviati">
                    <?php
                    foreach ($dbh->get_notifiche($_SESSION["IdUtente"]) as $n) :
                        if ($n["IdUtenteCreazione"] == $_SESSION["IdUtente"]) : ?>
                            <div class="card <?php if (!isset($n["IdUtenteNotificato"])) echo "notifica-broadcast"; ?>">
                                <div class="card-header" id="notifica_inv_h_<?php echo $n["IdNotifica"]; ?>">
                                    <h4 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#notifica_inv_<?php echo $n["IdNotifica"]; ?>" aria-expanded="true" aria-controls="notifica_inv_<?php echo $n["IdNotifica"]; ?>">
                                            <?php echo $n["Titolo"]; ?>
                                        </button>
                                    </h4>
                                </div>
                                <div id="notifica_inv_<?php echo $n["IdNotifica"]; ?>" class="collapse" aria-labelledby="notifica_inv_h_<?php echo $n["IdNotifica"]; ?>" data-parent="#accordion_inviati">
                                    <div class="card-body">
                                        <?php echo $n["Messaggio"]; ?> <br>
                                        <hr>
                                        <span>Inviato Il : <?php echo $n["DataInvio"]; ?></span><span> a : <?php echo $n["UsernameUN"]; ?></span>
                                        <?php
                                        if (isset($n["DataLettura"])) :
                                        ?>Letta il : <?php echo $n["DataLettura"]; ?>
                                    <?php
                                        endif
                                    ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endif;
                    endforeach
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container top-40">
        <form>
            <fieldset class="border p-3">
                <legend class="w-auto text-big">Invia Messaggio</legend>
                <div class="row">
                    <div class="col-4">
                        <label for="to">Send To : </label>
                        <select id="to" name="to" class="form-control">
                            <?php
                            foreach ($dbh->get_users() as $s) :
                                if ($s["ID"] != $_SESSION["IdUtente"]) : ?>
                                    <option value="<?php echo $s["ID"]; ?>"><?php echo $s["Username"]; ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                        <div class="top-40">
                            <button id="sendNotifica" class="custom-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                                Send
                            </button>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="titolo">Oggetto : </label>
                        <input type="text" class="form-control" name="titolo" id="titolo" placeholder="Oggetto">
                        <?php if ($_SESSION["IdRuolo"] == 3) : ?>
                            <div class="top-40">
                                <button id="sendNotificaBroadcast" class="custom-btn text-so-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 16 16">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                    Send Broadcast
                                </button>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-4">
                        <label for="testo">Testo : </label>
                        <textarea class="form-control gfx-not-resizable" name="testo" id="testo" placeholder="Testo Messaggio" rows="5"> </textarea>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script src="js/notifica.js"></script>