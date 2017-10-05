<div>
	<h2 class="sub-header">เพิ่มแบนเนอร์</h2>
	<form role="form">
		<div class="form-group">
			<label>Title</label>
				<input type="text" id="title" class="form-control">
		</div>
		<div class="form-group">
			<label>Url</label>
				<input type="text" id="link" class="form-control">
		</div>
		<div class="form-group">
			<label>Image</label>
				<input type="text" id="image" class="form-control">
		</div>
		<div class="form-group">
			<label>Description</label>
				<input type="text" id="desc" class="form-control">
		</div>
		<div class="form-group">
			<label>ตำแหน่ง</label>
				<select id="pos" class="select-type">
					<option value="0">ด้านบน</option>
					<option value="1">ด้านล่าง</option>
				</select>
		</div>

		  <button type="submit" class="btn btn-default" onclick="DoBanAdd(); return false">เพิ่มแบนเนอร์</button> 
	</form>
</div>
