
<!-- Plugin Banner -->
<?php 
	$banner = "SELECT * FROM banner WHERE position = '0' and enable = '1'";
	$banner_result = $mydb->runQuery($banner);
	while($banner_row = mysqli_fetch_assoc($banner_result)){
?>
<a href="<?php echo $banner_row['link']?>" target="_blank" rel="nofollow"><img src="<?php echo $banner_row['image']?>" width="120" height="120"/></a>
<?php } ?>
<!-- End Banner -->
