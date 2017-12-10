<?php
#Kategorie.php
class Nimmt_teil{
	
	private $seminartermin_id;
	private $benutzer_id;
	
	
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

 
  public function getSeminartermin_id()
  {
    return $this->seminartermin_id;
  }
  public function setSeminartermin_id($seminartermin_id)
  {
    $this->seminartermin_id = $seminartermin_id;
  }
  
  public function getBenutzer_id()
  {
    return $this->benutzer_id;
  }  
  public function setBenutzer_id($benutzer_id)
  {
    $this->benutzer_id = $benutzer_id;
  }
  
   /* Ab hier kommen dann die Person Klassen-Zugriffe */
  public function getAnrede()
  {
    return $this->anrede;
  }
  public function setAnrede($anrede)
  {
    $this->anrede = $anrede;
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
  
   public function getRegistriert_seit()
  {
    return $this->registriert_seit;
  }
  public function setRegistriert_seit($registriert_seit)
  {
    $this->registriert_seit = $registriert_seit;
  }
  
 public function getPasswort()
  {
    return $this->passwort;
  }
  public function setPasswort($passwort)
  {
    $this->passwort = $passwort;
  } 
}

class Nimmt_teilMapper
{
			
			function fetchall_nimmt_teil($id,$db)
			{
				
				$stmt = $db->query('SELECT benutzer_id, seminartermin_id, benutzer.id, anrede, vorname, nachname, email, registriert_seit, passwort  FROM nimmt_teil join benutzer on nimmt_teil.benutzer_id=benutzer.id WHERE seminartermin_id='.$id);
					
				$db_Nimmt_teil = $stmt->fetchAll();
				unset($stmt);
			   
				#var_dump($db_seminare);
				foreach($db_Nimmt_teil AS $b){
					
					$nimmt_teil[] = new Nimmt_teil($b);
					
				}
				#var_dump($nimmt_teil);
				return $nimmt_teil;
			}
			
			function insert_teil_nehmer($id1,$id2,$db)
			{				
				$data = array(
				'seminartermin_id' => $id1,
				'benutzer_id' => $id2,
				);
				var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO nimmt_teil (seminartermin_id, benutzer_id) VALUES 
				(:seminartermin_id,:benutzer_id)");
				$stmt->execute($data);
				unset($stmt);
				header('Location: index.php');				
			}
			
			function delete_teil_nehmmer($id1,$id2,$db)
			{
				$stmt = $db->prepare('DELETE FROM nimmt_teil WHERE seminartermin_id = ? and benutzer_id= ?');
				$stmt->execute( array($id1,$id2) );
				unset($stmt);				
				header('Location: index.php');
				
			}		
}

?>