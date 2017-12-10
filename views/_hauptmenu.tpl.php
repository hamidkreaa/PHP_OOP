<nav>
    <ul>
        <li><a href="index.php">Index</a></li>
        
		<?php if ($_SESSION['typ']=='A'): ?>
		<li><a href="index.php?action=neues_seminar">Neues Seminar</a><br></li>
		<li><a href="index.php?action=neues_kategorie">Neues Kategorie</a><br></li>
		<li><a href="index.php?action=neuer_benutzer">Neue Kunde</a></li>
		<li><a href="index.php?action=alle_kunde">Alle Kunde</a></li> 
		<?php endif; ?>
		
        <li><a href="index.php?action=logout">Logout</a><br></li>
    </ul>
</nav>
