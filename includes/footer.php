<div id="footer">
<div id="footerLogo"><a href="index.php"><img src="<? echo $hroot; ?>/images/footer_logo.png" /></a></div>
<div id="footerMenu">
<div id="footerMenuLeft">
<ul>
<li><a href="history.php">HISTORY</a></li>
<li><a href="foundation.php">FOUNDATION</a></li>
<li><a href="news.php">NEWS</a></li>
<li><a href="contact.php">CONTACT</a></li>
</ul>
</div>
<div id="footerMenuRight">
<ul>
<li><a href="guidelines.php">GUIDELINES</a></li>
<li><a href="process.php">PROCESS</a></li>
<li><a href="application.php">APPLICATION</a></li>
<li><a href="portfolio.php">PORTFOLIO</a></li>
</ul></div>
</div>
 <?
	$sql = "SELECT * FROM newsletters ORDER BY _order ASC LIMIT 1";
	$stmt = $pdo->query($sql);
	foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $news) { ?>
    <div id="footerNewsletter"><a href="<? echo $hroot; ?>/img/<? echo $news[image]; ?>" target="_blank"><img src="<? echo $hroot; ?>/images/footer_bullet.png" /> READ LATEST NEWSLETTER</a></div>
   
    <? } ?>


<div class="clear-fix"></div>
<div id="footerAddress">&copy; <? echo date("Y"); ?> The Robert D.L. Gardiner Foundation, Inc. All Rights Reserved<br>
<span class="credit">Site Design by <a href="http://graphicimagegroup.com/" target="_blank">Graphic Image Group Inc.</a></span></div>
</div>
