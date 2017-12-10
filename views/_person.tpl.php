<!-- Teiltemplate für die Anzeige des Buchs in der Foreach-Schleife (Partial) -->

<div class="book">
<?php 
#$anrede=$person->getAnrede();
#$vorname=$person->getvorname();
#$nachname=$person->getNachname();
#$email=$person->getEmail();
#$registriert_seit=$person->getRegistriert_seit();
#$passwort=$person->getPasswort();
#var_dump($person);
?>
<p>Anrede: <b><?php echo $person->getAnrede(); ?></b></a></p>	
<p ><a href="index.php?action=zeige_person&id">Vorname: <b class="titel"><?php echo $person->getVorname(); ?></b></a></p>
<p>Nachname: <b class="titel"><?php echo $person->getNachname(); ?> </b></p>	
<p>Email: <b><?php echo $person->getEmail(); ?></b></p>	
<p>Registriert Seit:<br> <b><?php echo $person->getRegistriert_seit(); ?></b></p>	
<p>Passwort: <b><?php echo $person->getPasswort(); ?></b></p>	
<p ><a href="index.php?action=loesche_benutzer&id=<?php echo $person->getId(); ?>">löschen</a></p>
</div>
