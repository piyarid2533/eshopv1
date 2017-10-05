<?php 
	session_start();

	require_once "../lib/webconfig.php";
	require_once "../func/database.class.php";
	require_once "plugin/mail/mail.php";

	date_default_timezone_set('Asia/Bangkok'); 

	$mydb = new Database();

	@$act = $mydb->clearText($_POST['action']);

	if($act == "addcart"){
		$did = $mydb->clearText($_POST['did']);

		if(!isset($_SESSION['line'])){

			$_SESSION['line'] = 0;
			$_SESSION['shop_data'][0] = $did;
			$_SESSION['qty'][0] = 1;

		} else {

			$key = array_search($did,$_SESSION['shop_data']);

			if((string)$key != ""){

				$_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;

			} else {

				$_SESSION['line'] = $_SESSION['line'] + 1;
				$line = $_SESSION['line'];
				$_SESSION['shop_data'][$line] = $did;
				$_SESSION['qty'][$line] = 1;

			}
		}

	}
	if($act == "delfmcart"){
		$i = $mydb->clearText($_POST['i']);
		$_SESSION['shop_data'][$i] = "";
		$_SESSION['qty'][$i] = "";
	}
	if($act == "order"){
		$did = $mydb->clearText($_POST['did']);
		$ip = $_SERVER['REMOTE_ADDR'];
		$name = $mydb->clearText($_POST['name']);
		$email = $mydb->clearText($_POST['email']);
		$tel = $mydb->clearText($_POST['tel']);
		$invoice = strrev(time());
		$sum = "";
		$product = "";
		$date = date("Y-m-d");
		if($did){
			$shop_did = explode(",",$did);
			for($i=0;$i<count($shop_did);$i++){
				$insert = "INSERT INTO shop_order (shop_did,order_name,order_email,order_tel,order_invoice,order_ipaddress) VALUES ('".$shop_did[$i]."','".$name."','".$email."','".$tel."','".$invoice."','".$ip."')";
				$insert_result = $mydb->runQuery($insert);

				if($insert_result){
					if($i==count($shop_did)-1){
						echo "ทำการสั่งซื้อสินค้าเรียบร้อยแล้ว\n";
						echo "กรุณาเช็ค อีเมล์ของท่านด้วย " . $email , "\n";
						for($i=0;$i<count(@$_SESSION["shop_data"]);$i++){
							$_SESSION['shop_data'][$i] = "";
							$_SESSION['qty'][$i] = "";
						}
						SendMail($email,$invoice,1);
					}
				} else {
					if($i==count($shop_did)-1){
						echo "ไม่สามารถทำการสั่งซื้อสินค้าได้ในขณะนี้";
					}
				}
			}
		} else {
			echo "ขออภัยในตระร้าสินค้าของคุณไม่มีสินค้าอยู่";
		}
	}
	if($act == "pay"){
		$invoice = $mydb->clearText($_POST['invoice']);
		$type = $mydb->clearText($_POST['type']);
		$date = $mydb->clearText($_POST['date']);
		$money = $mydb->clearText($_POST['money']);
		$msg = $mydb->clearText($_POST['msg']);

		$paydata = "SELECT * FROM shop_paydata WHERE paydata_invoice = '".$invoice."'";
		$paydata_result = $mydb->runQuery($paydata);
		$paydata_row = mysqli_fetch_assoc($paydata_result);

		$order = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
		$order_row = mysqli_fetch_assoc($order);

		if($paydata_row['paydata_status'] == 1){
			echo "Invoice นี้อนุมัติแล้ว";
		} else {
			$insert = $mydb->runQuery("INSERT INTO shop_paydata (paydata_invoice,paydata_type,paydata_date,paydata_money,paydata_msg) VALUES ('".$invoice."','".$type."','".$date."','".$money."','".$msg."')");
			if($insert){
				echo "แจ้งการชำระเงินเรียบร้อยแล้ว\n";
				SendMail($order_row['order_email'],$invoice,2);
			} else {
				echo "แจ้งการชำระเงินไม่สำเร็จ";
			}
		}
	}
	if($act == "payapp"){
		$invoice = $mydb->clearText($_POST['invoice']);
		$approve = $mydb->runQuery("UPDATE shop_paydata SET paydata_status = '1' WHERE paydata_invoice = '".$invoice."'");

		$order = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
		$order_row = mysqli_fetch_assoc($order);

		if($approve){
			echo "ทำการอนุมัติ Invoice ". $invoice . "เรียบร้อยแล้ว\n";
			SendMail($order_row['order_email'],$invoice,3);
		} else {
			echo "ทำการอนุมัติไม่สำเร็จ";
		}
	}
	if($act == "adminlog"){
		$user = $mydb->clearText($_POST['user']);
		$pass = $mydb->clearText($_POST['pass']);

		if($user == "admin" && $pass == "2nPCS9wB"){
			$_SESSION['Admin'] = true;
			echo "Login Ok.";
		}
	}
	if(@$_SESSION['Admin']){
		if($act == "adddata"){
			$name = $mydb->clearText($_POST['name']);
			$details = $mydb->clearText($_POST['details']);
			$image = $mydb->clearText($_POST['image']);
			$price = $mydb->clearText($_POST['price']);
			$desc = $mydb->clearText($_POST['desc']);
			$cate = $mydb->clearText($_POST['cate']);
			$keyword = $mydb->clearText($_POST['keyword']);
			$contact = $mydb->clearText($_POST['contact']);

			$insert = "INSERT INTO shop_data (shop_name,shop_details,shop_image,shop_price,shop_desc,shop_category,shop_keyword,shop_contact) VALUES ('".$name."','".$details."','".$image."','".$price."','".$desc."','".$cate."','".$keyword."','".$contact."')";
			$insert_result = $mydb->runQuery($insert);
			if($insert_result){
				echo "เพิ่มสินค้าใหม่สำเร็จ";
			} else {
				echo "เพิ่มสินค้าใหม่ไม่สำเร็จ";
			}

		}
		if($act == "editdata"){
			$name = $mydb->clearText($_POST['name']);
			$details = $mydb->clearText($_POST['details']);
			$image = $mydb->clearText($_POST['image']);
			$price = $mydb->clearText($_POST['price']);
			$desc = $mydb->clearText($_POST['desc']);
			$cate = $mydb->clearText($_POST['cate']);
			$keyword = $mydb->clearText($_POST['keyword']);
			$contact = $mydb->clearText($_POST['contact']);
			$did = $mydb->clearText($_POST['did']);

			$update = $mydb->runQuery("UPDATE shop_data SET shop_name = '".$name."' , shop_details = '".$details."' , shop_image = '".$image."' , shop_price = '".$price."' , shop_desc = '".$desc."' , shop_category = '".$cate."' , shop_keyword = '".$keyword."' , shop_contact = '".$contact."' WHERE shop_did = '".$did."'");
			if($update){
				echo "ทำการแก้ไขสินค้าใหม่สำเร็จ";
			} else {
				echo "ทำการแก้ไขสินค้าใหม่ไม่สำเร็จ";
			}
		}
		if($act == "deldata"){
			$did = $mydb->clearText($_POST['did']);
			$delete = $mydb->runQuery("DELETE FROM shop_data WHERE shop_did = '".$did."'");
			if($delete){
				echo "ทำการลบสินค้าสำเร็จ";
			} else {
				echo "ทำการลบสินค้าไม่สำเร็จ";
			}
		}
		if($act == "addcate"){
			$name = $mydb->clearText($_POST['name']);
			$insert = $mydb->runQuery("INSERT INTO shop_category (category_name) VALUES ('".$name."')");
			if($insert){
				echo "ทำการเพิ่มประเภทสำเร็จ";
			} else {
				echo "ทำการเพิ่มประเภทไม่สำเร็จ";
			}
		}
		if($act == "editcate"){
			$name = $mydb->clearText($_POST['name']);
			$cid = $mydb->clearText($_POST['cid']);
			$update = $mydb->runQuery("UPDATE shop_category SET category_name = '".$name."' WHERE category_cid = '".$cid."'");
			if($update){
				echo "ทำการแก้ไขประเภทสำเร็จ";
			} else {
				echo "ทำการแก้ไขประเภทไม่สำเร็จ";
			}
		}
		if($act == "delcate"){
			$cid = $mydb->clearText($_POST['cid']);
			$delete = $mydb->runQuery("DELETE FROM shop_category WHERE category_cid = '".$cid."'");
			if($delete){
				echo "ทำการลบประเภทสำเร็จ";
			} else {
				echo "ทำการลบประเภทไม่สำเร็จ";
			}
		}
		if($act == "addpay"){
			$icon = $mydb->clearText($_POST['icon']);
			$data = $mydb->clearText($_POST['data']);
			$insert = $mydb->runQuery("INSERT INTO shop_payments (payments_icon,payments_data) VALUES ('".$icon."','".$data."')");
			if($insert){
				echo "ทำการเพิ่มการชำระเงินใหม่สำเร็จ";
			} else {
				echo "ทำการเพิ่มการชำระเงินใหม่ไม่สำเร็จ";
			}
		}
		if($act == "editpay"){
			$icon = $mydb->clearText($_POST['icon']);
			$data = $mydb->clearText($_POST['data']);
			$pid = $mydb->clearText($_POST['pid']);

			$update = $mydb->runQuery("UPDATE shop_payments SET payments_icon = '".$icon."' , payments_data = '".$data."' WHERE payments_pid = '".$pid."'");
			if($update){
				echo "แก้ไขสำเร็จ";
			} else {
				echo "แก้ไขไม่สำเร็จ";
			}
		}
		if($act == "delpay"){
			$pid = $mydb->clearText($_POST['pid']);
			$delete = $mydb->runQuery("DELETE FROM shop_payments WHERE payments_pid = '".$pid."'");
			if($delete){
				echo "ลบสำเร็จ";
			} else {
				echo "ลบไม่สำเร็จ";
			}
		}
		if($act == "emailsend"){
			$invoice = $mydb->clearText($_POST['invoice']);
			$order = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
			$order_row = mysqli_fetch_assoc($order);

			SendMail($order_row['order_email'],$invoice,1);
		}
	}
?>