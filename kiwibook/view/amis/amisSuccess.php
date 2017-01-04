<?php foreach ($context->amis as $user) { ?>
    <div id="profil">
        <a href="?action=profil&id=<?php echo $user->getId(); ?>"
           title="vers profil de <?php echo $user->getPrenom()." ".$user->getNom(); ?>">
            <div class="well">
                <div class="row">
                    <div class="col-md-2 hidden-xs">
                        <?php if (!empty($user->getAvatar())) { ?>
                            <img src='<?php echo $user->getAvatar(); ?>' alt='avatar' width='50' height='50'/>
                        <?php } else { ?>
                            <img class="img-responsive" src="images/defaut.png" width='50' height='50'>
                        <?php } ?>
                    </div>
                    <div class="col-md-10 col-xs-12">
                        <p id="birthday"><?php echo $user->getDateDeNaissance()->format('Y-m-d') ?></p>
                        <p id="statut"><?php echo $user->getStatut() ?></p>
                        <p id="identite"><?php echo $user->getPrenom()." ".$user->getNom() ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php } ?>
<div id="new-amis"></div>

<button role="button" class="btn btn-info btn-block center-block" id="plus-de-amis">suivant...</button>
