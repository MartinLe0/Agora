<?php
// Utilisation de la classe PdoMarque pour toutes les opérations sur les marques
require_once 'modele/class.PdoMarque.inc.php';
$pdoMarque = PdoMarque::getPdoMarque();

// si le paramètre action n'est pas positionné alors
//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les marques
//	sinon l'action est celle indiquée par le bouton
if (!isset($_POST['cmdAction'])) {
    $action = 'afficherMarques';
} else {
    $action = $_POST['cmdAction'];
}

$idMarqueModif = -1; // positionné si demande de modification
$notification = 'rien'; 

// selon l'action demandée on réalise l'action 
switch($action) {
    case 'ajouterNouvelleMarque': {
        if (!empty($_POST['txtNomMarque'])) {
            $idMarqueNotif = $pdoMarque->ajouterMarque($_POST['txtNomMarque']);
            // $idMarqueNotif est l'idMarque de la marque ajoutée
            $notification = 'Ajoutée'; // sert à afficher l'ajout réalisé dans la vue
        }
        break;
    }
    case 'demanderModifierMarque': {
        $idMarqueModif = $_POST['txtIdMarque']; // sert à créer un formulaire de modification pour cette marque
        break;
    }
    case 'validerModifierMarque': {
        $pdoMarque->modifierMarque($_POST['txtIdMarque'], $_POST['txtNomMarque']);
        $idMarqueNotif = $_POST['txtIdMarque']; // $idMarqueNotif est l'idMarque de la marque modifiée
        $notification = 'Modifiée';  // sert à afficher la modification réalisée dans la vue
        break;
    }
    case 'supprimerMarque': {
        $idMarque = $_POST['txtIdMarque'];
        $pdoMarque->supprimerMarque($idMarque);
        break;
    }
}

// l' affichage des marques se fait dans tous les cas
$tbMarques = $pdoMarque->getLesMarques();
require 'vue/v_lesMarques.php';
?>
