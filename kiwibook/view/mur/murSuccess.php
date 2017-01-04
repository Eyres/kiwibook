<div class="row">
    <form name="form" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label title="texte" class="col-sm-3 control-label required" for="texte">
                Votre texte
            </label>
            <div class="col-sm-9">
                <textarea id="texte" name="texte" required="required" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label title="image" class="col-sm-3 control-label" for="image">image</label>
            <div class="col-sm-9">
                <input type="file" id="image" name="image"/>
            </div>
        </div>
        <div class="form-group">
            <button type="button" id="texte-submit" name="envoyer" class="btn btn-info center-block"
                    value="Envoyer">
                <span>Envoyer</span>
            </button>
        </div>
    </form>
</div>
<?php foreach ($context->__get('message') as $message) { ?>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-3">
                <?php if (!empty($message->getEmetteur()->getAvatar())) { ?>
                    <img class="img-responsive" src="<?php echo $message->getEmetteur()->getAvatar(); ?>">
                <?php } else { ?>
                    <img class="img-responsive" src="images/defaut.png">
                <?php } ?>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>De :
                            <?php echo $message->getEmetteur()->getNom(); ?>
                            <?php echo $message->getEmetteur()->getPrenom(); ?>
                        </h6>
                        <?php if ($message->getDestinataire() && $message->getEmetteur()) { ?>
                            <?php if ($message->getDestinataire()->getId() !== $message->getEmetteur()->getId()) { ?>
                                <h6>
                                    à
                                    <?php echo $message->getDestinataire()->getNom(); ?>
                                    <?php echo $message->getDestinataire()->getPrenom(); ?>
                                </h6>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-9">
                        <p><?php echo $message->getPost()->getTexte(); ?></p>
                        <?php if (!empty($message->getPost()->getImage())) { ?>
                            <img class="img-responsive" src="<?php echo $message->getPost()->getImage(); ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-push-9">
                <button id="like-<?php echo $message->getId(); ?>" class="btn btn-danger">
                    <?php echo empty($message->getAime()) ? 0 : $message->getAime(); ?>
                </button>
                <button id="partage-<?php echo $message->getId(); ?>" class="btn btn-primary">
                    Partager
                </button>
            </div>
        </div>
    </div>
<?php } ?>
<div id="new-message"></div>

<button role="button" class="btn btn-info btn-block center-block" id="plus-de-post">suivant...</button>
