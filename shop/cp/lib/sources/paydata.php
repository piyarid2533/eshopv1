<div class="contain">
<h2 class="sub-header">รายการชำระเงิน</h2>
	<?php		
		@$invoice = $_GET['invoice'];
		if($invoice)
		{
			$paydata = "SELECT * FROM shop_paydata WHERE paydata_invoice = '".$invoice."'";
			$paydata_result = $mydb->runQuery($paydata);
			$paydata_row = mysqli_fetch_assoc($paydata_result);
	?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th></th>
				<th>ข้อมูล</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Invoice</td>
				<td><?php echo $paydata_row['paydata_invoice']?></td>
			</tr>
			<tr>
				<td>ประเภทการโอน</td>
				<td><?php echo $paydata_row['paydata_type']?></td>
			</tr>
			<tr>
				<td>วันเวลาที่โอนเงิน</td>
				<td><?php echo $paydata_row['paydata_date']?></td>
			</tr>
			<tr>
				<td>จำนวนเงินที่โอน</td>
				<td><?php echo number_format($paydata_row['paydata_money'],2)?> บาท</td>
			</tr>
			<tr>
				<td>สถานะ</td>
				<td><?php if($paydata_row['paydata_status'] == 1){echo "อนุมัติแล้ว";}else{echo "ยังไม่ได้อนุมัติ";}?></td>
			</tr>
			<tr>
				<td>หมายเหตุ</td>
				<td><?php echo $paydata_row['paydata_msg']?></td>
			</tr>
		</tbody>
	</table>
	<hr></hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ชื่อสินค้า</th>
				<th>ราคา</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$order = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
				while($order_row = mysqli_fetch_assoc($order)){

				$shop_data = $mydb->runQuery("SELECT * FROM shop_data WHERE shop_did = '".$order_row['shop_did']."'");
				$shop_row = mysqli_fetch_assoc($shop_data);
				$sum += $shop_row['shop_price'];
			?>
			<tr>
				<td><?php echo $shop_row['shop_name']?></td>
				<td><?php echo number_format($shop_row['shop_price'],2)?></td>
			</tr>
			<?php } ?>
			<tr>
				<td style="text-align:right;">รวมเป็นเงิน</td>
				<td><strong><?php echo number_format($sum,2)?></strong></td>
			</tr>
		</tbody>
	</table>
	<div>
		<input type="hidden" id="invoice" value="<?php echo $invoice?>"/>
		<button type="submit" class="btn btn-default" onclick="PayApp(); return false">ยืนยันการโอนเงิน</button>
	</div>
	<?php } else { ?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Invoice</th>
				<th>วันที่</th>
			</tr>
		</thead>
		<tbody>
			<?php

				$paydata = $mydb->runQuery("SELECT * FROM shop_paydata ORDER BY paydata_pid DESC");
				while($paydata_row = mysqli_fetch_assoc($paydata)){
			?>
			<tr>
				<td><a href="?sec=payments&insub=paydata&invoice=<?php echo $paydata_row['paydata_invoice']?>"><?php echo $paydata_row['paydata_invoice']?></a></td>
				<td><?php echo $paydata_row['paydata_date']?></td>
			</tr>
			<?php
				} 
			?>
		</tbody>
	</table>
	<?php } ?>
</div>