<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand active" href="?action=index">Accueil</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if ($context::getSessionAttribute('id')) { ?>
                    <li class="active"><a href="?action=profil">Profil</a></li>
                    <li><a href="?action=amis">Liste d'amis</a>
                    <li><a href="?action=mur">Mur</a></li>
                    <li><a href="#" id="chat-button-window">Chat</a></li>
                <?php } ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php if ($context::getSessionAttribute('id')) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Déconnection<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href=?action=logout id="logout">Deconnectez vous !</a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Connection<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php include('loginForm.php'); ?>
                            </li>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
