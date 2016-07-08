<? include("inc/config.php"); ?>
<?
if($_SESSION[account_type_id] < 2){
	header("Location: index.php");
	exit;	
}
if($_POST){
	
if(isset($_POST[DELETE])){
		foreach($_POST as $key=>$value){
			$temp = explode("_",$key);
			if(count($temp) == 2){
				$sql = "DELETE FROM users WHERE users_id='$temp[1]' AND users_id != '1'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
	if(empty($_POST[account_type_id])){
		$_POST[account_type_id] = 2;
	}
	if(empty($_POST[users_warcraft])){
		unset($_POST[users_warcraft]);
	}
	$_POST[users_name] = $_POST[users_fname] . " " . $_POST[users_lname];
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE users SET ";
			foreach($_POST as $key=>$value){
				if($key == "users_warcraft"){
					if(!empty($value)){
						$value = md5($value);
					}
				} else {
					$value = addslashes($value);
				}
				$sql .= "$key = '$value',";
			}
			$sql = rtrim($sql,",");
			
			$sql .= " WHERE users_id = $_GET[edit]";
			
			@$pdo->query($sql);
			header("Location: ".$page);
		} else {
			
			$sql = "INSERT INTO users ";
			foreach($_POST as $key=>$value){
				if($key == "users_warcraft"){
					$value = md5($value);
					$values .= "'".sha1($value)."',";	
				} else {
					$values .= "'".addslashes($value)."',";	
				}
				
				$fields .= $key.",";
				
			}
			$fields = rtrim($fields,",");
			$values = rtrim($values,",");
			$sql = $sql . "($fields) VALUES ($values)";
			@$pdo->query($sql);
			
			$_GET[edit] = $pdo->lastInsertId();
			header("Location: ".$page);
			
		}
		
	}
	

	
}
?>
<? include("inc/inc-head.php"); ?>

<body>
<div id="wrapper">
  <? include("inc/inc-nav.php"); ?>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <? if($_GET[edit] == ""){ ?>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> Users
            <button style="float:right;" type="button" onClick="if(confirm('Are you sure?')){$('#form').submit()}" class="btn btn-danger">Delete Selected</button>
            <button onClick="window.location='?edit=0'" style="float:right;margin-right:5px;" type="button" class="btn btn-success">Add New</button>
            <div style="clear:both;" ></div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <form id="form" name="form" method="post" action="">
              <input type="hidden" name="DELETE" value="DELETE" />
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Last Login</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
					$sql = "SELECT * FROM users ORDER BY users_id ASC";
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					if($row[account_type_id] == "2"){
						$su = "super";	
					} else {
						$su = "";	
					}
					
					if($row[view_private] == 0){
						$act = " inactive";	
					} else {
						$act= "";	
					}
			
				  ?>
                    <tr id="row<? echo $row[users_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td><? if( $row[users_id] > 1) { ?>
                        <input class="deleteLink" name="user_<? echo $row[users_id]; ?>" type="checkbox">
                        <? } ?></td>
                      <td class=""><a href="?edit=<? echo $row[users_id]; ?>"><? echo stripslashes($row[users_name]); ?></a></td>
                      <td class=""><? echo $row[users_email]; ?></td>
                        <td><? echo ($row[account_type_id] == 2)?"Admin":"User"; ?></td>
                      <td><? echo $row[users_last_online]; ?></td>
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[users_id]; ?>'"></td>
                    </tr>
                    <? } ?>
                  </tbody>
                </table>
              </form>
            </div>
            <!-- /.table-responsive --> 
            
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      <!-- /.col-lg-12 -->
      <? } else { ?>
      <div class="col-lg-12">
        <form role="form"  method="post">
          <?
$sql = "SELECT * FROM users WHERE users_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
          <div class="form-group">
            <label>First Name</label>
            <input value="<? echo stripslashes($row[users_fname]); ?>" name="users_fname"   type="text" required class="form-control">
            
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input value="<? echo stripslashes($row[users_lname]); ?>" name="users_lname"   type="text" required class="form-control">
            
          </div>
          
         
          
          <div class="form-group">
            <label>Email</label>
            <input value="<? echo stripslashes($row[users_email]); ?>" name="users_email"   type="text" required class="form-control">
           
          </div>
          <? if($row[users_id] > 1){ ?>
          <div class="form-group">
                                            <label>Account Type</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" <? echo ($row[account_type_id] == 1)?"checked":""; ?> name="account_type_id" id="account_type_id1" value="1" checked="">User
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" <? echo ($row[account_type_id] == 2)?"checked":""; ?> name="account_type_id" id="account_type_id2" value="2">Admin
                                                </label>
                                            </div>
                                          
                                        </div>
                                        <? } ?>
          <div class="form-group">
            <label>Password</label>
            <input value="" name="users_warcraft"   type="text"  class="form-control"   <? if($row[users_id] == 0){ ?>required<? } ?>>
            <? if($row[users_id]){ ?>
            <p class="help-block">Leave blank if you don't want to change.</p>
            <? } ?>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
          <?
} catch(Exception $err){
?>
          No User Specified
          <?	
}
			?>
        </form>
      </div>
      <? } ?>
    </div>
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper -->

<? include("inc/inc-footer.php"); ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference --> 
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
				"columns": [
					null,
					{ "orderDataType": "dom-text" },
					{ "orderDataType": "dom-text" },
					{ "orderDataType": "dom-text" },
					null
				]
        });
    });
    </script>
</body>
</html>
