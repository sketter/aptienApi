<?php

$url = 'https://adme.aptien.com/ws.wsdl';
$user = '{USER_MAIL}';
$password = '{USER_PASSWORD}';


$options = array(
	'login' => $user,
	'password' => $password,
);
$client = new SoapClient($url, $options);

// TEST ID //
// 1609 // Razítko - Cara
// 2853 // Sídlo na míru - transparentní samolepka S,T 05/23

$id = $_GET['aptienId'];
if($id){
	$ver = array("id" => $id);
	$quates = $client->vratDetailPolozky($ver);
	
	$strom = $quates->strom;
	echo '<h1>Výpis atributů zakázky ID: '.$id.'</h1><br>';
	foreach($strom->skupinyAtributu->atributy as $atributy){
		//var_dump($atributy);
		// 861 Popis zakázky
		// 863 Termín dokončení
		// 867 Kontaktní osoba
		// 869 Telefon / email
		// 870 Klient
		// 871 Výkaz práce
		// 875 Stav zakázky
		// 876 Číslo faktury
		// 877 Tabulka položek

		if(isset($atributy->tabulka->radky)){
			foreach($atributy->tabulka->radky as $radky){
				var_dump($radky);
			}
		} else {
			var_dump($atributy);
		}
		
	}

} else {
	echo '<h1>Zadejte ID zakázky</h1>';
}
