<div>
<?php 
	@$bid = $_GET['bid'];
	if($bid){
		$banner = $mysqli->query("SELECT * FROM banner WHERE bid = '".$bid."'");
		$banner_result = $banner->fetch_assoc();
?>
	<h2 class="sub-header">แก้ไขแบนเนอร์</h2>
	<form role="form">
		<div class="form-group">
			<label>Title</label>
				<input type="text" id="title" class="form-control" value="<?php echo $banner_result['title']?>">
		</div>
		<div class="form-group">
			<label>Url</label>
				<input type="text" id="link" class="form-control" value="<?php echo $banner_result['link']?>">
		</div>
		<div class="form-group">
			<label>Image</label>
				<input type="text" id="image" class="form-control" value="<?php echo $banner_result['image']?>">
		</div>
		<div class="form-group">
			<label>Description</label>
				<input type="text" id="desc" class="form-control" value="<?php echo $banner_result['description']?>">
		</div>
		<div class="form-group">
			<label>ตำแหน่ง</label>
				<select id="pos" class="select-type">
					<option value="0" <?php if($banner_result['position'] == 0){ echo "selected='selected'";}?>>ด้านบน</option>
					<option value="1" <?php if($banner_result['position'] == 1){ echo "selected='selected'";}?>>ด้านล่าง</option>
				</select>
		</div>
		  <input id="bid" type="hidden" value="<?php echo $banner_result['bid']?>"></input>
		  <button type="submit" class="btn btn-default" onclick="DoBanEdit(); return false">แก้ไขแบนเนอร์</button> 
		  <button type="submit" class="btn btn-default" onclick="DoBanDelete(); return false">ลบแบนเนอร์</button> 
		  
	</form>
	<?php
				} else {
				$banner = $mysqli->query("SELECT * FROM banner ORDER BY bid DESC");
	?>
	<div>
	<table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Title</th>
            <th>Link</th>
            <th>Description</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
		<?php
				while($banner_result = $banner->fetch_assoc()){
		?>
		<tr>
            <th scope="row"><?php echo $banner_result['bid']?> <?php if($banner_result['position'] == 0){ echo "ด้านบน"; } else {  echo "ด้านล่าง"; }?></th>
            <td><?php echo $banner_result['title']?></td>
            <td><?php echo $banner_result['link']?></td>
            <td><?php echo $banner_result['desc']?></td>
            <td><a href="?sec=plugin&insub=plugin&src=banner&op=banner-edit&bid=<?php echo $banner_result['bid'];?>"> แก้ไข</a></td>
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
