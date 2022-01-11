<?php
function isActive($pagename)
{
    if (basename($_SERVER['PHP_SELF']) == $pagename) {
        echo " class='active' ";
    }
}

function getIdFromName($name)
{
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn()
{
    return !empty($_SESSION['idautore']);
}

function registerUser($user)
{
    $_SESSION["IdUtente"] = $user[0]["ID"];
    $_SESSION["usr_un"] = $user[0]["Username"];
    $_SESSION["usr_nome"] = $user[0]["Nome"];
    $_SESSION["usr_cognome"] = $user[0]["Cognome"];
    $_SESSION["usr_dn"] = $user[0]["DataDiNascita"];
    $_SESSION["usr_email"] = $user[0]["EMail"];
    $_SESSION["usr_email"] = $user[0]["EMail"];
    $_SESSION["usr_tell"] = $user[0]["Telefono"];
    $_SESSION["usr_image"] = $user[0]["ImagePath"];
}

function registerSupplier($user)
{
    $_SESSION["PIVA_Azienda"] = $user[0]["PIVA"];
    $_SESSION["RagioneSociale"] = $user[0]["RagioneSociale"];
    $_SESSION["ViaF"] = $user[0]["ViaF"];
    $_SESSION["NumeroCivicoF"] = $user[0]["NumeroCivicoF"];
    $_SESSION["CittaF"] = $user[0]["CittaF"];
    $_SESSION["InfoMail"] = $user[0]["InfoMail"];
    $_SESSION["PecMail"] = $user[0]["PecMail"];
    $_SESSION["Fax"] = $user[0]["Fax"];
    $_SESSION["TelefonoF"] = $user[0]["TelefonoF"];
}

function getEmptyArticle()
{
    return array("idarticolo" => "", "titoloarticolo" => "", "imgarticolo" => "", "testoarticolo" => "", "anteprimaarticolo" => "", "categorie" => array());
}

function getAction($action)
{
    $result = "";
    switch ($action) {
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function uploadImage($path, $image)
{
    $imageName = basename($image["name"]);
    $fullPath = $path . $imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if ($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $acceptedExtensions)) {
        $msg .= "Accettate solo le seguenti estensioni: " . implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do {
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME) . "_$i." . $imageFileType;
        } while (file_exists($path . $imageName));
        $fullPath = $path . $imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if (strlen($msg) == 0) {
        if (!move_uploaded_file($image["tmp_name"], $fullPath)) {
            $msg .= "Errore nel caricamento dell'immagine.";
        } else {
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function show_next_page($page_to, $dgb)
{
    if (!$dgb) header($page_to);
}

function show_in_next_page($msg, $cod_msg, $page_to, $msg_type, $dgb)
{
    $_SESSION["show_modal"] = true;
    $_SESSION["cod_msg"] = $cod_msg;
    $_SESSION["msg"] = $msg;
    $_SESSION["msg_type"] = $msg_type;
    if (!$dgb) header($page_to);
}

function check_modals($check)
{
    if (isset($_SESSION["upd"]) && $_SESSION["upd"] && $_SESSION["last_page"] == $check) {
        if ($_SESSION["msg_type"] == MsgType::Successfull) modals_successfull();
        else if ($_SESSION["msg_type"] == MsgType::Error) modals_error();
        else if ($_SESSION["msg_type"] == MsgType::Warning) modals_warnings();
        else modals_information();
        $_SESSION["upd"] = false;
        return true;
    }
    return false;
}

function ajax_response($msg, $page_from, $msg_type)
{
    echo json_decode("{

    }");
}

function generate_js_array($phpArray, $propName)
{
    for ($i = 0; $i < sizeof($phpArray); $i++) {
        if ($i == sizeof($phpArray) - 1) echo "\"" . $phpArray[$i][$propName] . "\"";
        else echo "\"" . $phpArray[$i][$propName] . "\",";
    }
}

function generate_js_array_2($phpArray, $propArrName)
{
    for ($i = 0; $i < sizeof($phpArray); $i++) {
        $res = "";
        for ($j = 0; $j < sizeof($propArrName); $j++) {
            if ($j == sizeof($propArrName) - 1) $res .= $phpArray[$i][$propArrName[$j]];
            else  $res .= $phpArray[$i][$propArrName[$j]] . " ";
        }
        if ($i == sizeof($phpArray) - 1) echo "\"" . $res . "\"";
        else echo "\"" . $res . "\",";
    }
}

function modals_successfull($id = "myGeneralModal")
{
?>
    <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
        <div class="modal-dialog modal-msg-successfull" role="document">
            <div class="modal-content modal-msg-successfull"></div>
            <div class="modal-header modal-msg-successfull">
                <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-msg-successfull">
                <?php
                echo $_SESSION["msg"];
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Close</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#<?php echo $id; ?>').modal('show');
        });
    </script>
<?php
}

function modals_warnings($id = "myGeneralModal")
{
?>
    <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
        <div class="modal-dialog modal-msg-warning" role="document">
            <div class="modal-content modal-msg-warning"></div>
            <div class="modal-header modal-msg-warning">
                <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-msg-warning">
                <?php
                echo $_SESSION["msg"];
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Close</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#<?php echo $id; ?>').modal('show');
        });
    </script>
<?php
}

function modals_information($id = "myGeneralModal")
{
?>
    <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
        <div class="modal-dialog modal-msg-info" role="document">
            <div class="modal-content modal-msg-info"></div>
            <div class="modal-header modal-msg-info">
                <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-msg-info">
                <?php
                echo $_SESSION["msg"];
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Close</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#<?php echo $id; ?>').modal('show');
        });
    </script>
<?php
}
function modals_error($id = "myGeneralModal")
{
?>
    <div class="modal fade" id="<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
        <div class="modal-dialog modal-msg-error" role="document">
            <div class="modal-content modal-msg-error">

            </div>
            <div class="modal-header modal-msg-error">
                <h5 class="modal-title" id="generalModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> C'&egrave; stato un errore inaspettato
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-msg-error">
                <?php
                echo $_SESSION["msg"];
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Close</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#<?php echo $id; ?>').modal('show');
        });
    </script>
<?php
}
?>