<?php
    if (!isset($_SESSION['id'])) {
?>
        <form method="post" action="kiwibook.php?action=login"> 
        <p>
            <label>Pseudo</label> : <input type="text" name="pseudo" /><br>
            <label>Password</label> : <input type="password" name="password" /><br>
            <label><input type="submit" name="submit" value="Valider"></label><br>
        </p>
        </form><br>
<?php
    } else {
?>
    <a href=kiwibook.php?action=logout id="logout">Deconnectez vous !</a>
<?php 
    }
?>
