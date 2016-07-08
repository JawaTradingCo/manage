<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$topnav = true;

ini_set("display_errors",1);
$title = "Gardiner Foundation";
error_reporting(E_ERROR);
$hosthost = "http://".$_SERVER['HTTP_HOST'];



$time = microtime();
$time = explode(" ", $time);
$time = $time[1] + $time[0];
$start = $time;
$temp = explode("/",$_SERVER[SCRIPT_FILENAME]); 
$page = $temp[count($temp)-1];
$version = " 1.0";
$site = "http://".$_SERVER['HTTP_HOST'];
if($_POST){
	unset($_POST[_x]);
	unset($_POST[_y]);
	unset($_POST[x]);
	unset($_POST[y]);
	array_walk($_POST, 'cleanText');
}


foreach($_POST as $key=>$value){
	//$_POST[$key] = str_replace('"',"",$value);	
}


if($_POST[is_ajax] != "true"){
	
	if(!$_SESSION['users_id'] && $page != "login.php" && $page != "forgotpassword.php" && $page != "export.php" && $page != "help.php" && $page != "spot-help.php" &&  !preg_match("/ajax/",$page)){
		$_SESSION[redirect] = $_SERVER['REQUEST_URI'];	
		header("Location: login.php");
		exit;
	}
	
	
}




include("fe-config.php");



	
if(!function_exists(cleanQuery)){
	function cleanQuery($string){
	  global $pdo;
	  $badWords = array("/delete/i", "/update/i","/union/i","/insert/i","/drop/i","/http/i","/--/i");
	  $string = preg_replace($badWords, "", $string);
	  if(get_magic_quotes_gpc()){
		$string = stripslashes($string);
	  }
	 
	$string =  $pdo->quote($string);
	  
	  return $string;
	}	
}
if(!function_exists(cleanText)){
function cleanText($item,$key){
	if(!preg_match("/desc/i",$key) && !preg_match("/_overview/i",$key)){
	$_POST[$key] = htmlentities($item);	
	}
	
}
}

if(!function_exists(rePrepared)){
	function rePrepared($a) {
		$results = $binder = $row = array();
		$a->execute();
		$meta = $a->result_metadata(); // grab the information
		while($col = $meta->fetch_field()) $binder[] =& $row[$col->name];
		call_user_func_array(array($a, 'bind_result'), $binder);
		$meta->close();
		while($a->fetch()) $results[] = array_map('nothing', $row);
		$a->close();
		return $results;
	}
	
	function nothing($a) { return $a; }
}


?>