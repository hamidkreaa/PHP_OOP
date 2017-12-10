<?php

function logout(){
	
	unset($_SESSION['user_id']);
	session_destroy();
	header('Location:index.php');
}

function logout_admin(){
	
	unset($_SESSION['user_id']);
	session_destroy();
	header('Location:admin.php');	
		
}

function check_session(){
	
	if(!isset($_SESSION['user_id'])){		
		die("Loggen Sie sich bitte ein!");	
	}
	
}
function fill_select($kategorie_array)
{
	#echo "fill_Select:";
	#echo "TYPE:".gettype($kategorie)."<BR/>";
	
	echo "<select name = 'kategorie_id'>";
	foreach($kategorie_array as $kategorie_obj){ 				
		echo '<option value="'.$kategorie_obj->getId().'">'.
		$kategorie_obj->getKategorie().'</option>';	
    }	
	echo '</select>';
	#catch(PDOException $e)
 #   {
 #   echo $sql . "<br>" . $e->getMessage();
  #  }

} 



?>
<?php
   
    function redirect($datei)
    {
        header('Location: ' . $datei);
        exit;
    }
    
    function ist_eingeloggt()
    {
        if (isset($_SESSION['eingeloggt'])) {
            return true;
        } else {
            return false;
        }
    }
    
    function logge_ein($id,$email,$vorname,$nachname)
    {
        $_SESSION['eingeloggt'] = $email;
		$_SESSION['typ'] = 'N';
		$_SESSION['nachname'] = $nachname;
		$_SESSION['vorname'] = $vorname;
		$_SESSION['user_id'] = $id;
    }
    
    function logge_aus()
    {
        unset($_SESSION['eingeloggt']);
    }
?>