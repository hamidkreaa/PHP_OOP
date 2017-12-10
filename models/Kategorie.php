<?php
#Kategorie.php
class Kategorie{
	private $id;
	private $kategorie;
	

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
		if (isset($daten['id'])) $this->id=$daten['id'];
      }
    }
  }

   public function getId()
  {
    return $this->id;
  }
 
	
  public function getKategorie()
  {
    return $this->kategorie;
  }
  
 public function setKategorie($kategorie)
  {
    $this->kategorie = $kategorie;
  }
}

class KategorieMapper
{
			
			function fetchall_kategorie($db)
			{
					
					$stmt = $db->query('SELECT id, kategorie FROM kategorien');
					$db_kategorie = $stmt->fetchAll();
					unset($stmt);
                   
					#var_dump($db_seminare);
					foreach($db_kategorie AS $b){
						
						$kategorie[] = new Kategorie($b);
					}
				#var_dump($seminar);
				return $kategorie;
			}

			function fetch_kategorie($id,$db)
			{
				
				$stmt = $db->query('SELECT id, kategorie FROM kategorien 
				            WHERE id='.$id);
				$db_kategorie = $stmt->fetch();
				unset($stmt);
				
				$kategorie = new Kategorie($db_kategorie);
				
				return $kategorie;
				
			}
			
			function delete_kategorie($id,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM kategorien WHERE id = ?');
				$stmt->execute( array($id) );
				unset($stmt);
				
				header('Location: index.php');
			}

			function insert_kategorie($kategorie,$db)
			{
				$kategorie=$kategorie->getKategorie();				
				$data = array(
				'kategorie' => $kategorie
				);
				var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO kategorien (kategorie) VALUES 
				(:kategorie)");
				$stmt->execute($data);
				unset($stmt);
			}
					
}

?>