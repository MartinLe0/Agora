<?php
$action = $_POST['cmdAction'] ?? 'afficherPegis';

$idPegiModif = -1;       
$notification = 'rien';  

switch ($action) {
    case 'ajouterNouveauPegi':
        if (!empty($_POST['ageLimite']) && !empty($_POST['descPegi'])) {
            $ageLimite = $_POST['ageLimite'];
            $descPegi = $_POST['descPegi'];
            $idPegiNotif = $db->ajouterPegi($ageLimite, $descPegi);
            $notification = 'Ajouté';
        }
        break;

    case 'demanderModifierPegi':
        if (!empty($_POST['txtIdPegi'])) {
            $idPegiModif = $_POST['txtIdPegi'];
        }
        break;

    case 'validerModifierPegi':
        if (!empty($_POST['txtIdPegi']) && !empty($_POST['ageLimite']) && !empty($_POST['descPegi'])) {
            $idPegi = $_POST['txtIdPegi'];
            $ageLimite = $_POST['ageLimite'];
            $descPegi = $_POST['descPegi'];
            $db->modifierPegi($idPegi, $ageLimite, $descPegi); 
            $idPegiNotif = $idPegi;
            $notification = 'Modifié';
        }
        break;

    case 'supprimerPegi':
        if (!empty($_POST['txtIdPegi'])) {
            $idPegi = $_POST['txtIdPegi'];
            $db->supprimerPegi($idPegi);
        }
        break;
}

$tbPegis = $db->getPegi();
require 'vue/v_lesPegis.php';
?>
