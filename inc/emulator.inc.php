<?php

// Emuliert ein "SELECT * FROM buecher"

function hole_personen()
{
  $personen = array();
  $personen[] = new Person(
    array(
      'vorname' => 'Joe',
      'nachname' => 'Doe',
      'strasse' => 'Bali',
      'haus_nr' => '15',
      'ort' => 'Berlin',
      'plz' => '12312',
      'email' => 'joe@doe.de',
      'mobil' => '12561726',
      'telefon' => '030-7654762354',
      'position_id' => 2	  
    )
  );
  $personen[] = new Person(
    array(
      'vorname' => 'Jack',
      'nachname' => 'Doe',
      'strasse' => 'YOrk',
      'haus_nr' => '43e',
      'ort' => 'Berlin',
      'plz' => '17465',
      'email' => 'jack@doe.de',
      'mobil' => '0319561726',
      'telefon' => '030-3454523',
      'position_id' => 1	
    )
  );
  return $personen;
}

// Emuliert ein "SELECT * FROM buecher WHERE id=:id"

function hole_Person($id)
{
  $personen = hole_Personen();

  $person = null;
  if (isset($personen[$id])) {
    $person = $personen[$id];
  }
  return $person;
}

?>