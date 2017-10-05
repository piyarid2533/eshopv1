<div>
<?php 
	@$aid = $_GET['aid'];
	if($aid){
		$anno = $mysqli->query("SELECT * FROM announcement WHERE aid = '".$aid."'");
		$anno_result = $anno->fetch_assoc();
?>
	<h2 class="sub-header">แก้ไขประกาศ</h2>
	<form role="form">
		<div class="form-group">
			<label>Title</label>
				<input type="text" id="title" class="form-control" value="<?php echo $anno_result['title']?>">
		</div>
		<div class="form-group">
			<label>Description</label>
				<textarea type="text" id="msg" class="form-control"><?php echo $anno_result['message']?></textarea>
		</div>
			<input id="aid" type="hidden" value="<?php echo $anno_result['aid']?>"></input>
		  <button type="submit" class="btn btn-default" onclick="DoAnnoEdit(); return false">แก้ไขประกาศ</button> 
		  <button type="submit" class="btn btn-default" onclick="DoAnnoDelete(); return false">ลบประกาศ</button> 
	</form>
	<?php
				} else {
				$anno = $mysqli->query("SELECT * FROM announcement ORDER BY aid DESC");
	?>
	<div>
	<table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Message</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
	<?php
				while($anno_result = $anno->fetch_assoc()){
	?>
		<tr>
            <td><?php echo $anno_result['title']?></td>
            <td><?php echo CutStr($anno_result['message'],"85","...")?></td>
            <td><a href="?sec=plugin&insub=plugin&src=announcement&op=anno-edit&aid=<?php echo $anno_result['aid'];?>"> แก้ไข</a></td>
          </tr>	
	<?php
				} 
				}
	?>
		</tbody>
      </table>
	</div>
</div>
