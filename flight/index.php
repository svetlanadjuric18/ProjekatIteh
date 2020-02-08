<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

});

Flight::register('db', 'Database', array('med'));


Flight::route('GET /vrste', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->ucitajVrste();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[] = $red;
	}

	echo json_encode($niz);
});

Flight::route('GET /proizvodi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->ucitajProzivode();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[] = $red;
	}

	echo json_encode($niz);
});

Flight::route('GET /vesti', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->ucitajVesti();

	$niz =  [];
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[] = $red;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /registracija', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$parametri = file_get_contents('php://input');
	$niz = json_decode($parametri,true);
	$db->unosKorisnika($niz);
	if($db->getResult())
	{
		$response = "OK";
	}
	else
	{
		$response = "Doslo je do greske prilikom unosa usera!";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
