<pre>
<?php

class Position
{
  private $position;
  private $gehalt; 
 

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
 public function getPosition()
  {
    return $this->position;
  }
  public function setPosition($position)
  {
    $this->position = $position;
  }

   public function getGehalt()
  {
    return $this->gehalt;
  }
  public function setGehalt($gehalt)
  {
    $this->gehalt = $gehalt;
  }
  
   

}

class PositionMapper
{
			
			
			function fetchall_positionen($db)
			{
					
					$stmt = $db->query('SELECT * FROM positionen');
					$db_positionen = $stmt->fetchAll();
					unset($stmt);
					
					#var_dump($db_buecher);
					foreach($db_positionen AS $b){
						
						$positionen[] = new Position($b);
						
						
					}
				#var_dump($buecher);
				return $positionen;
			}


			function fetch_position($id,$db)
			{
				
				$stmt = $db->query('SELECT * FROM positionen WHERE id='.$id);
				$db_buch = $stmt->fetch();
				unset($stmt);
				
				$position = new Position($db_buch);
				
				return $position;
				
				
			}
			
			function delete_position($id,$db)
			{
				
				$stmt = $db->prepare('DELETE FROM positionen WHERE id = ?');
				$stmt->execute( array($id) );
				unset($stmt);
				
				header('Location: index.php');
				
			}

			function insert($position,$db)
			{
				
				$position=$buch->getPosition();
				$gehalt=$buch->getGehalt();
				
				$data = array(
				'position' => $position,
				'gehalt' => $gehalt
				);
				var_dump($data);
				
				$stmt = $db->prepare("INSERT INTO positionen (position, gehalt) VALUES 
				(:position,:gehalt)");
				$stmt->execute($data);
				unset($stmt);
				
				
			}
					
}

?>
</pre>