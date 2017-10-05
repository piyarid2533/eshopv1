<div>
<?php 
	@$menuid = $_GET['mid'];
	if($menuid)
	{
		$menu = $mysqli->query("SELECT * FROM menu WHERE mid='".$menuid."'");
		$menu_result = $menu->fetch_assoc();
?>
	<h2 class="sub-header">แก้ไขเมนู</h2>
	<form role="form">
		<div class="form-group">
			<label>Title</label>
				<input type="text" id="title" class="form-control" value="<?php echo $menu_result['text']?>">
		</div>
		<div class="form-group">
			<label>Url</label>
				<input type="text" id="link" class="form-control" value="<?php echo $menu_result['link']?>">
		</div>
		<div class="form-group">
			<label>ลิงค์</label>
				<select id="type" class="select-type">
					<option value="0" <?php if($menu_result['type'] == 0){ echo "selected='selected'";}?>>ภายใน</option>
					<option value="1" <?php if($menu_result['type'] == 1){ echo "selected='selected'";}?>>ภายนอก</option>
				</select>
		</div>
		  <input id="mid" type="hidden" value="<?php echo $menu_result['mid']?>"></input>
		  <button type="submit" class="btn btn-default" onclick="DoMenuEdit(); return false">แก้ไขเมนู</button> 
		  <button type="submit" class="btn btn-default" onclick="DoMenuDelete(); return false">ลบเมนู</button> 
		  
	</form>
	<?php
			} else {
			$menu = $mysqli->query("SELECT * FROM menu ORDER BY mid DESC");
	?>
	<div>
	<table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Link</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
		<?php
				while($menu_result = $menu->fetch_assoc()){
		?>
		<tr>
            <td><?php echo $menu_result['text']?></td>
            <td><?php echo $menu_result['link']?></td>
            <td><a href="?sec=plugin&insub=plugin&src=menu&op=menu-edit&mid=<?php echo $menu_result['mid'];?>"> แก้ไข</a></td>
          </tr>	
		<?php
				} 
		?>
			</tbody>
		  </table>
		</div>
		<?php
			}
		?>
</div>
