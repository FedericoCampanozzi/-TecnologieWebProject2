<?php
$tab = "ruoli";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
?>
<ul class="nav nav-tabs" id="userTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="ruoli-tab" data-toggle="tab" href="#ruoli" role="tab" aria-controls="ruoli" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
            </svg> Ruoli
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="addFornitore-tab" data-toggle="tab" href="#addFornitore" role="tab" aria-controls="addFornitore" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg> Fornitori
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="categorie-tab" data-toggle="tab" href="#categorie" role="tab" aria-controls="categorie" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
            </svg> Categorie
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="notifiche-tab" data-toggle="tab" href="#notifiche" role="tab" aria-controls="notifiche" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
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
    <div class="tab-pane container" id="ruoli" role="tabpanel" aria-labelledby="ruoli-tab">
        <?php require_once 'adminChangeRoleTab.php'; ?>
    </div>
    <div class="tab-pane top-40" id="addFornitore" role="tabpanel" aria-labelledby="addFornitore-tab">
        <?php require_once 'adminAddFornitoreTab.php'; ?>
    </div>
    <div class="tab-pane" id="categorie" role="tabpanel" aria-labelledby="categorie-tab">
        <?php require_once 'adminAddCategoriaTab.php'; ?>
    </div>
    <div class="tab-pane" id="notifiche" role="tabpanel" aria-labelledby="notifiche-tab">
        <?php require_once 'template/user/usrTabNotifiche.php'; ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('a[href="#<?php echo $tab; ?>"]').addClass("active");
        $('#<?php echo $tab; ?>').addClass("active");
    });
</script>
<script src='js/homepageAdmin.js'></script>