<?php
foreach ($context->data as $user) {
    ?>
<div id="profil">
    <img id="avatar" src=<?php echo $user->avatar?> > 
    <p id="identite"><?php echo $user->prenom." ".$user->nom ?></p>
    <p id="birthday"><?php echo $user->date_de_naissance->format('Y-m-d') ?></p>
    <p id="statut"><?php echo $user->statut ?></p>
</div>
    <?php
}

?>