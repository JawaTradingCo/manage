<? include("inc/config.php"); ?>
<?
if($_POST){

	unset($_POST[x] );
	unset($_POST[y] );
	
		if($_GET[edit] > 0){
			#UPDATE
			$sql = "UPDATE pages SET ";
			foreach($_POST as $key=>$value){
				$value = addslashes($value);
				$sql .= "$key = '$value',";
			}
			$sql = rtrim($sql,",");
			$sql .= " WHERE page_id = $_GET[edit]";
			@$pdo->query($sql);
			header("Location: ".$page."?edit=".$_GET[edit]);
		} else {
			
			$sql = "INSERT INTO pages ";
			foreach($_POST as $key=>$value){
				$values .= "'".addslashes($value)."',";	
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
?>
<? include("inc/inc-head.php"); ?>

<body>

    <div id="wrapper">

        <? include("inc/inc-nav.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           About Us
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form"  method="post">
<?
$sql = "SELECT * FROM pages  WHERE page_id = $_GET[edit]";
try{
	$stmt = $pdo->query($sql);
	$row =  $stmt->fetch(PDO::FETCH_ASSOC);
	?><div class="form-group">
                                            <label>Content</label>
                                            <textarea name="content" class="ckeditor"  style="width:600px !important;height:100px !important;"><? echo $row[content]; ?></textarea>
                                        </div>
                                         <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <?
} catch(Exception $err){
?>No Page Specified<?	
}
			?>
                                        
                                        
                                       
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <? include("inc/inc-footer.php"); ?>

</body>

</html>
