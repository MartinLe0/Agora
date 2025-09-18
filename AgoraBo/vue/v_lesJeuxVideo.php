<?php 
require_once("fonctionsAffichage.php");
$tbGenres = $db->getLesGenres();
$tbPegis = $db->getLesPegis();
$tbMarques = $db->getLesMarques();
$tbPlateformes = $db->getPlateformes();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!-- page start-->
<div class="col-sm-6">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les jeux vidéo</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Nom</th>
                <th><i class="fa fa-bookmark"></i> Prix</th>
                <th><i class="fa fa-bookmark"></i> Genre</th>
                <th><i class="fa fa-bookmark"></i> Date de sortie</th>
                <th><i class="fa fa-bookmark"></i> Pegi</th>
                <th><i class="fa fa-bookmark"></i> Marque</th>
                <th><i class="fa fa-bookmark"></i> Plateforme</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau jeu-->
			<tr>
				<form action="index.php?uc=gererJeuxVideo" method="post">
					<td>Nouveau</td>
					<td><input type="text" name="txtNom" required></td>
					<td><input type="number" name="txtPrix" required min="0" step="0.01"></td>
					<td><?php afficherListe($tbGenres, 'lstGenre', 1, null); ?></td>
					<td><input type="date" name="txtDateParution" required></td>
					<td><?php afficherListe($tbPegis, 'lstPegi', 1, null); ?></td>
					<td><?php afficherListe($tbMarques, 'lstMarque', 1, null); ?></td>
					<td><?php afficherListe($tbPlateformes, 'lstPlateforme', 1, null); ?></td>
					<td>
						<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauJeu" title="Enregistrer"><i class="fa fa-save"></i></button>
						<button class="btn btn-info btn-xs" type="reset" title="Effacer"><i class="fa fa-eraser"></i></button>
					</td>
				</form>
			</tr>

				
			<?php
		
			foreach ($tbJeux as $jeu) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les jeux-->
				<form action="index.php?uc=gererJeuxVideo" method="post">
				<td><?php echo $jeu->identifiant; ?><input type="hidden"  name="txtIdJeux" value="<?php echo $jeu->identifiant; ?>" /></td>
				<?php 
					if ($jeu->identifiant != $idJeuxModif) {
						
						?>
						<td><?php
                            echo $jeu->nom;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->prix;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->libGenre;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->dateParution;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->descPegi;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->nomMarque;
                            ?>
                        </td>
                        <td><?php
                            echo $jeu->libPlateforme;
                            ?>
                        </td>
                        <td>
							
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierJeux" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerJeu" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce genre?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?>
							<td><input type="text" name="txtNom" value="<?php echo $jeu->nom; ?>" required></td>
							<td><input type="number" name="txtPrix" value="<?php echo $jeu->prix; ?>" required min="0" step="0.01"></td>
							<td><?php afficherListe($tbGenres, 'lstGenre', 1, $jeu->idGenre); ?></td>
							<td><input type="date" name="txtDateParution" value="<?php echo $jeu->dateParution; ?>" required></td>
							<td><?php afficherListe($tbPegis, 'lstPegi', 1, $jeu->idPegi); ?></td>
							<td><?php afficherListe($tbMarques, 'lstMarque', 1, $jeu->idMarque); ?></td>
							<td><?php afficherListe($tbPlateformes, 'lstPlateforme', 1, $jeu->idPlateforme); ?></td>
							<td>
								<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierJeu" title="Enregistrer"><i class="fa fa-save"></i></button>
								<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierJeu" title="Annuler"><i class="fa fa-undo"></i></button>
							</td>
						<?php
					}				
					?>
				</form>
				
			  </tr>  
			<?php
			}
			?>
			</tbody>
		  </table>
			  	  
		</div><!-- fin div panel-body-->
    </section><!-- fin section jeux-->
</div><!--fin div col-sm-6-->

