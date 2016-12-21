<?php foreach ($context->messages as $message) { ?>
    <div class="row messageHeader">
        <div class="col-sm-6" style="background-color:black;">
            <img class="img-responsive" src="<?php echo $message["emetteur"]->avatar; ?>">
        </div>
        <div class="col-sm-6" style="background-color:black;">
            <h6><?php echo $message["emetteur"]->nom; ?>
                <?php echo $message["emetteur"]->prenom; ?>
                ->
                <?php echo $message["destinataire"]->nom; ?>
                <?php echo $message["destinataire"]->prenom; ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="background-color:black;">
        </div>
    </div>
    <p><?php echo $message["post"]->texte; ?></p>
    <?php
}
?>
