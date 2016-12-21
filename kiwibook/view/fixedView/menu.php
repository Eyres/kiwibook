<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="kiwibook.php?action=index">Index</a>
    </div>
    <ul class="nav navbar-nav">
        <?php if ($context::getSessionAttribute('id')) { ?>
            <li class="active"><a href="kiwibook.php?action=profil">Profil</a></li>
            <li><a href="kiwibook.php?action=showUsers">Liste d'amis</a>
            <li><a href="kiwibook.php?action=showMessage">Mur</a></li>
            <li><a href="#" id="chat-button-window">Chat</a></li>
        <?php } else { ?>
            <li class="active">
                <a href="kiwibook.php?action=inscription">s'inscrire</a>
            </li>
        <?php } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php if ($context::getSessionAttribute('id')) { ?>
            <li class="active">
                <a href=kiwibook.php?action=logout id="logout">Deconnectez vous !</a>
            </li>
        <?php } else { ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Login<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php include('loginForm.php'); ?>
                </ul>
            </li>

        <?php } ?>
    </ul>
</nav>
