<?php require_once 'views/_head.tpl.php'; ?>
<form method="GET" action="">
<div class="form-group">
<label for="Email">Email:</label>
<input type="text" name="email" class="form-control">
</div>

<div class="form-group">
<label for="Passwort">Passwort:</label>
<input type="text" name="passwort" class="form-control">
</div>

<input type="hidden" value="login_user" name="action">

<input type="submit" value="senden" name="login" class="btn btn-primary"><br><br>
</form>

<nav>
    <ul>
        <li><a href="index.php?action=neuer_benutzer">Neue Kunde</a><br></li>
        <li><a href="index.php">Index</a></li>
    </ul>
</nav>
</div>


