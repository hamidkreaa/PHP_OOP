<?php
session_start();
require_once 'models/Seminare.php';
require_once 'models/Seminartermine.php';
require_once 'models/Nimmt_teil.php';
require_once 'models/Kategorie.php';
require_once 'models/Person.php';

require_once 'inc/database.inc.php';
require_once 'inc/funktionen.inc.php';
if (ist_eingeloggt()){
	require_once 'views/_hauptmenu.tpl.php'; //View 
}else {
	require_once 'views/_nav.tpl.php'; //View
}

if(isset($_GET['action'])){ $action = $_GET['action']; }else{ $action = null; }

echo $action;
$_SESSION['action']='';
switch($action){
	case 'login':				
				require_once 'views/login_form.tpl.php'; //View 					
				break;
				
	case 'login_user':
				echo $action;
				var_dump($_REQUEST);
				if(isset($_REQUEST['login'])){
				$person = new Person ($_REQUEST);

				$mapper = new PersonMapper;
				$person = $mapper->finde_benutzer($person,$db);	
				
				logge_ein($person->getId(),$person->getEmail(),$person->getVorname(),$person->getNachname());
							
				}
				$mapper = new SeminareMapper;
				$seminare = $mapper->fetchall_seminare($db); //Model
				
				header('Location: index.php');
				
				#require_once 'views/_hauptmenu.tpl.php'; //View 
				break;
				
	case 'logout':
				logout();
				$mapper = new SeminareMapper;
				$seminare = $mapper->fetchall_seminare($db); //Model
				require_once 'views/zeige_buecher.tpl.php'; //View 
				break;
				
	case 'neuer_benutzer':
			require_once 'views/insert_form.tpl.php';			
			break;
				
	case 'submit_neuer_benutzer':
		#echo $action;
				#var_dump($_REQUEST);
				
				if(isset($_REQUEST['insert_benutzer'])){	
				
					$person = new Person ($_REQUEST);				
					$mapper = new PersonMapper;
					$mapper->insert($person,$db);
					#var_dump($person);																		
				}
				header('Location: index.php?action=alle_kunde');
				
	case 'neues_kategorie':
			$mapper = new KategorieMapper;
			$kategorie = $mapper->fetchall_kategorie($db); //Model
			#echo "<pre>";
			#var_dump($kategorie);
			#echo "</pre>";
			#echo "TYPE:".gettype($kategorie)."<BR/>";	
			require_once 'views/insert_kategorie.tpl.php';			
			break;
				
	case 'submit_neuer_kategorie':
		#echo $action;
		echo "<pre>";
				var_dump($_REQUEST);
			echo "</pre>";	
				if(isset($_REQUEST['insert_kategorie'])){
					
					$kategorie = new Kategorie ($_REQUEST);				
					$mapper = new KategorieMapper;
					$mapper->insert_kategorie($kategorie,$db);
					#var_dump($kategorie);															
				}
				header('Location: index.php');
				
	case 'neues_seminar':
			$mapper = new KategorieMapper;
			$kategorie = $mapper->fetchall_kategorie($db); //Model
			#echo "<pre>";
			#var_dump($kategorie);
			#echo "</pre>";
			#echo "TYPE:".gettype($kategorie)."<BR/>";	
			require_once 'views/insert_seminar.tpl.php';			
			break;
				
	case 'submit_neuer_seminar':
			#echo $action;
			#echo "<pre>";
				#var_dump($_REQUEST);
			#echo "</pre>";	
				if(isset($_REQUEST['insert_seminar'])){
					
					$seminar = new Seminare ($_REQUEST);				
					$mapper = new SeminareMapper;
					$mapper->insert($seminar,$db);
					#var_dump($seminar);													
				}
				header('Location: index.php');
				
	case 'zeige_buch':				
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$_SESSION['action']='zeige_buch';
					$mapper = new SeminareMapper;
					//Einen bestimmten Datensatz holen
					$id = $_REQUEST['id'];	
					#echo "ID =".$id;					
					$seminar = $mapper->fetch_seminar($id,$db);				
					require_once 'views/zeige_buch.tpl.php'; //View 	
				}
				break;
				
				
	case 'loesche_buch':
	
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new SeminareMapper;
					//Einen bestimmten Datensatz löschen
					$id = $_REQUEST['id'];				
					$buch = $mapper->delete_seminar($id,$db);				
				}
				break;
				
	case 'zeige_termin':				
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$_SESSION['action']='zeige_termin';
					$mapper = new SeminareMapper;
					//Einen bestimmten Datensatz holen
					$id = $_REQUEST['id'];	
					#echo "ID =".$id;					
					$seminar = $mapper->fetch_seminar($id,$db);	
					$mapper = new SeminartermineMapper;
					$seminartermine = $mapper->fetchall_seminartermine($id,$db);
					if (!$seminartermine){
						header('Location: index.php');
						die("Unable to login. Register your data.");	
						exit;
					}
					$mapper = new Nimmt_teilMapper;
					//Einen bestimmten Datensatz holen
					$id = $_REQUEST['id'];				
					$nimmt_teil = $mapper->fetchall_nimmt_teil($id,$db);					
					require_once 'views/_seminar_termin.tpl.php'; //View 	
				}
				break;
				
	case 'loesche_seminartermine':
	
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new SeminartermineMapper;
					//Einen bestimmten Datensatz löschen
					$id = $_REQUEST['id'];				
					$buch = $mapper->delete_seminartermine($id,$db);				
				}
				break;
				
	case 'zeige_teil_nehmmer':
					if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new Nimmt_teilMapper;
					//Einen bestimmten Datensatz holen
					$id = $_REQUEST['id'];				
					$nimmt_teil = $mapper->fetchall_nimmt_teil($id,$db);				
					require_once 'views/zeige_teil_nehmmer.tpl.php'; //View 	
				}
				break;					
	case 'zeige_person':
					if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new PersonMapper;
					//Einen bestimmten Datensatz holen
					$id = $_REQUEST['id'];				
					$person = $mapper->fetch_benutzer($id,$db);				
					require_once 'views/zeige_person.tpl.php'; //View 	
				}
				break;	
	case 'alle_kunde':
	
				$mapper = new PersonMapper;
				$personen = $mapper->fetchall_personen($db); //Model
				require_once 'views/zeige_personen.tpl.php'; //View 
				break;
				
	case 'loesche_benutzer':	
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new PersonMapper;
					//Einen bestimmten Datensatz löschen
					$id = $_REQUEST['id'];				
					$buch = $mapper->delete_benutzer($id,$db);				

				}
				break;
				
	case 'seminar_teil_nehmen':
	
				if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					$mapper = new Nimmt_teilMapper;
					//Einen bestimmten Datensatz löschen
					$id1 = $_REQUEST['id'];	
					$id2 = $_SESSION['user_id'];
					$buch = $mapper->insert_teil_nehmer($id1,$id2,$db);				
					require_once 'views/zeige_teil_nehmmer.tpl.php'; //View 	
				}
				break;						
	case 'loesche_teil_nehmmer':
	
				if(isset($_REQUEST['id1']) && !empty($_REQUEST['id1'])){
					$mapper = new Nimmt_teilMapper;
					//Einen bestimmten Datensatz löschen
					$id1 = $_REQUEST['id1'];	
					$id2 = $_REQUEST['id2'];
					$buch = $mapper->delete_teil_nehmmer($id1,$id2,$db);				

				}
				break;			
	default:	
				//Falls kein Fall gewählt, dann per Default alle Bücher zeigen
				$mapper = new SeminareMapper;
				$seminare = $mapper->fetchall_seminare($db); //Model
				require_once 'views/zeige_buecher.tpl.php'; //View 
				break;	
}

if(isset($_REQUEST['submit'])){
	
	$buch = new Buch ($_REQUEST);
	
	$mapper = new BuchMapper;
	$mapper->insert($buch,$db);
		
}	


?>

