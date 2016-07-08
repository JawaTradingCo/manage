<? include("inc/config.php"); ?>
<?
if(isset($_POST[app])){
	$items = explode(",",$_POST['app']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  app SET _order = $a WHERE app_id = $value";
		
		$pdo->query($sql);
		$a++;
	}
	exit;
}
if($_GET[deleteImage] != "" && $_SESSION[account_type_id] >= 1){
	$sql = "SELECT * FROM app WHERE app_id='$_GET[deleteImage]'";
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
		@unlink("../img/".$ph[document]);
		$sql = "UPDATE app SET document = '' WHERE app_id='$_GET[deleteImage]'";
		$pdo->query($sql);
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}

if ($_FILES['filename']['name'] != "") {
	
			$tempFile = $_FILES['filename']['tmp_name'];
			$targetPath = "../img/";
			$t = $_FILES['filename']['type'];
			if(preg_match("/pdf/",$t) || preg_match("/msword/",$t)){ 
				$ext = substr($_FILES['filename']['name'],-3,3);
			}
			if(preg_match("/openxmlformats-officedocument.wordprocessingml.document/",$t)){ 
				$ext = substr($_FILES['filename']['name'],-4,4);	
			}
			$newname = str_replace(".".$ext,"",$_FILES['filename']['name']);
			$replace="_";
			$pattern="/([[:alnum:]_\.-]*)/";
			$newname=str_replace(str_split(preg_replace($pattern,$replace,$newname)),$replace,$newname);
			$newname = $newname."_".time().".".$ext;
			
			if(preg_match("/pdf/",$t) || preg_match("/msword/",$t) || preg_match("/openxmlformats-officedocument.wordprocessingml.document/",$t)){ 
					$targetFile =  str_replace('//','/',$targetPath) . $newname;
					if(move_uploaded_file($tempFile,$targetFile)) {
						@chmod($targetFile, 0644);
						$_POST[document] = $newname;
					}
			}
	}	

if($_POST){
if(isset($_POST[DELETE])){
		foreach($_POST as $key=>$value){
			$temp = explode("_",$key);
			$_GET[deleteImage] = $temp[1];
			$sql = "SELECT * FROM app WHERE app_id='$_GET[deleteImage]'";
			$stmt = $pdo->query($sql);
			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
				@unlink("../img/".$ph[document]);
				$sql = "UPDATE app SET document = '' WHERE app_id='$_GET[deleteImage]'";
				$pdo->query($sql);
				
			}	
					
			if(count($temp) == 2){
				$sql = "DELETE FROM app WHERE app_id='$temp[1]'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
	
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE app SET ";
			foreach($_POST as $key=>$value){
				if($key == "users_warcraft"){
					if(!empty($value)){
						$value = sha1($value);
					}
				} else {
					$value = addslashes($value);
				}
				$sql .= "$key = '$value',";
			}
			$sql = rtrim($sql,",");
			$sql .= " WHERE app_id = $_GET[edit]";
			@$pdo->query($sql);
			header("Location: ".$page);
		} else {
			
			$sql = "INSERT INTO app ";
			foreach($_POST as $key=>$value){
				if($key == "users_warcraft"){
					$value = sha1($value);
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
			header("Location: ".$page."?edit=".$_GET[edit]);
			
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
        <h1 class="page-header">Applications</h1>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <? if($_GET[edit] == ""){ ?>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> 
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
                      <th width="50px"></th>
                       
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="sorts">
                    <?
					$sql = "SELECT * FROM app ORDER BY app._order ASC";
					
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					
					
			
				  ?>
                    <tr rel="<? echo $row[app_id]; ?>" id="row<? echo $row[app_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td>
                        <input class="deleteLink" name="user_<? echo $row[app_id]; ?>" type="checkbox">
                        </td>
                        
                     <td><a href="?edit=<? echo $row[app_id]; ?>"><? echo stripslashes($row[title]); ?></a></td>
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[app_id]; ?>'"></td>
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
        <form role="form"  method="post" enctype="multipart/form-data">
          <?
$sql = "SELECT * FROM app WHERE app_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
          
          
           
          
         <div class="form-group">
            <label>Title</label>
            <input value="<? echo stripslashes($row[title]); ?>" name="title"   type="text" required class="form-control">
          </div>
                    
           <? if($row[document] == ""){ ?>
          <div class="form-group">
          
                                            <label>Document</label>
                                            <input type="file" name="filename">
                                        </div>
                                        <? } else { ?>
                                       <div class="form-group">
    <div class="panel panel-primary" rel="<? echo $row[g_id]; ?>">
                       
                        <div class="panel-body">
                           <a target="_blank" href="../img/<? echo $row[document]; ?>">View Document</a>
                           <button class="btn btn-danger" style="float:right;" type="button" onClick="if(confirm('Are you sure?')){window.location='?deleteImage=<? echo $row[app_id]; ?>'}">Delete Selected</button>
                        </div>
                    </div>
                    </div>
                                        <? } ?>
         
         
         
       
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
				"pageLength": 100
        });
    });
    </script>
    
    <script>
$(document).ready(function(){

   var fixHelper = function(e, ui) {
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
		};
	
	$("#sorts").sortable({
		helper: fixHelper,
		distance: 15,
		cursor: "move",
		forcePlaceholderSize: true,
		placeholder: 'placholder',
		start: function(){
			
		},
		stop: function(event, ui) {
				
				var orders = [];
				var display = $(".ui-tabs-nav>.ui-state-active>a").html();
				if(display == "Glass"){
					display = "glass";	
				} else {
					display = "arch";	
				}
				var x = 1;
				$(this).find("tr").each(function(){
					var f = $(this).attr("rel");
					$(this).find(".imagex").html("Image " + x);
					x++;
					orders.push(f);
				});
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  app: orders.toString()},function(){});
		}
	});
});
</script>
</body>
</html>
