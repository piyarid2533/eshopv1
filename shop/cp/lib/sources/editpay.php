<div class="contain">
<h2 class="sub-header">แก้ไข</h2>
	<?php		
		@$pid = $_GET['pay-id'];
		if($pid)
		{
			$payments = $mydb->runQuery("SELECT * FROM shop_payments WHERE payments_pid = '".$pid."'");
			$payments_row = mysqli_fetch_assoc($payments);
	?>	
	<form role="form">
		<div class="form-group">
			<label>Icon</label>
				<input type="text" id="icon" class="form-control" value="<?php echo $payments_row['payments_icon']?>">
		</div>
		<div class="form-group">
			<label>Data</label>
				<input type="text" id="data" class="form-control" value="<?php echo $payments_row['payments_data']?>">
		</div>
			<input id="pid" type="hidden" value="<?php echo $payments_row['payments_pid']?>"/>
		  	<button type="submit" class="btn btn-default" onclick="PayEdit(); return false">แก้ไข</button> 
			<button type="submit" class="btn btn-default" onclick="PayDel(); return false">ลบ</button> 
	</form>
	<?php
			} else {
			$payments = $mydb->runQuery("SELECT * FROM shop_payments ORDER BY payments_pid DESC");
			while($payments_row = mysqli_fetch_assoc($payments)){
	?>
	<div>[<a href="?sec=payments&insub=pay-edit&pay-id=<?php echo $payments_row['payments_pid'];?>"> แก้ไข</a> ] <?php echo $payments_row['payments_data'];?></div>
	<?php
			}
			}
	?>
</div>