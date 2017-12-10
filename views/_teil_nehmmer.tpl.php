<!-- Teiltemplate für die Anzeige des Buchs in der Foreach-Schleife (Partial) -->

<div class="book">
<?php 
#$anrede=$nimmt_teil->getAnrede();
#$vorname=$nimmt_teil->getvorname();
#$nachname=$nimmt_teil->getNachname();
#$email=$nimmt_teil->getEmail();
#$registriert_seit=$nimmt_teil->getRegistriert_seit();
#$passwort=$nimmt_teil->getPasswort();
#var_dump($nimmt_teiler);
?>

<p>Anrede: <b><?php echo $nimmt_teil->getAnrede(); ?></b></a></p>	
<p class="titel">Vorname: <b><?php echo $nimmt_teil->getVorname(); ?></b></p>
<p>Nachname: <b><?php echo $nimmt_teil->getNachname(); ?> </b></p>	
<p>Email: <b><?php echo $nimmt_teil->getEmail(); ?></b></p>	
<p>Registriert Seit: <b><?php echo $nimmt_teil->getRegistriert_seit(); ?></b></p>	
<p>Passwort: <b><?php echo $nimmt_teil->getPasswort(); ?></b></p>	
<p ><a href="index.php?action=loesche_teil_nehmmer&id1=<?php echo $nimmt_teil->getSeminartermin_id();?>&id2=<?php echo $nimmt_teil->getBenutzer_id();?>">löschen</a></p>
</div>




