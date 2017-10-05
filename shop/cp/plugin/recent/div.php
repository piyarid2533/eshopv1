
<!-- Plugin RecentPost -->
<div class="div-rc-header"><div class="div-header-title"><i class="pin icon"></i> Recent Post on Topic</div></div>
<div class="div-recent">
<?php 
	$data = "SELECT * FROM data ORDER BY time_update DESC limit 0,10";
	$data_result = $mydb->runQuery($data);
	while($data_row = mysqli_fetch_assoc($data_result)){
	
	$lastp = "SELECT * FROM member WHERE mid = '".$data_row['upmid']."'";
	$lastp_result = $mydb->runQuery($lastp);
	$lastp_row = mysqli_fetch_assoc($lastp_result);
	
	$_cate = "SELECT * FROM category WHERE cid = '".$data_row['category']."'";
	$_cate_result = $mydb->runQuery($_cate);
	$_cate_row = mysqli_fetch_assoc($_cate_result);
	
	$rank = "SELECT * FROM rank WHERE rid = '".$lastp_row['rank']."'";
	$rank_result = $mydb->runQuery($rank);
	$rank_row = mysqli_fetch_assoc($rank_result);
?>
<div class="item"> <a href="category/<?php echo $_cate_row['title']?>/topic-<?php echo $data_row['did']?>.html"><?php echo $data_row['subject'];?></a> โดย <a href="profile/<?php echo $lastp_row['username']?>.html"><span class="<?php echo $rank_row['rank_css']?>"><?php echo $lastp_row['username']?></span></a> <?php echo $func->count_time($data_row['time_update'])?></div> 
<?php } ?>
</div>
<div class="div-rc-footer"></div>
<!-- End RecentPost Plugin -->
