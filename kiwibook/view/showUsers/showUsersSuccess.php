<?php
foreach ($context->data as $user) {
    ?>
    <div id="profil">
        <img id="avatar" <noscript> src=<?php echo $user->avatar ?>>
        <a href="?action=profil&id=<?php echo $user->id ?>">
            <p id="identite"><?php echo $user->prenom." ".$user->nom ?></p>
        </a>
        <p id="birthday"><?php echo $user->date_de_naissance->format('Y-m-d') ?></p>
        <p id="statut"><?php echo $user->statut ?></p>
    </div>
    <?php
}

?>