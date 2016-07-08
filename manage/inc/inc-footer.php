<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>



<!-- Custom Theme JavaScript -->
 <script src="dist/js/sb-admin-2.js"></script>
 

    
 <!-- DataTables JavaScript -->
<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script>
var globalconfig = "Standard";
config.extraPlugins = 'stylesheetparser';
config.contentsCss = '/css/greenpast.css';
config.stylesSet = [];
</script>
<script src="js/ckeditor/ckeditor.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
    $("[required]").each(function(){
		$('<div style="font-weight:bold;margin:5px 0px;color:red;">* Required</div>').insertAfter(this);
	});
	
	    $('#dataTables-example').find("thead>tr>th:eq(0)").attr("width","15px");
	
	
		 $('#dataTables-example').find("thead>tr>th:last").attr("width","65px");
	});
			
			
 </script>