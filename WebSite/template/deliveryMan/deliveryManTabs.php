<?php
$tab = "pack";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
?>
<ul class="nav nav-tabs" id="userTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="pack-tab" data-toggle="tab" href="#pack" role="tab" aria-controls="pack" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg> Delivery Package
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
    <div class="tab-pane container" id="pack" role="tabpanel" aria-labelledby="pack-tab">
        <?php require_once 'deliveryTabs.php'; ?>
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
<script src="./js/homepageDeliveryMan.js"></script>