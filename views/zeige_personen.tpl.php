<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>Benutzer liste</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php require_once 'views/_nav.tpl.php'; ?>
<!-- Anstelle der Einzelausgabe wie in zeige_buch.tpl.php sollen hier alle Bücher angezeigt werden -->

<?php
#var_dump($personen);
foreach($personen as $person){ 

require '_person.tpl.php';	//_buch.tpl.php ist ein Teiltemplate(Partial), nur für die Präsentation des Buches in diesem Fall
//in einer Foreach-Schleife kein require_once sondern require, sonst wird es beim zweiten Mal nicht mehr aufgerufen
		
}

?>
</body>

</html>