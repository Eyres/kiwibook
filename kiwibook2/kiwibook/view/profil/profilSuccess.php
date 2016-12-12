<?php
/** @var Utilisateur $user */
$user = $context->data;
?>
    <div id="profil">
        <img id="avatar" src=<?php echo $user->avatar ?>>
        <p id="identite"><?php echo $user->prenom." ".$user->nom ?></p>
        <p id="birthday"><?php echo $user->date_de_naissance->format('Y-m-d') ?></p>
        <p id="statut"><?php echo $user->statut ?></p>
    </div>

<?php if ($context->userId === $user->id) { ?>
    <a href="?action=editProfil">editer mon profil</a>
<?php } ?>