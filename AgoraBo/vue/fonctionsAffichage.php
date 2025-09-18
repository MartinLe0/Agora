<?php
function afficherListe($tbObjets, $name, $size = 1, $idSelect = null) {
    if (count($tbObjets) && empty($idSelect)) {
        $idSelect = $tbObjets[0]->identifiant;
    }
    echo '<select name="'.$name.'" id="'.$name.'" size="'.$size.'">';
    foreach ($tbObjets as $objet) {
        $selected = ($objet->identifiant == $idSelect) ? ' selected' : '';
        echo '<option value="'.$objet->identifiant.'"'.$selected.'>'.$objet->libelle.'</option>';
    }
    echo '</select>';
}
