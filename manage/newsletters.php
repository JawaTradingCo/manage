<? include("inc/config.php"); ?>
<?
if(isset($_POST[newsletters])){
	$items = explode(",",$_POST['newsletters']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  newsletters SET _order = $a WHERE newsletters_id = $value";
		
		$pdo->query($sql);
		$a++;
	}
	exit;
}
if(isset($_POST[data])){
	$sql = "UPDATE  newsletters SET is_home = $_POST[data] WHERE newsletters_id = $_POST[newsletters_id]";
	$pdo->query($sql);
	exit;
}
if($_GET[deleteImage] != "" && $_SESSION[account_type_id] >= 1){
	$sql = "SELECT * FROM newsletters WHERE newsletters_id='$_GET[deleteImage]'";
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
		@unlink("../img/".$ph[image]);
		$sql = "UPDATE newsletters SET image = '' WHERE newsletters_id='$_GET[deleteImage]'";
		$pdo->query($sql);
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}	
}

if ($_FILES['filename']['name'] != "") {
			$tempFile = $_FILES['filename']['tmp_name'];
			$targetPath = "../img/";
			$t = $_FILES['filename']['type'];
			$ext = substr($_FILES['filename']['name'],-3,3);
			$newname = str_replace(".".$ext,"",$_FILES['filename']['name']);
			$replace="_";
			$pattern="/([[:alnum:]_\.-]*)/";
			$newname=str_replace(str_split(preg_replace($pattern,$replace,$newname)),$replace,$newname);
			$newname = $newname."_".time().".".$ext;
			
			if(preg_match("/pdf/",$t)){ 
					$targetFile =  str_replace('//','/',$targetPath) . $newname;
					if(move_uploaded_file($tempFile,$targetFile)) {
						@chmod($targetFile, 0644);
						$_POST[image] = $newname;
					}
			}
	}	

if($_POST){
if(isset($_POST[DELETE])){
		foreach($_POST as $key=>$value){
			$temp = explode("_",$key);
			$_GET[deleteImage] = $temp[1];
			$sql = "SELECT * FROM newsletters WHERE newsletters_id='$_GET[deleteImage]'";
			$stmt = $pdo->query($sql);
			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
				@unlink("../img/".$ph[image]);
				$sql = "UPDATE newsletters SET image = '' WHERE newsletters_id='$_GET[deleteImage]'";
				$pdo->query($sql);
				
			}	
					
			if(count($temp) == 2){
				$sql = "DELETE FROM newsletters WHERE newsletters_id='$temp[1]'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
	
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE newsletters SET ";
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
			$sql .= " WHERE newsletters_id = $_GET[edit]";
			@$pdo->query($sql);
			header("Location: ".$page);
		} else {
			
			$sql = "INSERT INTO newsletters ";
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
        <h1 class="page-header">Newsletters</h1>
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
                  <tbody id="sorts">
                    <?
					$sql = "SELECT * FROM newsletters ORDER BY _order ASC";
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					
					
			
				  ?>
                    <tr rel="<? echo $row[newsletters_id]; ?>" id="row<? echo $row[newsletters_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td>
                        <input class="deleteLink" name="user_<? echo $row[newsletters_id]; ?>" type="checkbox">
                        </td>
                       
                         <td class=""><? echo stripslashes($row[title]); ?></td>
                        
                     
                     
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[newsletters_id]; ?>'"></td>
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
$sql = "SELECT * FROM newsletters WHERE newsletters_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
          <div class="form-group">
            <label>Title</label>
            <input value="<? echo stripslashes($row[title]); ?>" name="title"   type="text" required class="form-control">
            
          </div>
           
          
       
          
           
         
          
           <? if($row[image] == ""){ ?>
          <div class="form-group">
          
                                            <label>PDF</label>
                                            <input type="file" name="filename">
                                        </div>
                                        <? } else { ?>
                                       <div class="form-group">
    <div class="panel panel-primary" rel="<? echo $row[g_id]; ?>">
                        <div class="panel-heading">
                            <span class="imagex">PDF</span> <button class="btn btn-danger" style="float:right;" type="button" onClick="if(confirm('Are you sure?')){window.location='?deleteImage=<? echo $row[newsletters_id]; ?>'}">Delete Selected</button>
           
            <div style="clear:both;" ></div>
                        </div>
                        <div class="panel-body">
                           <img src="../includes/phpThumb/phpThumb.php?src=<? echo $root; ?>/img/<? echo $row[image]; ?>&h=100" />
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
                responsive: true
        });
		$('.homebtn').on("click",function(){
			var y = $(".yes").length;
			
				if($(this).is(".yes")){
				
				
					$(this).removeClass("yes").removeClass("btn-success").addClass("btn-danger").html("No");	
					var d = 0;
				
				} else if($(this).is(".btn-danger")){
					if(y >= 3){
						alert("Sorry. You can only show 3 items at a time. Toggle an active item to enable showing a new one.");
						return false;	
					} else {
						$(this).removeClass("btn-danger").addClass("btn-success").addClass("yes").html("Yes");
						var d = 1;
					}	
				}
				$.post("newsletters.php",{is_ajax: "true",data:d,newsletters_id:$(this).attr("rel")},function(data){
					
				});
			
				
		});
    });
    </script>
    
    <script>
$(document).ready(function(){
	$(".datepicker").datepicker({});
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
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  newsletters: orders.toString()},function(){});
		}
	});
});
</script>
</body>
</html>
