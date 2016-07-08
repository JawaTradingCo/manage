<? include("inc/config.php"); ?>
<?


if($_GET[deleteImage] != "" && $_SESSION[account_type_id] >= 1){
	$sql = "SELECT * FROM projects WHERE projects_id='$_GET[deleteImage]'";
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
		@unlink("../img/".$ph[thumb]);
		$sql = "UPDATE projects SET thumb = '' WHERE projects_id='$_GET[deleteImage]'";
		$pdo->query($sql);
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}

if(isset($_POST[images])){
	$items = explode(",",$_POST['images']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  images SET _order = $a WHERE images_id = $value";
		$pdo->query($sql);
		$a++;
	}
	exit;
}

if(isset($_POST[projects])){
	$items = explode(",",$_POST['projects']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  projects SET _order = $a WHERE projects_id = $value";
		$pdo->query($sql);
		$a++;
	}
	exit;
}



if($_POST[deleteImage][0] > 0 && $_SESSION[account_type_id] >= 1){
	foreach($_POST[deleteImage] as $value){
	$sql = "SELECT * FROM images WHERE images_id='$value'";
	$stmt = $pdo->query($sql);
		foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
			@unlink("../img/".$ph[image]);
			$sql = "DELETE FROM images WHERE images_id='$value'";
			$pdo->query($sql);
			
		}	
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
}

	
	
	


if($_POST){
	unset($_POST[placement]);
	unset($_POST[image]);
if(isset($_POST[DELETE])){
		foreach($_POST as $key=>$value){
			$temp = explode("_",$key);
			if(count($temp) == 2){
				
				$sql = "SELECT * FROM images WHERE placement='images-".$temp[1]."'";
				$stmt = $pdo->query($sql);
				foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
					@unlink("../img/".$ph[image]);
					$sql = "DELETE FROM images WHERE images_id='$ph[images_id]'";
					$pdo->query($sql);
					
				}	
				
				$sql = "DELETE FROM projects WHERE projects_id='$temp[1]'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
	
	
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE projects SET ";
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
			$sql .= " WHERE projects_id = $_GET[edit]";
			
			@$pdo->query($sql);
			
		} else {
			
			$sql = "INSERT INTO projects ";
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
			
			
		}
		
	$p = "images-".$_GET[edit];	
	if ($_FILES['exterior']['name'][0] != "") {
		$x = 1;
		unset($_POST);
		foreach($_FILES['exterior']['name'] as $key=>$value){
				$sql = "SELECT * FROM images WHERE placement='$p'";
				
				$stmt = $pdo->query($sql);
				
				
					$tempFile = $_FILES['exterior']['tmp_name'][$key];
					
					$targetPath = "../img/";
					$t = $_FILES['exterior']['type'][$key];
					$ext = substr($_FILES['exterior']['name'][$key],-3,3);
					$newname = str_replace(".".$ext,"",$_FILES['exterior']['name'][$key]);
					$replace="_";
					$pattern="/([[:alnum:]_\.-]*)/";
					$newname=str_replace(str_split(preg_replace($pattern,$replace,$newname)),$replace,$newname);
					$newname = $newname."_".time().".".$ext;
					
					if(preg_match("/image/",$t)){ 
							$targetFile =  str_replace('//','/',$targetPath) . $newname;
							if(move_uploaded_file($tempFile,$targetFile)) {
								@chmod($targetFile, 0644);
								$_POST[image] = $newname;
								$_POST[placement] = $p;
								
								$x ++;
								
								$sql = "INSERT INTO images ";
								$values = "";
								$fields = "";
								foreach($_POST as $key=>$value){
									
									$values .= "'".$value."',";	
									$fields .= $key.",";
									
								}
								$fields = rtrim($fields,",");
								$values = rtrim($values,",");
								$sql = $sql . "($fields) VALUES ($values)";
								@$pdo->query($sql);
							
								
							}
					}
					}
		
			
		}	
	header("Location: projects.php?edit=".$_GET[edit]);
	exit;	
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
        <h1 class="page-header">Projects</h1>
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
                      <th></th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="sorters">
                    <?
					$sql = "SELECT * FROM projects ORDER BY _order ASC";
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					
					
			
				  ?>
                    <tr rel="<? echo $row[projects_id]; ?>" id="row<? echo $row[projects_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td>
                        <input class="deleteLink" name="user_<? echo $row[projects_id]; ?>" type="checkbox">
                        </td>
                      <td class=""><a href="?edit=<? echo $row[projects_id]; ?>"><? echo stripslashes($row[title]); ?></a></td>
                     
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[projects_id]; ?>'"></td>
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
$sql = "SELECT * FROM projects WHERE projects_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
          
         
        <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="main-pills">
                                  
                                     <div class="form-group">
            <label>Project Name</label>
            <input value="<? echo stripslashes($row[title]); ?>" name="title"   type="text" required class="form-control">
            
          </div>
          
              <div class="form-group">
          	<label>Add Images</label>
            <input type="file" name="exterior[]" multiple>
          </div>
          
          <div class="panel panel-info">
                        <div class="panel-heading">
                           Images <button style="float:right;margin-left:5px;" type="submit" class="btn btn-danger">Delete Selected</button>  <button  style="float:right;" onclick="$('.exterior[type=checkbox]').attr('checked',true);" type="button" class="btn btn-info">Select All</button>  
    <div style="clear:both;"></div>         
                        </div>
                        <div class="row panel-body interior"  id="sorts2">
                            <?
$sql = "SELECT * FROM images  WHERE placement = 'images-{$row[projects_id]}' ORDER BY _order ASC";

	$x = 0;
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $image) {
		$x++;
	?>
     <div class="col-lg-2 col-md-4" >
    <div class="panel panel-primary" rel="<? echo $image[images_id]; ?>">
                        <div class="panel-heading">
                          <label>Delete?  <input class="exterior" type="checkbox" name="deleteImage[]" value="<? echo $image[images_id]; ?>" /></label>
            <div style="clear:both;" ></div>
                        </div>
                        <div class="panel-body " >
                           <img src="../includes/phpThumb/phpThumb.php?src=<? echo $root; ?>/img/<? echo $image[image]; ?>&w=100&h=100&zc=1" />
                           </div>
                           
                        </div>
                    </div>
                   

<? } ?>
                        </div>
                         <div class="panel-footer">
                           * Drag images to sort
                        </div>     
                    </div>
          

          
          
         
         
       
       
          <button type="submit" class="btn btn-default">Save</button>
          <button type="reset" class="btn btn-default">Reset</button>
          <p></p> <p></p>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

         
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
                responsive: true
        });
		$(".datepicker").datepicker({});
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
		placeholder: 'col-lg-1',
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
				$(this).find(".panel").each(function(){
					var f = $(this).attr("rel");
					//$(this).find(".imagex").html("Image " + x);
					x++;
					orders.push(f);
				});
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  images: orders.toString()},function(){});
		}
	});
	
	
	$("#sorts2").sortable({
		helper: fixHelper,
		distance: 15,
		cursor: "move",
		forcePlaceholderSize: true,
		placeholder: 'col-lg-1',
		start: function(){
			
		},
		stop: function(event, ui) {
				
				var orders = [];
				var display = $(".ui-tabs-nav>.ui-state-active>a").html();
				
				var x = 1;
				$(this).find(".panel").each(function(){
					var f = $(this).attr("rel");
					//$(this).find(".imagex").html("Image " + x);
					x++;
					orders.push(f);
				});
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  images: orders.toString()},function(){});
		}
	});

	$("#sorters").sortable({
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
				
					x++;
					orders.push(f);
				});
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  projects: orders.toString()},function(){});
		}
	});

});
</script>
</body>
</html>
