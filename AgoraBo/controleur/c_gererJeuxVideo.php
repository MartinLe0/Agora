	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])) {
		 $action = 'afficherJeuxVideo';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idJeuxModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action) {

		case 'ajouterNouveauJeu': {
			if (!empty($_POST['txtNom']) && !empty($_POST['txtPrix'])) {
				$db->ajouterJeu(
					$_POST['txtNom'],        
					$_POST['txtPrix'],          
					$_POST['txtDateParution'],  
					$_POST['lstPegi'],          
					$_POST['lstPlateforme'],    
					$_POST['lstMarque'],       
					$_POST['lstGenre']          
				);
				$notification = 'Ajouté';
			}
			break;
		}

		case 'demanderModifierJeux': {
			$idJeuxModif = $_POST['txtIdJeux'];
			break;
		}

		case 'validerModifierJeu': {
			$db->modifierJeu(
				$_POST['txtIdJeux'],      
				$_POST['txtNom'],         
				$_POST['txtPrix'],        
				$_POST['txtDateParution'], 
				$_POST['lstPegi'],         
				$_POST['lstPlateforme'],   
				$_POST['lstMarque'],       
				$_POST['lstGenre']         
			);
			$notification = 'Modifié';
			$idJeuxNotif = $_POST['txtIdJeux'];
			break;
		}

		case 'supprimerJeu': {
			$db->supprimerJeu($_POST['txtIdJeux']);
			break;
		}

		case 'annulerModifierJeu': {
			$idJeuxModif = -1;
			break;
		}
	}
		
	// l' affichage des genres se fait dans tous les cas	
	$tbJeux  = $db->getLesJeuxVideo();		
	require 'vue/v_lesJeuxVideo.php';

	?>
