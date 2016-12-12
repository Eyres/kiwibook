<div id="profil">
    <img id="avatar" src=<?php echo $context->user->avatar?> > 
    <p id="identite"><?php echo $context->user->prenom." ". $context->user->nom ?></p>
    <p id="birthday"><?php echo $context->user->date_de_naissance->format('Y-m-d')  ?></p>
    <p id="statut"><?php echo $context->user->statut ?></p>
    <a href=kiwibook.php?action=logout id="logout">Deconnectez vous !</a>
    <a href=kiwibook.php?action=index id="logout">Index !</a>
</div>
