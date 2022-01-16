<div class="hidden-x">
    <?php
    $userOrdini = $dbh->get_user_ordini($_SESSION["IdUtente"]);
    $i = 0;
    for (; $i < sizeof($userOrdini); $i++) :
        if ($i % 3 == 0) : ?>
            <div class="row">
            <?php
        endif;
        if (isset($userOrdini[$i]["DataConsegna"])) : ?>
                <div class="col-lg-4">
                    <div class="ordini-container  ordine-consegnato">
                    <?php else : ?>
                        <div class="col-lg-4">
                            <div class="ordini-container  ordine-non-consegnato">
                            <?php endif; ?>
                            <div class="indirizzo">
                                Indirizzo : <p><?php echo $userOrdini[$i]["Via"] . ", " . $userOrdini[$i]["NumeroCivico"] . " - " . $userOrdini[$i]["Citta"]; ?></p>
                            </div>
                            <div class="data-ordine"> Ordinato il <p><?php echo $userOrdini[$i]["DataOrdine"] ?></p>
                            </div>
                            <?php
                            if (isset($userOrdini[$i]["DataConsegna"])) : ?>
                                <div class="data"> Consegnato il <p><?php echo $userOrdini[$i]["DataConsegna"] ?></p>
                                </div>
                            <?php else : ?>
                                <div class="data"> Consegna prevista per il <p><?php echo $userOrdini[$i]["DataPrevista"] ?></p>
                                </div>
                            <?php
                            endif
                            ?>
                            <div class="totale"> Totale : <p><?php echo $userOrdini[$i]["TotaleOrdine"] ?></p> &euro; </div>
                            <?php
                            if ($userOrdini[$i]["SceltaContanti"] == 1) : ?>
                                <div class="pagamento">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                    </svg>
                                </div>
                            <?php else : ?>
                                <div class="pagamento">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                                    </svg>
                                </div>
                            <?php
                            endif
                            ?>
                            </div>
                        </div>
                        <?php
                        if ($i % 3 == 2) : ?>
                    </div>
                <?php
                        endif;
                    endfor;
                    if ($i % 3 != 0) :
                        while ($i % 3 == 0) : ?>
                    <div class="col-lg-4">
                    </div>
            <?php
                            $i++;
                        endwhile;
                        echo "</div>";
                    endif;
            ?>
</div>