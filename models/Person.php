<pre>
<?php

class Person
{
  private $anrede;
  private $vorname;
  private $nachname; 
  private $email;
  private $registriert_seit;
  private $passwort; 

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

class PersonMapper
{
			
			
/* 			function __constructor(){
				
				$mapper = new PersonMapper
				
			} */
			
			function fetchall_personen($db)
			{
					
					$stmt = $db->query('SELECT id, anrede, vorname, nachname, email, registriert_seit, passwort FROM benutzer');
					$db_personen = $stmt->fetchAll();
					unset($stmt);
					
					#var_dump($db_personen);
					foreach($db_personen AS $b){
						
						$personen[] = new Person($b);	
						
					}
				#var_dump($personen);
				return $personen;
			}

			function finde_benutzer($person,$db){
				
				#var_dump($person);
				
				$email = "'".$person->getEmail()."'";
				#echo $email."<br>";
				$pwd = $person->getPasswort();
				#echo $pwd."<br>";				
				$stmt = $db->query('SELECT id, anrede, vorname, nachname, email, registriert_seit, passwort FROM benutzer
				WHERE email='.$email);
				$db_person = $stmt->fetch();
				unset($stmt);
				#var_dump($db_person);
				if (!$db_person){
					header('Location: index.php');
					die("Unable to login. Register your data.");	
					exit;
				}
				$person = new Person($db_person);
				var_dump($person);
				$db_pwd = $person->getPasswort();
				echo $db_pwd;
						if($pwd == $db_pwd){ 
							return $person;				
						}else{					
							die("Unable to login. Login data not correct.");					
						}
				
			}
			function fetch_benutzer($id,$db)
			{
				
				$stmt = $db->query('SELECT id, anrede,vorname, nachname, email, registriert_seit, passwort FROM benutzer
				WHERE id='.$id);
				$db_person = $stmt->fetch();
				unset($stmt);
				
				$person = new Person($db_person);
				
				return $person;
				
				
			}
			
			function delete_benutzer($id,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM benutzer WHERE id = ?');
				$stmt->execute( array($id) );
				unset($stmt);
				
				header('Location: index.php');
				
			}

			function insert($person,$db)
			{
				$anrede=$person->getAnrede();
				$vorname=$person->getvorname();
				$nachname=$person->getNachname();
				$email=$person->getEmail();
				$registriert_seit=$person->getRegistriert_seit();
				$passwort=$person->getPasswort();
				
				$data = array(
				'anrede' => $anrede,
				'vorname' => $vorname,
				'nachname' => $nachname,
				'email' => $email,
				'registriert_seit' => $registriert_seit,
				'passwort' => $passwort,
				);
				#var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO  benutzer (anrede, vorname, nachname, email, registriert_seit, passwort) VALUES 
				(:anrede, :vorname,:nachname,:email,:registriert_seit,:passwort)");
				$stmt->execute($data);
				unset($stmt);
				
				
			}
					
}

?>
</pre>