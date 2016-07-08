<? include("inc/config.php"); ?>
<?
if($_SESSION[account_type_id] < 2){
	header("Location: index.php");
	exit;	
}
if(isset($_POST[slider])){
	$items = explode(",",$_POST['slider']);
	$a = 1;
	foreach($items as $key=>$value){
		$sql = "UPDATE  slider SET _order = $a WHERE slider_id = $value";
		
		$pdo->query($sql);
		$a++;
	}
	exit;
}

if(isset($_POST[data])){
	$sql = "UPDATE  slider SET is_home = $_POST[data] WHERE slider_id = $_POST[slider_id]";
	$pdo->query($sql);
	exit;
}
if($_GET[deleteImage] != "" && $_SESSION[account_type_id] >= 1){
	$sql = "SELECT * FROM slider WHERE slider_id='$_GET[deleteImage]'";
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
		@unlink("../img/".$ph[image]);
		$sql = "UPDATE slider SET image = '' WHERE slider_id='$_GET[deleteImage]'";
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
			
			if(preg_match("/image/",$t)){ 
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
			$sql = "SELECT * FROM slider WHERE slider_id='$_GET[deleteImage]'";
			$stmt = $pdo->query($sql);
			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $ph) {
				@unlink("../img/".$ph[image]);
				$sql = "UPDATE slider SET image = '' WHERE slider_id='$_GET[deleteImage]'";
				$pdo->query($sql);
				
			}	
					
			if(count($temp) == 2){
				$sql = "DELETE FROM slider WHERE slider_id='$temp[1]'";
				@$pdo->query($sql);
				
			}
		}
	} else {
	unset($_POST[x] );
	unset($_POST[y] );
		if($_POST[image] == ""){
				header("Location: ".$page);
				exit;	
		}
		if($_GET[edit] > 0){
			#UPDATE
			
			$sql = "UPDATE slider SET ";
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
			$sql .= " WHERE slider_id = $_GET[edit]";
			@$pdo->query($sql);
			header("Location: ".$page);
		} else {
			
			$sql = "INSERT INTO slider ";
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
        <h1 class="page-header">Home Banners</h1>
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
                       
                       <th>Image</th>
                        <th>Url</th>
                      <th>Home?</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="sorts">
                    <?
					$sql = "SELECT * FROM slider ORDER BY _order ASC";
					$stmt = $pdo->query($sql);
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					
					
			
				  ?>
                    <tr rel="<? echo $row[slider_id]; ?>" id="row<? echo $row[slider_id]; ?>" class="odd <? echo $su; ?><? echo $act ?>">
                      <td>
                        <input class="deleteLink" name="user_<? echo $row[slider_id]; ?>" type="checkbox">
                        </td>
                       
                         <td class=""><? if($row[image] != ""){ ?><img src="../includes/phpThumb/phpThumb.php?src=<? echo $root; ?>/img/<? echo $row[image]; ?>&h=100" /><? } ?></td>
                                                  <td class=""><? echo $row[url]; ?></td>

                         <td class=""><button rel="<? echo $row[slider_id]; ?>" type="button" class="homebtn btn <? if($row[is_home] == 0){ ?>btn-danger<? } else { ?>btn-success yes<? } ?>"><? if($row[is_home] == 0){ ?>No<? } else { ?>Yes<? } ?></button></td>
                     
                     
                      <td class="editItem" align="center"><input type="button" value="Edit" onClick="window.location='?edit=<? echo $row[slider_id]; ?>'"></td>
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
$sql = "SELECT * FROM slider WHERE slider_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?>
          <div class="form-group">
            <label>Url</label>
            <input value="<? echo stripslashes($row[url]); ?>" name="url"   type="url"  class="form-control">
            
          </div>
           
          
          
          
           
         
          
           <? if($row[image] == ""){ ?>
          <div class="form-group">
          
                                            <label>Image</label>
                                            <input type="file" name="filename">
                                        </div>
                                        <? } else { ?>
                                       <div class="form-group">
    <div class="panel panel-primary" rel="<? echo $row[g_id]; ?>">
                        <div class="panel-heading">
                            <span class="imagex">Image</span> 
           
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
					
						$(this).removeClass("btn-danger").addClass("btn-success").addClass("yes").html("Yes");
						var d = 1;
						
				}
				$.post("sliders.php",{is_ajax: "true",data:d,slider_id:$(this).attr("rel")},function(data){
					
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
				
				$.post("<? echo $page; ?>",{is_ajax:"true",  slider: orders.toString()},function(){});
		}
	});
});
</script>
</body>
</html>
