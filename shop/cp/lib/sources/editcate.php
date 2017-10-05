<div class="contain">
<h2 class="sub-header">แก้ไข</h2>
	<?php		
		@$cid = $_GET['cate-id'];
		if($cid)
		{
			$category = $mydb->runQuery("SELECT * FROM shop_category WHERE category_cid = '".$cid."'");
			$category_row = mysqli_fetch_assoc($category);
	?>	
	<form role="form">
		<div class="form-group">
			<label>หัวข้อกระทู้</label>
				<input type="text" id="name" class="form-control" value="<?php echo $category_row['category_name']?>">
		</div>
		<input id="cid" type="hidden" value="<?php echo $category_row['category_cid']?>"/>
		<button type="submit" class="btn btn-default" onclick="CateEdit(); return false">แก้ไข</button> 
		<button type="submit" class="btn btn-default" onclick="CateDel(); return false">ลบ</button> 
	</form>
	<?php
			} else {
			$category = $mydb->runQuery("SELECT * FROM shop_category ORDER BY category_cid DESC");
			while($category_row = mysqli_fetch_assoc($category)){
	?>
	<div>[<a href="?sec=category&insub=cate-edit&cate-id=<?php echo $category_row['category_cid'];?>"> แก้ไข</a> ] <?php echo $category_row['category_name'];?></div>
	<?php
			}
			}
	?>
</div>