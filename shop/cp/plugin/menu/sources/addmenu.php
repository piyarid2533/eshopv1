<div>
	<h2 class="sub-header">เพิ่มเมนู</h2>
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
			<label>ลิงค์</label>
				<select id="type" class="select-type">
					<option value="0">ภายใน</option>
					<option value="1">ภายนอก</option>
				</select>
		</div>
		  <button type="submit" class="btn btn-default" onclick="DoMenuAdd(); return false">เพิ่มเมนู</button> 
	</form>
</div>