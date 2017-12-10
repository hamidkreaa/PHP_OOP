<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>Benutzer</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require_once 'views/_nav.tpl.php'; ?>
<?php if ($action=='zeige_teil_nehmmer'): ?>
<?php require '_teil_nehmmer.tpl.php'; ?>
<?php else: ?>
<?php require '_person.tpl.php'; ?>
<?php endif; ?>

</body>
</html>
