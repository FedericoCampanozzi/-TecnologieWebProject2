<?php
class DatabaseHelper
{
  private $db;
  public function __construct($servername, $username, $password, $dbname)
  {
    $this->db = new mysqli($servername, $username, $password, $dbname);
    if ($this->db->connect_error) {
      die("Connesione fallita al db");
    }
  }
  /* MISC */
  private function get_cripted_password($data){
    return hash("sha256", "2342werfwexv".$data."vghjklp,.m,£$%&");
  }
  public function find_user_from_username($user)
  {
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente WHERE (Username = ? OR EMail = ?)");
    $stmt->bind_param("ss", $user, $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);
    return $stmt->affected_rows == 1;
  }
  public function find_login($user, $password)
  {
    $password = $this->get_cripted_password($password);
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente WHERE (Username = ? OR EMail = ?) AND Psw = ?");
    $stmt->bind_param("sss", $user, $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);
    return $stmt->affected_rows == 1;
  }
  public function last_ordine($idUtente)
  {
    $stmt = $this->db->prepare("SELECT MAX(ID) AS LastID from ordine where IdUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if ($stmt->affected_rows <= 0) return -1;
    return $result[0]["LastID"];
  }
  public function denaro_carta($nrCarta)
  {
    $stmt = $this->db->prepare("SELECT Disponibilita FROM carta WHERE Numero = ?");
    $stmt->bind_param("i", $nrCarta);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    return $result[0]["Disponibilita"];
  }
  public function qta_giacenza_prodotto($idProdotto)
  {
    $stmt = $this->db->prepare("SELECT Giacenza FROM prodotto_magazzino WHERE ID = ?");
    $stmt->bind_param("i", $idProdotto);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    return $result[0]["Giacenza"];
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* GET */
  public function get_login($user, $password)
  {
    $password = $this->get_cripted_password($password);
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente WHERE (Username = ? OR EMail = ?) AND Psw = ?");
    $stmt->bind_param("sss", $user, $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_users()
  {
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_role()
  {
    $stmt = $this->db->prepare("SELECT * FROM ruolo WHERE ID <> 3");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_fornitori()
  {
    $stmt = $this->db->prepare("SELECT * FROM fornitore");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_products()
  {
    $stmt = $this->db->prepare("SELECT * FROM info_prodotto");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_products_forn($pivaFornitore)
  {
    $stmt = $this->db->prepare("SELECT * FROM info_prodotto WHERE PIVA_Fornitore = ?");
    $stmt->bind_param("s", $pivaFornitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_categoria()
  {
    $stmt = $this->db->prepare("SELECT * FROM categoria");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_forniture($pivaFornitore)
  {
    $stmt = $this->db->prepare("SELECT *, Qta * Prezzo AS CostoTotale  FROM fornitura INNER JOIN prodotto ON fornitura.IdProdotto = prodotto.ID WHERE PIVA_Fornitore = ?");
    $stmt->bind_param("s", $pivaFornitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_tot_products($pivaFornitore)
  {
    $stmt = $this->db->prepare("SELECT * FROM totali_vendite_prodotto WHERE PIVA_Fornitore = ?");
    $stmt->bind_param("s", $pivaFornitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_tot_forniture($pivaFornitore)
  {
    $stmt = $this->db->prepare("SELECT * FROM totali_fornitura WHERE PIVA_Fornitore = ?");
    $stmt->bind_param("s", $pivaFornitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_carte($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM carta WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_recapiti($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM recapito WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_carrello($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM carrello_utente WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_open_ordini()
  {
    $stmt = $this->db->prepare("SELECT * FROM info_ordine WHERE DataConsegna is null");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_user_ordini($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM info_ordine WHERE IdUtente = ? ORDER BY DataOrdine DESC");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* INSERT */
  public function insert_user($username, $psw, $nome, $cognome, $dataNascita, $email, $tell)
  {
    $psw = $this->get_cripted_password($psw);
    $query = "INSERT INTO `utente`(`Username`, `Psw`, `Nome`, `Cognome`, `DataDiNascita`,`EMail`,`Telefono`,`IdRuolo`, `ImagePath`, `PIVA_Fornitore`) 
      VALUES (?,?,?,?,?,?,?,4,'base.png', NULL)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssssssi", $username, $psw, $nome, $cognome, $dataNascita, $email, $tell);
    return $stmt->execute();
  }
  public function insert_prodotto($nome, $descrizione, $prezzo, $piva, $imgPath, $categoria)
  {
    $query = "INSERT INTO `prodotto`(`Nome`, `Descrizione`, `Prezzo`, `PIVA_Fornitore`, `ImagePath`, `IdCategoria`) VALUES (?,?,?,?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssdsi", $nome, $descrizione, $prezzo, $piva, $imgPath, $categoria);
    return $stmt->execute();
  }
  public function insert_fornitura($qta, $idProdotto)
  {
    $query = "INSERT INTO `fornitura`(`DataConsegnaMerce`, `Qta`, `IdProdotto`) VALUES (CURRENT_TIMESTAMP(),?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $qta, $idProdotto);
    return $stmt->execute();
  }
  public function insert_fornitore($p_iva, $rs, $via, $nc, $citta)
  {
    $query = "INSERT INTO `fornitore`(`PIVA`,`RagioneSociale`, `Via`, `NumeroCivico`, `Citta`) VALUES (?,?,?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("sssis", $p_iva, $rs, $via, $nc, $citta);
    return $stmt->execute();
  }
  public function insert_carta($numero, $dataScadenza, $ccv, $tipo, $idUtente)
  {
    $query = "INSERT INTO `carta`(`Numero`,`DataScadenza`, `CCV`, `Tipo`, `IdUtente`, Disponibilita) VALUES (?,?,?,?,?,0)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("isisi", $numero, $dataScadenza, $ccv, $tipo, $idUtente);
    return $stmt->execute();
  }
  public function insert_categoria($nome, $descrizione)
  {
    $query = "INSERT INTO `categoria`(`Nome`, `Descrizione`) VALUES (?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ss", $nome, $descrizione);
    return $stmt->execute();
  }
  public function insert_rc($idprodotto, $idUtente)
  {
    $query = "INSERT INTO `riga_carrello`(`DataCreate`,`IdUtente`, `IdProdotto`, `IdOrdine`) VALUES (CURRENT_TIMESTAMP(), ?, ?, NULL)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idUtente, $idprodotto);
    return $stmt->execute();
  }
  public function insert_recapito($via, $nc, $citta, $interno, $idUtente)
  {
    if ($interno == "") {
      $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,NULL,?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sisi", $via, $nc, $citta, $idUtente);
    } else {
      $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,?,?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sissi", $via, $nc, $citta, $interno, $idUtente);
    }
    return $stmt->execute();
  }
  public function insert_ordine($useContanti, $note, $idUtente, $idRecapito, $nrCarta)
  {
    /*
      La data prevista di consegna e' la data attuale + il tempo di consegna, ovvero un numero random >=5 e <15
      */
    $delivery_day = rand(5, 15);
    if ($useContanti) {
      $query = "INSERT INTO `ordine`(`Id_Stato`, `SceltaContanti`, `Note`, `IdUtente`, `IdRecapito`, `IdUtenteFattorino`, `NrCarta`,
        `DataOrdine`, `DataPrevista`, `DataConsegna`) VALUES (1, 1, ?, ?, ?, NULL, NULL, CURRENT_TIMESTAMP(), ADDDATE(CURRENT_TIMESTAMP()," . $delivery_day . "), NULL)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sii", $note, $idUtente, $idRecapito);
    } else {
      $query = "INSERT INTO `ordine`(`Id_Stato`, `SceltaContanti`, `Note`, `IdUtente`, `IdRecapito`, `IdUtenteFattorino`, `NrCarta`,
        `DataOrdine`, `DataPrevista`, `DataConsegna`) VALUES (1, 0, ?, ?, ?, NULL, ?, CURRENT_TIMESTAMP(), ADDDATE(CURRENT_TIMESTAMP()," . $delivery_day . "), NULL)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("siii", $note, $idUtente, $idRecapito, $nrCarta);
    }
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* DELETE */
  public function delete_rc($idprodotto, $idUtente)
  {
    $query = "DELETE FROM `riga_carrello` WHERE IdUtente = ? AND IdProdotto = ? AND IdOrdine IS NULL LIMIT 1";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idUtente, $idprodotto);
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* UPDATE */
  public function update_fornitore($p_iva, $via, $nc, $citta, $infoMail, $pecMail, $fax, $tell)
  {
    $query = "UPDATE `fornitore` SET Via = ?, NumeroCivico = ?, Citta = ?, InfoMail = ?, PerMail = ?, Fax = ?, Telefono = ? WHERE PIVA = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("sissssss", $via, $nc, $citta, $infoMail, $pecMail, $fax, $tell, $p_iva);
    return $stmt->execute();
  }
  public function update_riga_carrello($idUtente, $idprodotto, $idOrdine)
  {
    $query = "UPDATE `riga_carrello` SET IdOrdine = ? WHERE IdUtente = ? AND IdProdotto = ? AND IdOrdine IS NULL";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("iii", $idOrdine, $idUtente, $idprodotto);
    return $stmt->execute();
  }
  public function update_ordine($idFattorino, $idOrdine)
  {
    $query = "UPDATE `ordine` SET Id_Stato = 6, DataConsegna = CURRENT_TIMESTAMP(), IdUtenteFattorino = ? WHERE ID = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idFattorino, $idOrdine);
    return $stmt->execute();
  }
  public function update_user($idUtente, $username, $email, $tell)
  {
    $query = "UPDATE `utente` SET Username = ?, EMail = ?, Telefono = ? WHERE ID = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssii", $username, $email, $tell, $idUtente);
    return $stmt->execute();
  }
  public function update_user_psw($username, $newPsw)
  {
    $newPsw = $this->get_cripted_password($newPsw);
    $query = "UPDATE `utente` SET Psw = ? WHERE Username = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ss", $newPsw, $username);
    return $stmt->execute();
  }
  public function update_user_ruolo($idUtente, $idRuolo, $p_iva)
  {
    if($idRuolo == 5 || $idRuolo == 6){
      $query = "UPDATE `utente` SET IdRuolo = ? , PIVA_Fornitore = ? WHERE ID = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("isi", $idRuolo, $p_iva, $idUtente);
    } else{
      $query = "UPDATE `utente` SET IdRuolo = ?, PIVA_Fornitore = NULL WHERE ID = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("ii", $idRuolo, $idUtente);    
    }
    return $stmt->execute();
  }
  public function update_conto($nrCarta, $somma)
  {
    $query = "UPDATE `carta` SET Disponibilita = Disponibilita + ? WHERE Numero = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("di", $somma, $nrCarta);
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
}
