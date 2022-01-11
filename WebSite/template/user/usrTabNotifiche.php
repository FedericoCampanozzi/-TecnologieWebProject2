<div class="container top-40">
    <div id="accordion">
        <?php
        $notifiche = $dbh->get_notifiche($_SESSION["IdUtente"]);
        for ($i = 0; $i < sizeof($notifiche); $i++) : ?>
            <div class="card">
                <div class="card-header" id="notifica_h_<?php echo $i; ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#notifica_<?php echo $i; ?>" aria-expanded="true" aria-controls="notifica_<?php echo $i; ?>">
                            <?php echo $notifiche[$i]["IdNotifica"] . "-" . $notifiche[$i]["Titolo"]; ?>
                        </button>
                    </h5>
                </div>
                <div id="notifica_<?php echo $i; ?>" class="collapse" aria-labelledby="notifica_h_<?php echo $i; ?>" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        <?php endfor
        ?>
        <div class="card">
            <div class="card-header" id="creazione_h">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed show" data-toggle="collapse" data-target="#creazione" aria-expanded="false" aria-controls="creazione">
                        Collapsible Group Item #2
                    </button>
                </h5>
            </div>
            <div id="creazione" class="collapse" aria-labelledby="creazione_h" data-parent="#accordion">
                <div class="card-body">
                    <form action="utils/insert.php" method="get">
                        <input type="hidden" name="codiceInsert" value="fornitore">
                    <div class="row">
                        <div class="col-4">
                            <label for="p_iva">Username : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Username">
                        </div>
                        <div class="col-4">
                            <label for="p_iva">Titolo : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Username">
                        </div>
                        <div class="col-4">
                            <label for="p_iva">Username : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Username">
                            <button type="submit" class="custom-btn btn-6 text-small">
                                Send
                            </button>
                        </div>
                    </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>