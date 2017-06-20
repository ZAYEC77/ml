<?php
session_start();


function get_lang()
{
	$default = 'en';

	$possibleLangs = array(
		'uk',
		'en',
	);

	if (isset($_GET['lang']) && (in_array($_GET['lang'], $possibleLangs) !== false)) {
		$_SESSION['lang'] = $_GET['lang'];
		return $_GET['lang'];
	}


	if (isset($_SESSION['lang']) && (in_array($_SESSION['lang'], $possibleLangs) !== false)) {
		return $_SESSION['lang'];
	}



	$clientLangs = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


	foreach($possibleLangs as $lang)
	{	
		if(strpos($clientLangs, $lang)===0) {
	 		return $lang;
		}
	}

	foreach($possibleLangs as $lang)
	{	
		if(strpos($clientLangs, $lang)!==false) {
	 		return $lang;
		}
	}

	return $default;
}


$lang = get_lang();



switch ($lang){
    case "uk":
        include("ua.php");
        break;
    case "en":
        include("en.php");
        break;        
    default:
        include("en.php");
}
