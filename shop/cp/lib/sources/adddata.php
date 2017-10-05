<div class="contain">
	<h2 class="sub-header">เพิ่มสินค้าใหม่</h2>
	<form role="form">
		<div class="form-group">
			<label>ชื่อสินค้า</label>
				<input type="text" id="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Details</label>
				<textarea id="details" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label>Image</label>
				<input type="text" id="image" class="form-control">
		</div>
		<div class="form-group">
			<label>Price</label>
				<input type="text" id="price" class="form-control">
		</div>
		<div class="form-group">
			<label>Description</label>
				<textarea id="body"></textarea>
		</div>
		<div class="form-group">
			<label>ประเภท</label>
			<select id="cate" class="select-type">
				<?php 
					$category = "SELECT * FROM shop_category";
					$category_result = $mydb->runQuery($category);
					while($category_row = mysqli_fetch_assoc($category_result)){
				?>
				<option value="<?php echo $category_row['category_cid']?>" selected="selected"><?php echo $category_row['category_name']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Keyword</label>
				<input type="text" id="keyword" class="form-control">
		</div>
		<div class="form-group">
			<label>Contact</label>
				<input type="text" id="contact" class="form-control">
		</div>
		<button type="submit" class="btn btn-default" onclick="DataAdd(); return false">เพิ่ม</button> 
	</form>
</div>