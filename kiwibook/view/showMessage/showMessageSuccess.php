<?php
foreach ($context->messages as $message) {
    ?>
<p>
<d<div class="container-fluid">
  <div class="row messageHeader" >
    <div class="col-sm-4" style="background-color:black;">
        <img class="img-responsive" src="<?php echo $message["emetteur"]->avatar;?>">
    </div>
    <div class="col-sm-4" style="background-color:black;">
        <h2><?php echo $message["emetteur"]->nom;?> 
        <?php echo $message["emetteur"]->prenom;?>
        ->
        <?php echo $message["destinataire"]->nom;?> 
        <?php echo $message["destinataire"]->prenom;?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12" style="background-color:black;">
    <p>  <?php echo $message["post"]->texte;?></p>
    </div>
  </div>
</div>
</p>
<?php
}

?>