<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>Benutzer liste</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<!-- <?php require_once 'views/_nav.tpl.php'; ?> -->

<?php
#var_dump($nimmt_teil);

foreach($nimmt_teil as $nimmt_teil){ 

require '_teil_nehmmer.tpl.php';
}

?>
</body>

</html>