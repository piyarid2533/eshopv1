<div class="contain">
<h2 class="sub-header">รายการสั่งสื้อสินค้าของวันนี้</h2>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ลำดับที่</th>
				<th>ข้อมูลผู้ซื้อ</th>
				<th>สินค้า</th>
				<th>ราคา</th>
				<th>สั่งเมื่อ</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php

				$order = $mydb->runQuery("SELECT * FROM shop_order ORDER BY order_oid DESC");
				while($order_row = mysqli_fetch_assoc($order)){

				$shop_data = $mydb->runQuery("SELECT * FROM shop_data WHERE shop_did = '".$order_row['shop_did']."'");
				$shop_row = mysqli_fetch_assoc($shop_data);
			?>
			<tr>
				<td><?php echo $order_row['order_oid']?> (<?php echo $order_row['order_invoice']?>)</td>
				<td><?php echo $order_row['order_name']?></td>
				<td><?php echo $shop_row['shop_name']?></td>
				<td><?php echo number_format($shop_row['shop_price'],2)?></td>
				<td><?php echo $func->count_time($order_row['order_time'])?></td>
				<td><button type="submit" class="btn btn-default" onclick="EmailSend(<?php echo $order_row['order_invoice']?>); return false">ส่งอีเมล์</button></td>
			</tr>
			<?php
				} 
			?>
		</tbody>
	</table>
</div>