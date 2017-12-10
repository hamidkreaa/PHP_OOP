<?php
# generate main menue

echo "<h1>Navigation</h1><hr><ul>";
if ($currentScript == "index.php") {
    echo "<li><a href='#' class='active-nav'>Home</a></li>";
} else {
    echo "<li><a href='../index.php'>Home</a></li>";
}
generateMenueItem("Seminare", "seminare.php", $currentScript);
generateMenueItem("Registrieren", "registrieren.php", $currentScript);
generateMenueItem("Über uns", "ueber_uns.php", $currentScript);
generateMenueItem("Kontakt", "kontakt.php", $currentScript);
generateMenueItem("Impressum", "impressum.php", $currentScript);
echo "</ul>";

# generate login form

if (!isset($_SESSION["userVerified"])) {
    ?>
    <hr>
    <form action="#" method="post">
        <fieldset>
            <legend>Anmelden</legend>
            <label for="login_name">E-Mail Adresse</label>
            <input type="email" name="login_name">
            <label for="login_pwd">Passwort</label>
            <input type="password" name="login_pwd">
            <input type="hidden" name="action" value="login">
            <input type="submit" name="login_submit" value="Anmelden">
        </fieldset>
    </form>
    <?php
}

# generate admin menue

if (isset($_SESSION["userVerified"]) && $_SESSION["userVerified"] && $_SESSION["userRight"] == "admin") {
    echo "<h1>Verwaltung</h1><hr><ul>";
    generateMenueItem("Seminare", "admin-seminare.php", $currentScript);
    generateMenueItem("Kategorien", "admin-kategorien.php", $currentScript);
    generateMenueItem("Termine", "admin-termine.php", $currentScript);
    generateMenueItem("Räume", "admin-raeume.php", $currentScript);
    generateMenueItem("Buchungen", "admin-buchungen.php", $currentScript);
    generateMenueItem("Benutzer", "admin-benutzer.php", $currentScript);
    echo "</ul>";
}

# generate logout form

if (isset($_SESSION["userVerified"]) && $_SESSION["userVerified"]) {
    ?>
    <hr>
    <form action="#" method="post">
        <input type="submit" name="login_submit" value="Abmelden" onclick="doLogout();">
    </form>
<?php }
?>