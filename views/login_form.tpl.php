<?php require_once 'views/_head.tpl.php'; ?>
<title>Login</title>
</head>
<body>
<div class="container">
        <div class="row">
		
            <div class="col-sm-3">
                <div class="suchbox"></div>
            </div>
			
			
            <div class="col-sm-9">


<div class="form">

<h3>Melden Sie sich an!</h3>

<form method="GET" action="">

<div class="form-group">
<label for="Email">Email:</label>
<input type="text" name="email" class="form-control">
</div>

<div class="form-group">
<label for="Passwort">Passwort:</label>
<input type="text" name="passwort" class="form-control">
</div>

<input type="hidden" value="login_user" name="action">

<input type="submit" value="senden" name="login" class="btn btn-primary"><br><br>

</form>

</div>
</div>
</div>
</div>

<?php require_once 'views/_footer.tpl.php'; ?>
</body>
</html>