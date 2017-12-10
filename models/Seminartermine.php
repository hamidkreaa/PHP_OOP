<?php
#Seminartermine.php


class Seminartermine{
	private $id;
	private $seminar_id;
	private $beginn;
	private $ende;
	private $raum;
	
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
	
  public function getSeminare_id()
  {
    return $this->seminare_id;
  }

  public function setSeminare_id($seminare_id)
  {
    $this->seminare_id = $seminare_id;
  }
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
 class SeminartermineMapper
{
			
			function fetchall_seminartermine($id,$db)
			{
				
					$stmt = $db->query('SELECT id, beginn, ende, raum,seminar_id FROM seminartermine WHERE seminar_id='.$id);
					$db_Seminartermine = $stmt->fetchAll();
					unset($stmt);
                   
					#var_dump($db_seminare);
					foreach($db_Seminartermine AS $b){
						
						$seminartermine[] = new Seminartermine($b);
						
						
					}
				#var_dump($seminar);
				return $seminartermine;
			}


			function fetch_seminartermine($id,$db)
			{
				
				$stmt = $db->query('SELECT seminare.id, titel, beschreibung, preis, kategorien.kategorie, seminartermine.beginn, seminartermine.ende, seminartermine.raum FROM seminare join kategorien on seminare.kategorie_id=kategorien.id join seminartermine on
				seminartermine.seminare_id=seminare.id			
				            WHERE seminare.id='.$id);
				$db_seminar = $stmt->fetch();
				unset($stmt);
				
				$seminar = new Seminartermine($db_seminar);
				
				return $seminartermine;
				
				
			}
			
			function delete_seminartermine($id,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM seminartermine WHERE id = ?');
				$stmt->execute( array($id) );
				unset($stmt);
				
				header('Location: index.php');
				
			}

			function insert($seminartermine,$db)
			{
            	
				$beginn=$seminartermine->getBeginn();
				$ende=$seminartermine->getEnde();
				$raum=$seminartermine->getRaum();
				$seminare_id=$seminartermine->getSeminare_id();
				
				

				$data = array(
				'beginn' => $beginn,
				'ende' => $ende,
				'raum' => $raum,
				'seminare_id' => $seminare_id	
				);
				var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO seminartermine (beginn, ende, raum,seminare_id) VALUES 
				(:beginn,:ende,:raum,:seminare_id)");
				$stmt->execute($data);
				unset($stmt);
				
				
			}
					
}

?>