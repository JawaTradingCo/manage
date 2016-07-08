<? include("inc/config.php"); ?>
<?
if(!$_SESSION['users_id']){
	header("Location: login.php");
} else {
	header("Location: portfolios.php");
}
exit;