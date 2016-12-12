<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="kiwibook.php?action=index">Index</a>
        </div>
        <?php if ($context::getSessionAttribute('id')) { ?>
            <ul class="nav navbar-nav">
                <li class="active"><a href="kiwibook.php?action=profil">Profil</a></li>
                <li><a href="kiwibook.php?action=showUsers">Liste d'amis</a>
                <li><a href="kiwibook.php?action=showMessage">Mur</a></li>
                <li><a href="#" id="chat-button-window">Chat</a></li>
            </ul>
        <?php } ?>
        <ul class="nav navbar-nav navbar-right">
            <li> <?php include('loginForm.php'); ?> </li>
        </ul>
    </div>
</nav>