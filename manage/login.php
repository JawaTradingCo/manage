<? include("inc/config.php"); ?>
<?
if(isset($_GET[msg])){
		$err = $_GET[msg];
}



if(!empty($_GET[logout])){
	$users_id = $_SESSION[users_id];
	
	
	foreach($_SESSION as $key=>$value){
		unset($_SESSION[$key]);	
	}
	header("Location: login.php");	
	
	exit;
}




	if($_POST) {
		$pass = md5(($_POST[password]));
		foreach($_POST as $key=>$value){
			$_POST[$key] = cleanQuery($value);	
		}
		if($_POST[email] && $_POST[password]) {
			
			$sql = "SELECT * FROM users  WHERE users.users_email=$_POST[email] AND users.users_warcraft='$pass' LIMIT 1";
			
			$stmt = $pdo->query($sql);
			$total =$stmt->rowCount();
			$row =  $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($total > 0){
				
				$sql = "UPDATE users SET users_last_online= NOW(),users_inital_visit=IFNULL(NOW(),users_inital_visit) WHERE users_id='$row[users_id]'";
				$pdo->query($sql);
				$sql = "SELECT * FROM permissions WHERE users_id='$row[users_id]'";
				
				$stmt2 = $pdo->query($sql);
				foreach($stmt2->fetchAll(PDO::FETCH_ASSOC) as $ro) {
					$_SESSION[perms][$ro[perms_page]] = $ro[perms_perms];
				}
				
				$_SESSION[perms]['index.php'] = 1;
				
			
				$_SESSION[users_id] = $row[users_id];
				
				
				if($row[account_type_id] == 2){
					$_SESSION[ADMIN] =  $row[users_id];
				} else {
					
				}
				$_SESSION[users_last_online] = $row[users_last_online];
				$temp = explode("[",$row[account_type_name]);
				$users_id = $_SESSION[users_id];
				$_SESSION[account_type_id] = $row[account_type_id];
				
				$_SESSION[users_id] = $row[users_id];
				$_SESSION[users_name] = $row[users_fname]." ". $row[users_lname] ;
				
				
				if(isset($_SESSION[redirect])){
					$rd = $_SESSION[redirect];
					unset($_SESSION[redirect]);
					header("Location: ".$rd);
				} else {
					header("Location: index.php");	
				}
				
				exit;
			} else {
				$err = "Invalid username or password!";
			}
		} else {
			$err = "Invalid username or password!";
		}
	}

?>
<? include("inc/inc-head.php"); ?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!--
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                -->
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <? include("inc/inc-footer.php"); ?>

</body>

</html>
