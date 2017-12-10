<?php
#Seminare.php
class Seminare{
	private $id;
	private $titel;
	private $beschreibung;
	private $preis;
	private $kategorie_id;	
	

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
    
  public function getTitel()
  {
    return $this->titel;
  }

  public function setTitel($titel)
  {
    $this->titel = $titel;
  }

  public function getBeschreibung()
  {
    return $this->beschreibung;
  }

  public function setBeschreibung($beschreibung)
  {
    $this->beschreibung = $beschreibung;
  }
  
  
  public function getPreis()
  {
    return $this->preis;
  }

  public function setPreis($preis)
  {
    $this->preis = $preis;
  }
  
    public function getKategorie_id()
  {
    return $this->kategorie_id;
  }

  public function setKategorie_id($kategorie_id)
  {
    $this->kategorie_id = $kategorie_id;
  }
  
  /* Ab hier kommen dann die Kategorie Klassen-Zugriffe */

				public function getKategorie()
                  {
                    return $this->kategorie;
                  }
                  
                 public function setKategorie($kategorie)
                  {
                    $this->kategorie = $kategorie;
                  }	
				  
		/* Ab hier kommen dann die seminartermine Klassen-Zugriffe */	
		
				  public function getBeginn()
                  {
                    return $this->beginn;
                  }  
                 public function setBeginn($beginn)
                  {
                    $this->beginn = $beginn;
                  }	
				  
				   public function getEnde()
                  {
                    return $this->ende;
                  } 
                 public function setEnde($ende)
                  {
                    $this->ende = $ende;
                  }	
				  
				   public function getRaum()
                  {
                    return $this->raum;
                  }  
                 public function setRaum($raum)
                  {
                    $this->raum = $raum;
                  }					  
			  
}

class SeminareMapper
{
			
			function fetchall_seminare($db)
			{
					
					$stmt = $db->query('SELECT seminare.id, titel, beschreibung, preis, kategorien.kategorie FROM seminare
                    join kategorien on seminare.kategorie_id=kategorien.id');
					$db_seminare = $stmt->fetchAll();
					unset($stmt);
                   
					#var_dump($db_seminare);
					foreach($db_seminare AS $b){
						
						$seminar[] = new Seminare($b);
					}
				#var_dump($seminar);
				return $seminar;
			}

			function fetch_seminar($id,$db)
			{
				
			#	$stmt = $db->query('SELECT seminare.id, titel, beschreibung, preis, kategorien.kategorie, seminartermine.beginn, seminartermine.ende, seminartermine.raum FROM seminare join kategorien on seminare.kategorie_id=kategorien.id join seminartermine on seminartermine.seminare_id=seminare.id WHERE seminare.id='.$id);
			
				$stmt = $db->query('SELECT seminare.id, titel, beschreibung, preis, kategorien.kategorie FROM seminare join kategorien on seminare.kategorie_id=kategorien.id WHERE seminare.id='.$id);
				$db_seminar = $stmt->fetch();
				unset($stmt);
				
				$seminar = new Seminare($db_seminar);
				
				return $seminar;
				
			}
			
			function delete_seminar($id,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM seminare WHERE id = ?');
				$stmt->execute( array($id) );
				unset($stmt);
				
				header('Location: index.php');
			}

			function insert($seminar,$db)
			{
				$titel=$seminar->getTitel();
				$beschreibung=$seminar->getBeschreibung();
				$preis=$seminar->getPreis();
				$kategorie_id=$seminar->getKategorie_id();
				
				$data = array(
				'titel' => $titel,
				'beschreibung' => $beschreibung,
				'preis' => $preis,
				'kategorie_id' => $kategorie_id	
				);
				var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO seminare (titel, beschreibung,preis,kategorie_id) VALUES 
				(:titel,:beschreibung,:preis,:kategorie_id)");
				$stmt->execute($data);
				unset($stmt);
			}
					
}

?>
</pre>
  
