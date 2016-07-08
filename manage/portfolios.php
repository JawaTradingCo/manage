<? include("inc/config.php"); ?>
<?
if(isset($_POST[port])){
	$items = explode(",",$_POST['port']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  portfolios SET _order = $a WHERE portfolios_id = $value";
		$pdo->query($sql);
		$a++;
	}
	exit;
}

if(isset($_POST[data])){
	$sql = "UPDATE  portfolios SET _active = $_POST[data] WHERE portfolios_id = $_POST[portfolios_id]";
	echo $sql;
	$pdo->query($sql);
	exit;
}

if($_POST[deleteImage] != "" && $_SESSION[account_type_id] >= 1){
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


if ($_FILES['filename']['name'][0] != "") {
	$x = 1;
	foreach($_FILES['filename']['name'] as $key=>$value){
		
			$tempFile = $_FILES['filename']['tmp_name'][$key];
			
			$targetPath = "../img/";
			$t = $_FILES['filename']['type'][$key];
			$ext = substr($_FILES['filename']['name'][$key],-3,3);
			$newname = str_replace(".".$ext,"",$_FILES['filename']['name'][$key]);
			$replace="_";
			$pattern="/([[:alnum:]_\.-]*)/";
			$newname=str_replace(str_split(preg_replace($pattern,$replace,$newname)),$replace,$newname);
			$newname = $newname."_".time().".".$ext;
			
			if(preg_match("/image/",$t)){ 
					$targetFile =  str_replace('//','/',$targetPath) . $newname;
					if(move_uploaded_file($tempFile,$targetFile)) {
						@chmod($targetFile, 0644);
						$sql = "INSERT INTO images VALUES('',$_GET[edit],'$newname',0)";
						@$pdo->query($sql);
					}
			}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
		
	}


if($_POST){
if(isset($_POST[DELETE])){
		foreach($_POST as $key=>$value){
			$temp = explode("_",$key);
			$_GET[deleteImage] = $temp[1];
			$sql = "SELECT * FROM images WHERE portfolios_id='$_GET[deleteImage]'";
			$stmt = $pdo->query($sql);
			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
				@unlink("../img/".$ph[image]);
			}	
					
			if(count($temp) == 2){
				$sql = "DELETE FROM portfolios WHERE portfolios_id='$temp[1]'";
				@$pdo->query($sql);
				$sql = "DELETE FROM images WHERE portfolios_id='$temp[1]'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
	
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE portfolios SET ";
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
			$sql .= " WHERE portfolios_id = $_GET[edit]";
			@$pdo->query($sql);
			header("Location: ".$page);
		} else {
			
			$sql = "INSERT INTO portfolios ";
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
        <h1 class="page-header">Grant Portfolio</h1>
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
          
            <div class="well">
          Note: drag to order
          </div>  
            <div class="dataTable_wrapper">
              <form id="form" name="form" method="post" action="">
              <input type="hidden" name="DELETE" value="DELETE" />
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th></th>
                       <th>Name</th>
                         <th>Grant Date</th>
                      
                     <th>Current</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="sorts">
                    <?
					$sql = "SELECT * FROM portfolios ORDER BY _order ASC";
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					
					
			
				  ?>
                    <tr rel="<? echo $row[portfolios_id]; ?>" id="row<? echo $row[portfolios_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td>
                        <input class="deleteLink" name="user_<? echo $row[portfolios_id]; ?>" type="checkbox">
                        </td>
                        <td class=""><? echo stripslashes($row[name]); ?></td>
                         <td class=""><? if($row[_active] == 0){ ?>
						 <? } else { ?>
						 <? echo stripslashes(date("F Y",strtotime($row[gdate])));
						 }?></td>
                        
                       <td class=""><button rel="<? echo $row[portfolios_id]; ?>" type="button" class="homebtn btn <? if($row[_active] == 0){ ?>btn-danger<? } else { ?>btn-success yes<? } ?>"><? if($row[_active] == 0){ ?>No<? } else { ?>Yes<? } ?></button></td>
                     
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[portfolios_id]; ?>'"></td>
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
$sql = "SELECT * FROM portfolios WHERE portfolios_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
        
             <div class="form-group">
            <label>Name</label>
            <input value="<? echo stripslashes($row[name]); ?>" name="name"   type="text" required class="form-control">
         
          </div>
           <div class="form-group">
            <label>Current</label><br>
            <label>Yes <input value="1" name="_active"   type="radio" <? if($row[_active] == 1 || empty($row[_active])){ ?>checked=""<? } ?> ></label> <label>No <input value="0" name="_active"   type="radio" <? if($row[_active] == 0){ ?>checked=""<? } ?> ></label>
            
          </div>
           <div class="form-group">
            <label>Grant Date</label>
            <input value="<? echo  $row[gdate]; ?>" name="gdate"   type="text" class="datepicker form-control">
            
          </div>
          <div class="form-group ">
            <label>Duration</label>
            <input value="<? echo stripslashes($row[duration]); ?>" name="duration"   type="text"  class="form-control">
         
          </div>
          
           
          <? if($row[portfolios_id] > 0){  ?>
            							<div class="form-group">
                                            <label>Image Upload</label>
                                            <input type="file" multiple name="filename[]">
                                            <br>
                                            <button type="submit" class="btn btn-warning" onclick="$('[type=checkbox]').attr('checked',false);return true;">Add Images</button>
                                        </div>
                                        <div class="well">You can select more than one at a time.</div>
           <div class="well">
<button type="submit" class="btn btn-danger">Delete Selected</button>  <button onclick="$('[type=checkbox]').attr('checked',true);" type="button" class="btn btn-info">Select All</button>  
    <div style="clear:both;"></div>         
   </div>
          <div class="col-lg-12" id="sorts">
              
                                <?
								
$sql = "SELECT * FROM images  WHERE portfolios_id = $row[portfolios_id] ORDER BY _order ASC";
try{
	$x = 0;
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row2) {
		$x++;
	?>
     <div class="col-lg-1" >
    <div class="panel panel-primary" rel="<? echo $row2[images_id]; ?>">
                        <div class="panel-heading">
                          <label>Delete?  <input type="checkbox" name="deleteImage[]" value="<? echo $row2[images_id]; ?>" /></label>
            <div style="clear:both;" ></div>
                        </div>
                        <div class="panel-body">
                           <img src="../includes/phpThumb/phpThumb.php?src=<? echo $root; ?>/img/<? echo $row2[image]; ?>&w=70&h=50&zc=1" />
                        </div>
                    </div>
                    </div>

<?
	}
} catch(Exception $err){
?>No Images<?	
}
			?></div>
          <? } else { ?><div class="form-group">
          You have to save to add images.
          </div>
          <? } ?>                    
          
          
                <div class="form-group col-lg-11">
            <label>Description</label><br>
          <textarea name="content" class="ckeditor"  style="width:600px !important;height:100px !important;"><? echo $row[content]; ?></textarea>
            
          </div>                          
                                        
           <div style="clear:both;" ></div>
       
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
       <br><br>
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
       
		$('.homebtn').on("click",function(){
			var y = $(".yes").length;
			
				if($(this).is(".yes")){
				
				
					$(this).removeClass("yes").removeClass("btn-success").addClass("btn-danger").html("No");	
					var d = 0;
				
				} else if($(this).is(".btn-danger")){
					
						$(this).removeClass("btn-danger").addClass("btn-success").addClass("yes").html("Yes");
						var d = 1;
						
				}
				$.post("portfolios.php",{is_ajax: "true",data:d,portfolios_id:$(this).attr("rel")},function(data){
					
				});
			
				
		});
    });
    </script>
    <style>
	
	</style>
    <script>
$(document).ready(function(){
   $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
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
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  port: orders.toString()},function(){});
		}
	});
});
</script>
</body>
</html>
