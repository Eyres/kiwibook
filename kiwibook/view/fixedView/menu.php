<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="kiwibook.php?action=login">Index</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="kiwibook.php?action=login">Profil</a></li>
          <li><a href=kiwibook.php?action=showUsers>Liste d'amis</a>
          <li><a href=kiwibook.php?action=showMessage>Mur</a></li>
          <li><a href=kiwibook.php?action=showChats>Chat</a></li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(/*$_SESSION['logged'] === true*/true){ ?>
      <li> <?php include('loginForm.php'); ?> </li>
      <li><a href="kiwibook.php?action=inscription">s'inscrire</a></li>
    <?php } 
     else {?>
      <li><?php include('/profile.php'); ?></li>
      <li><a href="kiwibook.php?action=logout">deconnecter</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>