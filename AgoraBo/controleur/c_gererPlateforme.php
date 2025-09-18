<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

    if (!isset($_POST['cmdAction'])) {
        $action = 'afficherPlateformes';
    } 
    else {
        // par défaut
        $action = $_POST['cmdAction'];
    }

    $idPlateformeModif = -1; // positionné si demande de modification
    $notification = 'rien'; // pour notifier la mise à jour dans la vue

    switch ($action) {
        
        case 'ajouterNouvellePlateforme': {
            if (!empty($_POST['txtLibPlateforme'])) {
                $idPlateformeNotif = $db->ajouterPlateforme($_POST['txtLibPlateforme']);
                $notification = 'Ajoutée';
            }
            break;
        }

        case 'demanderModifierPlateforme': {
            $idPlateformeModif = $_POST['txtIdPlateforme'];
            break;
        }

        case 'validerModifierPlateforme': {
            $db->modifierPlateforme($_POST['txtIdPlateforme'], $_POST['txtLibPlateforme']);
            $idPlateformeNotif = $_POST['txtIdPlateforme'];
            $notification = 'Modifiée';
            break;
        }

        case 'supprimerPlateforme': {
            $db->supprimerPlateforme($_POST['txtIdPlateforme']);
            $notification = 'Supprimée';
            break;
        }
    }

    // l' affichage des plateformes se fait dans tous les cas
    $tbPlateformes = $db->getLesPlateformes();
    require 'vue/v_lesPlateformes.php';
    ?>
