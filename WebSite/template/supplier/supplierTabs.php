<?php
$tab = "supp_profile";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
?>
<ul class="nav nav-tabs" id="userTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="supp_profile-tab" data-toggle="tab" href="#supp_profile" role="tab" aria-controls="supp_profile" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
            </svg><span>Dati Aziendali</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="forniture-tab" data-toggle="tab" href="#forniture" role="tab" aria-controls="forniture" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z" />
            </svg><span>Analisi Forniture</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
            </svg><span>Analisi Vendite</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="notifiche-tab" data-toggle="tab" href="#notifiche" role="tab" aria-controls="notifiche" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z" />
            </svg>Notifiche
            <?php
            $notifiche = $dbh->get_notifiche_nonlette($_SESSION["IdUtente"]);
            if ($notifiche > 0) :
            ?>
                <span class="badge badge-light m-badge-notifiche blink">
                    <?php echo  $notifiche; ?>
                </span>
            <?php
            endif;
            ?>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="logoutPage.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg><span>Logout</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane container" id="supp_profile" role="tabpanel" aria-labelledby="supp_profile-tab">
        <?php require_once 'supplierTabProfile.php'; ?>
    </div>
    <div class="tab-pane" id="forniture" role="tabpanel" aria-labelledby="forniture">
        <?php require_once 'supplierTabForniture.php'; ?>
    </div>
    <div class="tab-pane" id="product" role="tabpanel" aria-labelledby="product">
        <?php require_once 'supplierTabProduct.php'; ?>
    </div>
    <div class="tab-pane" id="notifiche" role="tabpanel" aria-labelledby="notifiche-tab">
        <?php require_once 'template/user/usrTabNotifiche.php'; ?>
    </div>
</div>
<script src="./js/color.js"></script>
<script src="./js/graph.js"></script>
<script>
    $(document).ready(function() {
        let fornLabel = [<?php generate_js_array_2($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), array("MeseNome", "Nome")) ?>];
        let fornData = [<?php generate_js_array($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), "Totale") ?>];
        let venLabel = [<?php generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "Nome") ?>];
        let venGuadagnoData = [<?php generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "GuadagnoTotale") ?>];
        let venData = [<?php generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "QtaVenduta") ?>];

        let gd_forn = []
        let gd_ven = []

        gd_forn.push(new GraphDataGenerator(
            new Color(255, 153, 0, 255),
            new Color(102, 0, 204, 150),
            fornData,
            "forniture"));

        gd_ven.push(new GraphDataGenerator(
            new Color(255, 153, 153, 255),
            new Color(51, 102, 255, 150),
            venData,
            "vendite"
        ));
        gd_ven.push(new GraphDataGenerator(
            new Color(153, 153, 255, 255),
            new Color(0, 204, 153, 255),
            venGuadagnoData,
            "guadagno"
        ));

        generateBarGraph("graficoForniture", gd_forn, "Prodotti al mese", "Qt.à Fornita", fornLabel, 0, 500);
        generateBarGraph("graficoVenditeProdUser", gd_ven, "Prodotti", "Qt.à Venduta / Guadagno(€)", venLabel, 0, 300);

        $('a[href="#<?php echo $tab; ?>"]').addClass("active");
        $('#<?php echo $tab; ?>').addClass("active");
    });
</script>
<script src="./js/homepageSupplier.js"></script>