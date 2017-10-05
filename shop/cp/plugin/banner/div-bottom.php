
<!-- Plugin Banner -->
<?php 
	$banner = "SELECT * FROM banner WHERE position = '1' and enable = '1'";
	$banner_result = $mydb->runQuery($banner);
	while($banner_row = mysqli_fetch_assoc($banner_result)){
?>
<div class="boxbanner">
<div class="left item"><a href="http://<?php echo $banner_row['link']?>" target="blank" title="<?php echo $banner_row['title']?>" rel="dofollow"><img src="<?php echo $banner_row['image']?>" width="88" height="31"/></a></div>
<div class="left item">
<div><a href="http://<?php echo $banner_row['link']?>" target="blank" title="<?php echo $banner_row['title']?>" rel="dofollow"><?php echo $banner_row['title']?></a></div>
<div><?php echo $banner_row['description']?></div>
</div>
</div>
<?php } ?>
<!-- End Banner -->
