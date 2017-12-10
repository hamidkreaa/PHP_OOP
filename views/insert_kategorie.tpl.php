<?php require_once 'views/_head.tpl.php'; ?>
<title>Neues Kategorie</title>
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
<h3>Neues Kategorie eintragen:</h3>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">

Kategorie:<br>
<input style="width:100%;" type="text" name="kategorie"><br><br>

Zeige Kategorien:<br>
<!-- kategorie_id Spicheren-->
<?php fill_select($kategorie); ?>
<br><br>

<input type="hidden" value="submit_neuer_kategorie" name="action">

<input type="submit" value="senden" name="insert_kategorie" class="btn btn-primary"><br><br>
</form>
</div>
</div>
</div>
<?php require_once 'views/_footer.tpl.php'; ?>
</body>
</html>