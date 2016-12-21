<?php foreach ($context->data as $user) { ?>
    <div id="profil">
        <a href="?action=profil&id=<?php echo $user->id; ?>"
           title="vers profil de <?php echo $user->prenom." ".$user->nom; ?>">
            <div class="well">
                <div class="row">
                    <div class="col-md-2 hidden-xs">
                        <img src='<?php echo $user->avatar; ?>' alt='avatar' width='50' height='50'/>
                    </div>
                    <div class="col-md-10 col-xs-12">
                        <p id="birthday"><?php echo $user->date_de_naissance->format('Y-m-d') ?></p>
                        <p id="statut"><?php echo $user->statut ?></p>
                        <p id="identite"><?php echo $user->prenom." ".$user->nom ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php } ?>