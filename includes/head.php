<title>INSERT WEBSITE NAME</title>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<!-- change this to match document root -->
<? include("manage/inc/fe-config.php") ?>

<link rel="icon" type="image/png" href="<? echo $hroot; ?>/images/footer_bullet.png" />
<link href='https://fonts.googleapis.com/css?family=Halant:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<? echo $hroot; ?>/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<? echo $hroot; ?>/scripts/jquery.cycle2.js"></script>
<script>
$(document).ready(function(){
	var str=location.href;
	$(".navs li a").each(function() {
		if (str.indexOf(this.href) > -1) {
			$("li.current").removeClass("current");
			$(this).parent().addClass("current");
		}
	});
	$("li.current").parents().each(function(){
		if ($(this).is("li")){
			$(this).addClass("current");
		}
	});	
});
</script>