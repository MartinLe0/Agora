<!-- page start-->
  <div class="col-sm-6">
    <section class="panel">
  <div class="chat-room-head">
    <h3><i class="fa fa-angle-right"></i> Gérer les plateformes</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-advance table-hover">
   <thead>
        <tr class="tableau-entete">
            <th><i class="fa fa-bullhorn"></i> Identifiant</th>
            <th><i class="fa fa-desktop"></i> Libellé</th>
            <th></th>
        </tr>
   </thead>
   <tbody>
   <!-- formulaire pour ajouter une nouvelle plateforme -->
   <tr>
    <form action="index.php?uc=gererPlateforme" method="post">
      <td>Nouvelle</td>
      <td>
        <input type="text" id="txtLibPlateforme" name="txtLibPlateforme"
        required minlength="2" maxlength="24" placeholder="Nom de la plateforme"/>
      </td>
      <td>
        <button class="btn btn-primary btn-xs" type="submit" 
        name="cmdAction" value="ajouterNouvellePlateforme"><i class="fa fa-save"></i></button>
        <button class="btn btn-info btn-xs" type="reset"><i class="fa fa-eraser"></i></button>
      </td>
    </form>
   </tr>

   <?php 
   foreach ($tbPlateformes as $plateforme) { 
    ?>
     <tr>

      <!-- formulaire pour modifier et supprimer les genres-->
      <form action="index.php?uc=gererPlateforme" method="post">
      <td><?php echo $plateforme->identifiant; ?>
            <input type="hidden" name="txtIdPlateforme" value="<?php echo $plateforme->identifiant; ?>" /></td>
        <td>
        <?php 
          if ($plateforme->identifiant != $idPlateformeModif) {
            echo $plateforme->libelle;
        ?>
        </td>
        <td>
          <button class="btn btn-primary btn-xs" type="submit" 
          name="cmdAction" value="demanderModifierPlateforme"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-danger btn-xs" type="submit" 
          name="cmdAction" value="supprimerPlateforme" onclick="return confirm('Supprimer cette plateforme ?');"><i class="fa fa-trash-o"></i></button>
        </td>
        <?php } else { ?>
          <input type="text" name="txtLibPlateforme" value="<?php echo $plateforme->libelle; ?>" required minlength="2" maxlength="24"/>
        </td>
        <td>
          <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPlateforme"><i class="fa fa-save"></i></button>
          <button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPlateforme"><i class="fa fa-undo"></i></button>
        </td>
        <?php } ?>
      </form>
     </tr>
   <?php } ?>
   </tbody>
   </table>
  </div>
 </section>
</div>
