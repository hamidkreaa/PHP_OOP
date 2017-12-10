<!-- Teiltemplate für die Anzeige des Buchs in der Foreach-Schleife (Partial) -->

<div class="book">
<?php 
#echo $seminar->getId();
#echo $seminar->getTitel();
#echo $seminar->getBeschreibung();
#echo $seminar->getPreis();
#echo $seminar->getKategorie_id();
#var_dump($seminar);
?>
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


