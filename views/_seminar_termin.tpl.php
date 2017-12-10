<!-- Teiltemplate für die Anzeige des Buchs in der Foreach-Schleife (Partial) -->
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>Bücherliste</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="book">
<p class="titel"><a href="index.php?action=zeige_buch&id=<?php echo $seminar->getId(); ?>">Titel: <b><?php echo $seminar->getTitel(); ?></b></a></p>	
<p>Beschreibung: <b><?php echo $seminar->getBeschreibung(); ?></b></a></p>
<p>Preis <b><?php echo $seminar->getPreis(); ?> €</b></p>	
<p>Kategorie <b><?php echo $seminar->getKategorie(); ?></b></p>	
<?php if ($_SESSION['action']=='zeige_buch'): ?>
<p><a href="index.php?action=zeige_termin&id=<?php echo $seminar->getId(); ?>">Seminar Termin</a></p>
<?php endif; ?>
<?php if (ist_eingeloggt() and $_SESSION['typ']=='A'): ?>
<p><a href="index.php?action=loesche_buch&id=<?php echo $seminar->getId(); ?>">löschen</a></p>
<?php endif; ?>
</div>

<?php include '_table_header.tpl.php';?>
<h2> Seminar Termin<h2>	
<?php foreach($seminartermine as $seminartermin):?> 
<tr><td class="titel">
<a href="index.php?action=zeige_teil_nehmmer&id=<?php echo $seminartermin->getId(); ?>"><?php echo $seminartermin->getBeginn(); ?></a>	
</td><td>
<?php
	echo $seminartermin->getEnde();
?>
</td><td>
<?php
	echo $seminartermin->getRaum();
?>
</td><td>
	<?php if (ist_eingeloggt() and $_SESSION['typ']=='A'): ?>
	<a href="index.php?action=loesche_seminartermine&id=<?php echo $seminartermin->getId(); ?>">löschen</a>
	<?php endif; ?>	
	<?php if (ist_eingeloggt() and $_SESSION['typ']=='N'): ?>
	<a href="index.php?action=seminar_teil_nehmen&id=<?php echo $seminartermin->getId(); ?>">Teilnehmen</a>
	
	<!-- need to be complated *******
	<p ><a href="index.php?action=loesche_teil_nehmmer&id1=<?php echo $nimmt_teil->getSeminartermin_id();?>&id2=<?php echo $nimmt_teil->getBenutzer_id();?>">löschen</a></p> 
	***********-->
	
	<?php endif; ?>	
</</td></tr>
<?php endforeach; ?>
</table>
<h2> Seminar Teilnehmer<h2>	
<?php include '_person_table_header.tpl.php';?>
<?php
#var_dump($nimmt_teil);
 
?>		
<?php foreach($nimmt_teil as $nimmt_teil):?> 	
<tr><td>
<?php
	echo $nimmt_teil->getAnrede();
?>
</td><td class="titel">
<?php echo $nimmt_teil->getVorname(); ?></a>	
</td><td>
<?php
	echo $nimmt_teil->getNachname();
?>
</td><td>
<?php
	echo $nimmt_teil->getEmail();
?>
</td><td>
<?php
	echo $nimmt_teil->getRegistriert_seit();
?>
</td><td>
	<?php if (ist_eingeloggt() and $_SESSION['typ']=='A'): ?>
	<a href="index.php?action=loesche_teil_nehmmer&id=<?php echo $nimmt_teil->getBenutzer_id(); ?>">löschen</a>
    <?php endif; ?>	
</</td></tr>
<?php endforeach; ?>
</table>
</body>

</html>



