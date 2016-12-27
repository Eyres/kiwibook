<div id="bandeauNotif">
    <?php if ($context->notification) { ?>
        <div>
            <?php echo $context->getNotification(); ?>
        </div>
    <?php } ?>
</div>