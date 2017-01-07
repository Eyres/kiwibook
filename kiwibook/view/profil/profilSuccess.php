<?php
/** @var Utilisateur $user */
$user = $context->data;
?>
    <div id="profil">
        <img id="avatar" src=<?php echo $user->getAvatar(); ?>>
        <p id="identite"><?php echo $user->getPrenom()." ".$user->getNom() ?></p>
        <p id="birthday"><?php echo $user->getDateDeNaissance()->format('Y-m-d') ?></p>
        <p id="statut"><?php echo $user->getStatut() ?></p>
    </div>

<?php if ($context->userId === $user->getId()) { ?>
    <a href="?action=editProfil">editer mon profil</a>
<?php } ?>