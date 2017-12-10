<?php require_once 'views/_head.tpl.php'; ?>
<title>Neues Buch</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require_once 'views/_nav.tpl.php'; ?>
<br>
<div class="container">
        <div class="row">
		
            <div class="col-sm-3">
                <div class="suchbox"></div>
            </div>
			
			
            <div class="col-sm-9">
<div class="form">

<h3>Neuer Benutzer eintragen:</h3>

<form method="GET" action="">

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<input type="radio" name="anrede" value="Herr" checked>Herr
<input type="radio" name="anrede" value="Frau">Frau<br><br>
Vorname:<br>
<input style="width:100%;" type="text" name="vorname"><br><br>

Nachname:<br>
<input style="width:100%;" type="text" name="nachname"><br><br>

E_mail:<br>
<input style="width:100%;" type="text" name="email"><br><br>

Passwort:<br>
<input style="width:100%;" type="text" name="passwort"><br><br>

<input type="hidden" name="registriert_seit" value="<?php echo date("Y-m-d"); ?>">

<input type="hidden" value="submit_neuer_benutzer" name="action">

<input type="submit" value="senden" name="insert_benutzer" class="btn btn-primary"><br><br>
</form>
</div>
</div>
</div>
<?php require_once 'views/_footer.tpl.php'; ?>
</body>
</html>