<?php
/
class Kunde{
	
private $id;
private $vorname;
private $nachname;
private $email;
private $pwd;
private $reg_datum;
private $adresse_id;
private $adresse;
private $warenkorb;
	
public function __construct(array $daten = array())
		{
			$this->adresse = new Adresse();  
			#$this->warenkorb = new Warenkorb();  
			$this->setDaten($daten);
		}

public function setDaten(array $daten)
		{
			// wenn $daten nicht leer ist, rufe die passenden Setter auf
			if ($daten) {
				foreach ($daten as $k => $v) {
					$setterName = 'set' . ucfirst($k);
					// pruefe ob ein passender Setter existiert
					if (method_exists($this, $setterName)) {
					  $this->$setterName($v); // Setteraufruf
					}
				}
			}
		}

public function getId()
{
	return $this->id;
}

public function setId($id)
{
	$this->id = $id;
}


public function getVorname()
{
	return $this->vorname;
}

public function setVorname($vorname)
{
	$this->vorname = $vorname;
}


public function getNachname()
{
	return $this->nachname;
}

public function setNachname($nachname)
{
	$this->nachname = $nachname;
}


public function getEmail()
{
	return $this->email;
}

public function setEmail($email)
{
	$this->email = $email;
}


public function getPwd()
{
	return $this->pwd;
}

public function setPwd($pwd)
{
	$this->pwd = $pwd;
}


public function getReg_datum()
{
	return $this->reg_datum;
}

public function setReg_datum($reg_datum)
{
	$this->reg_datum = $reg_datum;
}

public function getAdresse_id()
{
	return $this->adresse_id;
}

public function setAdresse_id($adresse_id)
{
	$this->adresse_id = $adresse_id;
}

/* Ab hier kommen dann die anderen Klassen-Zugriffe */

				function getStrasse(){		
				
					return $this->adresse->getStrasse();		
				}

				function setStrasse($strasse){
					
					$this->adresse->setStrasse($strasse);	
				}
				
				function getHausnr(){		
				
					return $this->adresse->getHausnr();		
				}
				
				function setHausnr($hausnr){
				
				$this->adresse->setHausnr($hausnr);	
				}				
				
				function getPlz(){		

					return $this->adresse->getPlz();		
				}
				
				function setPlz($plz){
					
					$this->adresse->setPlz($plz);	
				}				
				
				function getStadt(){		

					return $this->adresse->getStadt();		
				}
				
				function setStadt($stadt){
					
					$this->adresse->setStadt($stadt);	
				}	
				
				function getLand(){		

					return $this->adresse->getLand();		
				}
				
				function setLand($land){
					
					$this->adresse->setLand($land);	
				}				

}

class KundeMapper
{
						
			function fetchall_kunden($db)
			{
					
					$stmt = $db->query('SELECT kunden.id AS id, kunden.vorname AS vorname, kunden.nachname AS nachname, kunden.email AS email, kunden.pwd AS pwd, kunden.reg_datum AS reg_datum, adressen.id AS adresse_id, adressen.strasse AS strasse, adressen.hausnr AS hausnr, adressen.plz AS plz, adressen.stadt AS stadt, adressen.land AS land FROM kunden
								JOIN adressen
								ON kunden.adresse_id = adressen.id;');
					$db_kunden = $stmt->fetchAll();
					unset($stmt);

					foreach($db_kunden AS $k){
						
						$kunden[] = new Kunde($k);
											
					}

				return $kunden;
			}

			
			function loesche_kunden($kid,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM kunden WHERE id = ?');
				$stmt->execute( array($kid) );
				unset($stmt);
				
				header('Location: index.php');
				
			}

			function insert_kunde(Kunde $kunde,$db)//was ist das typehinting für $db?
			{

				$vorname = $kunde->getVorname();
				$nachname = $kunde->getNachname();
				$email = $kunde->getEmail();
				$pwd = $kunde->getPwd();
				$reg_datum = $kunde->getReg_datum();
				$adresse_id = $kunde->getAdresse_id();
				
				
				$data = array(
				'vorname' => $vorname,
				'nachname' => $nachname,
				'email' => $email,
				'pwd' => $pwd,
				'reg_datum' => $reg_datum,
				'adresse_id' => $adresse_id,
				);
				
				$stmt = $db->prepare("INSERT INTO kunden (vorname, nachname, email, pwd, reg_datum, adresse_id) VALUES 
									(:vorname, :nachname, :email, :pwd, :reg_datum, :adresse_id)");
				$stmt->execute($data);
				unset($stmt);				
			}
}

class Adresse{

private $id;
private $strasse;
private $hausnr;
private $plz;
private $stadt;
private $land;
	
public function __construct(array $daten = array())
		{
 
			$this->setDaten($daten);
		}

public function setDaten(array $daten)
		{
			// wenn $daten nicht leer ist, rufe die passenden Setter auf
			if ($daten) {
				foreach ($daten as $k => $v) {
					$setterName = 'set' . ucfirst($k);
					// pruefe ob ein passender Setter existiert
					if (method_exists($this, $setterName)) {
					  $this->$setterName($v); // Setteraufruf
					}
				}
			}
		}
		
		
public function getId()
{
	return $this->id;
}

public function setId($id)
{
	$this->id = $id;
}

public function getStrasse()
{
	return $this->strasse;
}

public function setStrasse($strasse)
{
	$this->strasse = $strasse;
}

public function getHausnr()
{
	return $this->hausnr;
}

public function setHausnr($hausnr)
{
	$this->hausnr = $hausnr;
}

public function getPlz()
{
	return $this->plz;
}

public function setPlz($plz)
{
	$this->plz = $plz;
}

public function getStadt()
{
	return $this->stadt;
}

public function setStadt($stadt)
{
	$this->stadt = $stadt;
}

public function getLand()
{
	return $this->land;
}

public function setLand($land)
{
	$this->land = $land;
}		
						
}		
		
class AdresseMapper{		
	#hier die Mapper für Adresse	
public function next_id($db){
	
				$stmt = $db->query('SELECT id FROM adressen ORDER BY id DESC LIMIT 1;');
				$last_id = $stmt->fetch();
				unset($stmt);				
				$next_id = (intval($last_id['id']) + 1);				
				return $next_id;				
}	

public function insert_adresse(Adresse $adresse,$db)//was ist das typehinting für $db?
{
	$strasse = $adresse->getStrasse();
	$hausnr = $adresse->getHausnr();
	$plz = $adresse->getPlz();
	$stadt = $adresse->getStadt();
	$land = $adresse->getLand();	
		
		$data = array(
		'strasse' => $strasse,
		'hausnr' => $hausnr,
		'plz' => $plz,
		'stadt' => $stadt,
		'land' => $land
		);	
		$stmt = $db->prepare("INSERT INTO adressen (strasse, hausnr, plz, stadt, land) VALUES 
							(:strasse, :hausnr, :plz, :stadt, :land)");
		$stmt->execute($data);
		unset($stmt);				
	}	
function loesche_adresse($aid,$db)
			{				
				$stmt = $db->prepare('DELETE FROM adressen WHERE id = ?');
				$stmt->execute( array($aid) );
				unset($stmt);	
				header('Location: index.php');				
			}		
}		
?>