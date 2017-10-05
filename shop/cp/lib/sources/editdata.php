<div class="contain">
<h2 class="sub-header">แก้ไข</h2>
	<?php		
		@$editid = $_GET['edit-id'];
		if($editid)
		{
			$data = "SELECT * FROM shop_data WHERE shop_did = '".$editid."'";
			$data_result = $mydb->runQuery($data);
			$data_row = mysqli_fetch_assoc($data_result);
	?>	
	<form role="form">
		<div class="form-group">
			<label>ชื่อสินค้า</label>
				<input type="text" id="name" class="form-control" value="<?php echo $data_row['shop_name']?>">
		</div>
		<div class="form-group">
			<label>Details</label>
				<textarea id="details" class="form-control"><?php echo $data_row['shop_details']?></textarea>
		</div>
		<div class="form-group">
			<label>Image</label>
				<input type="text" id="image" class="form-control" value="<?php echo $data_row['shop_image']?>">
		</div>
		<div class="form-group">
			<label>Price</label>
				<input type="text" id="price" class="form-control" value="<?php echo $data_row['shop_price']?>">
		</div>
		<div class="form-group">
			<label>Description</label>
				<textarea id="body"><?php echo $data_row['shop_desc']?></textarea>
		</div>
		<div class="form-group">
			<label>ประเภท</label>
			<select id="cate" class="select-type">
				<?php 
					$category = "SELECT * FROM shop_category";
					$category_result = $mydb->runQuery($category);
					while($category_row = mysqli_fetch_assoc($category_result)){
				?>
				<option value="<?php echo $category_row['category_cid']?>" <?php if($category_row['category_cid'] == $data_row['shop_category']){ echo "selected='selected'";}?>><?php echo $category_row['category_name']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Keyword</label>
				<input type="text" id="keyword" class="form-control" value="<?php echo $data_row['shop_keyword']?>">
		</div>
		<div class="form-group">
			<label>Contact</label>
				<input type="text" id="contact" class="form-control" value="<?php echo $data_row['shop_contact']?>">
		</div>
		<input type="hidden" id="did" value="<?php echo $data_row['shop_did']?>">
		<button type="submit" class="btn btn-default" onclick="DataEdit(); return false">แก้ไข</button>
		<button type="submit" class="btn btn-default" onclick="DataDel(); return false">ลบ</button> 
	</form>
	<?php
			} else {
			$data = "SELECT * FROM shop_data ORDER BY shop_did DESC";
			$data_result = $mydb->runQuery($data);
			while($data_row = mysqli_fetch_assoc($data_result)){

			$category = "SELECT * FROM shop_category WHERE category_cid = '".$data_row['shop_category']."'";
			$category_result = $mydb->runQuery($category);
			$category_row = mysqli_fetch_assoc($category_result);
	?>
	<div>[<a href="?sec=data&insub=data-edit&edit-id=<?php echo $data_row['shop_did'];?>"> แก้ไข</a>] <?php echo $data_row['shop_name'];?> (<?php echo $category_row['category_name']?>)</div>
	<?php
				}
				}
	?>
</div>
