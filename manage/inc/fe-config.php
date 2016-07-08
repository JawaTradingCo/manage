<?
$root = "/home/user_if_host_gator/public_html/";
//$root = "/";
$hroot = "/~user_if_host_gator";
$hostname = "localhost";
$dbname = "dbname";
$username = "dbusername";
$password = "fB;cPN@Th8fQ";

$pdo = new PDO(
    'mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8mb4',
    $username,
    $password,
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false
    )
);



    function create_slug($string){     
        $replace = '-';  
		$string = strtolower($string);     
		
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
		
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
		
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
		
        //limit the slug size     
        $string = substr($string, 0, 100);     
		
        //slug is generated     
        return $string; 
    }     
