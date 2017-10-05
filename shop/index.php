<!DOCTYPE html>
<?php 
	session_start();
	date_default_timezone_set('Asia/Bangkok');
?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>E-shop</title>

	<!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="assets/js/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/js/bootstrap/css/bootstrap-responsive.min.css" />

	<!-- Includes FontAwesome -->
	<link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css" />

	<!-- Css -->	
	<link rel="stylesheet" href="assets/css/style.css" />

</head>
<body>
	<?php 
		include_once "lib/webconfig.php";
		include_once "func/database.class.php";
		include_once "func/function.class.php";

		$func = new Func();
		$mydb = new Database();
	?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="index.php">Hotsell.in.th</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">เมนู <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="?sec=payments">การชำระเงิน</a></li>
								<li><a href="?sec=money">แจ้งการชำระเงิน</a></li>
								<li><a href="?sec=contact">ติดต่อเรา</a></li>
							</ul>
						</li>
					</ul>	
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="span3">
				<div class="well">

					<div class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-shopping-cart"></i>
							ตระกร้าสินค้าของคุณ
							<b class="caret"></b></a>
						</a>
						<div class="dropdown-menu well" role="menu" aria-labelledby="dLabel">
							<?php 
								for($i=0;$i<count(@$_SESSION["shop_data"]);$i++)
								{
									if(@$_SESSION['shop_data'][$i] != ""){
									$shop_data = "SELECT * FROM shop_data WHERE shop_did = '".$_SESSION["shop_data"][$i]."'";
									$shop_result = $mydb->runQuery($shop_data);
									$shop_row = mysqli_fetch_assoc($shop_result);
							?>
							<p><?php echo $shop_row['shop_name']?> <a onclick="DelFmCart(<?php echo $i?>); return false"><i class="icon-trash"></i></a><span class="pull-right"><?php echo number_format($shop_row['shop_price'],2)?></span></p>
							<?php } }?>
							<a href="#" class="btn btn-primary" onclick="CheckOut(); return false">Checkout</a>
						</div>
					</div>

				</div>

				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">Category</li>
						<li><a href="index.php">หน้าแรก</a></li>
						<?php 
							$category = "SELECT * FROM shop_category";
							$category_result = $mydb->runQuery($category);
							while($category_row = mysqli_fetch_assoc($category_result)){
						?>
						<li>
							<a href="?sec=category&cid=<?php echo $category_row['category_cid']?>"><?php echo $category_row['category_name']?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php 
				@$sec = $_GET['sec'];
				switch($sec){
					case "money":
			?>		
			<div class="span9">
				<h2>แจ้งการชำระเงิน</h2>
				<form>
					<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Invoice Number <font color="red">*</font></td>
							<td><input type="text" id="invoice"/></td>
						</tr>
						<tr>
							<td>วิธีการชำระเงิน <font color="red">*</font></td>
							<td>
								<select id="type">
									<option value="Bank">Bank</option>
								</select>
							</td>
						</tr>
						<tr class="bank">
							<td>วันที่ชำระเงิน <font color="red">*</font></td>
							<td><input type="text" id="date" placeholder="วว/ดด/ปปปป"/></td>
						</tr>
						<tr class="bank">
							<td>จำนวนเงินที่ชะระ <font color="red">*</font></td>
							<td><input type="text" id="money"/></td>
						</tr>
						<tr class="bank">
							<td>หมายเหตุ <font color="red">*</font></td>
							<td><textarea id="msg"></textarea></td>
						</tr>
					</tbody>
				</table>
				<a href="" class="btn btn-primary pull-right" onclick="Pay(); return false">บันทึก</a>
				</form>
			</div>
			<?php
						break;
					case "payments":
			?>
			<div class="span9">
				<h2>การชำระเงิน</h2>
				<form>
					<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$payments = "SELECT * FROM shop_payments";
							$payments_result = $mydb->runQuery($payments);
							while($payments_row = mysqli_fetch_assoc($payments_result)){
						?>
						<tr>
							<td>
								<div><img src="<?php echo $payments_row['payments_icon']?>"/></div>
								<div><?php echo $payments_row['payments_data']?></div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				</form>
			</div>		
			<?php
						break;
					case "contact":
			?>
			<div class="span9">
				<div>Contact Email: hotsell.in.th</div>
			</div>		
			<?php
						break;
					case "terms":
			?>
			<div class="span9">
				<div>wqewqe</div>
			</div>		
			<?php
						break;
					case "checkout":
			?>
			<div class="span9">

				<h2>Shopping Cart</h2>

				<form>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>สินค้า</th>
							<th>ราคา</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sum = "";
							for($i=0;$i<count(@$_SESSION["shop_data"]);$i++)
							{
								if(@$_SESSION['shop_data'][$i]){
								$shop_data = "SELECT * FROM shop_data WHERE shop_did = '".$_SESSION["shop_data"][$i]."'";
								$shop_result = $mydb->runQuery($shop_data);
								$shop_row = mysqli_fetch_assoc($shop_result);
								$sum += $shop_row['shop_price'];
						?>
						<tr>
							<td><input type="hidden" id="sh[]" value="<?php echo $shop_row['shop_did']?>"><?php echo $shop_row['shop_name']?></td>
							<td><?php echo number_format($shop_row['shop_price'],2)?> บาท</td>
							<td><a onclick="DelFmCart(<?php echo $i?>); return false"><i class="icon-trash"></i></a></td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ข้อมูลผู้ซื้อ</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>ชื่อ นามสกุล</td>
							<td><input type="text" id="name"/></td>
						</tr>
						<tr>
							<td>อีเมล์(ไว้สำหรับติดต่อกลับ)</td>
							<td><input type="text" id="email"/></td>
						</tr>
						<tr>
							<td>เบอร์โทร</td>
							<td><input type="text" id="tel"/></td>
						</tr>
					</tbody>
				</table>
			</form>
			<dl class="dl-horizontal pull-right">
				<dt>Total:</dt>
				<dd><?php if($sum){ echo number_format($sum,2); } else { echo number_format(0,2);}?> บาท</dd>
			</dl>
			<div class="clearfix"></div>
			<a href="#" class="btn btn-primary pull-right" onclick="Order(); return false">Continue Shopping</a>
		</div>
			<?php
						break;
					case "category":
						@$cid = $mydb->clearText($_GET['cid']);
						if($cid){
			?>
			<div class="span9">
				<ul class="thumbnails">
					<?php 
						$shop_data = "SELECT * FROM shop_data WHERE shop_category = '".$cid."' ORDER BY shop_did DESC";
						$shop_result = $mydb->runQuery($shop_data);
						while($shop_row = mysqli_fetch_assoc($shop_result)){
					?>
					<li class="span3">
						<div class="thumbnail">
							<img src="<?php echo $shop_row['shop_image']?>" alt="">
							<div class="caption">
								<h4><?php echo $shop_row['shop_name']?></h4>
								<p><?php echo number_format($shop_row['shop_price'],2)?> บาท</p>
								<a class="btn btn-primary" href="?sec=item&did=<?php echo $shop_row['shop_did']?>">View</a>
								<a class="btn btn-success" href="#" onclick="AddToCart(<?php echo $shop_row['shop_did']?>); return false">Add to Cart</a>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php
						}
						break;
					case "item":
					@$did = $mydb->clearText($_GET['did']);
					if($did){

						$shop_data = "SELECT * FROM shop_data WHERE shop_did = '".$did."'";
						$shop_result = $mydb->runQuery($shop_data);
						$shop_row = mysqli_fetch_assoc($shop_result);

						$category = "SELECT * FROM shop_category WHERE category_cid = '".$shop_row['shop_category']."'";
						$category_result = $mydb->runQuery($category);
						$category_row = mysqli_fetch_assoc($category_result);
			?>
				<div class="span9">
				<div class="row">
					<div class="span5">
						<div id="items-carousel" class="carousel slide mbottom0">
							<div class="carousel-inner">
								<div class="active item">
									<img style="width: 470px; height: 310px;" data-src="holder.js/470x310" class="media-object" src="<?php echo $shop_row['shop_image']?>" alt="470x310">
								</div>
							</div>
						</div>
					</div>

					<div class="span4">
						<h4><?php echo $shop_row['shop_name']?></h4>
						<h5><?php echo $category_row['category_name']?></h5>
						<p><?php echo $shop_row['shop_details']?></p>
						<h4>ราคา <?php echo number_format($shop_row['shop_price'],2)?> บาท</h4>
						<form>
							<button class="btn btn-primary" onclick="AddToCart(<?php echo $shop_row['shop_did']?>); return false">Add to Chart</button>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="span9">
						<ul class="nav nav-tabs" id="tabs">
							<li class="active"><a href="#description">Description</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="description">
								<?php echo $shop_row['shop_desc']?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
						}
						break;
					default:
			?>
			<div class="span9">
				<ul class="thumbnails">
					<?php 
						$shop_data = "SELECT * FROM shop_data ORDER BY shop_did DESC";
						$shop_result = $mydb->runQuery($shop_data);
						while($shop_row = mysqli_fetch_assoc($shop_result)){
					?>
					<li class="span3">
						<div class="thumbnail">
							<img src="<?php echo $shop_row['shop_image']?>" alt="">
							<div class="caption">
								<h4><?php echo $shop_row['shop_name']?></h4>
								<p><?php echo number_format($shop_row['shop_price'],2)?> บาท</p>
								<a class="btn btn-primary" href="?sec=item&did=<?php echo $shop_row['shop_did']?>">View</a>
								<a class="btn btn-success" onclick="AddToCart(<?php echo $shop_row['shop_did']?>); return false">Add to Cart</a>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
	
	<hr />

	<footer id="footer" class="vspace20">
		<div class="container">
			<div class="row">
			</div>

			<div class="row">
				<div class="span6">
					<p>&copy; Copyright 2015.&nbsp;Create By includ</p>
				</div>
			</div>
		</div>
	</footer>	

	<script src="assets/js/jquery-1.10.0.min.js"></script>
	<script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/holder.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>