<?php 
	$menu = array(
		"0" => "จัดการสินค้า",
		"1" => "จัดการประเภท",
		"2" => "จัดการรายการสั่งสินค้า",
		"3" => "จัดการการชำระเงิน"
	);
		
	$menu_sec = array(
		"0" => "data",
		"1" => "category",
		"2" => "order",
		"3" => "payments"
	);
		
	$sub_menu = array(
		"data"  =>  array("data-add" => "เพิ่มสินค้า","data-edit" => "แก้ไขสินค้า"),
		"category"  =>  array("cate-add" => "เพิ่มหัวข้อ","cate-edit" => "แก้ไขหัวข้อ"),
		"order"  =>  array("order" => "จัดการรายการสั่งสินค้า"),
		"payments" => array("pay-add" => "เพิ่มการช่องทางชำระเงิน","pay-edit" => "แก้ไขช่องทางการชำระเงิน","paydata" => "ดูการแจ้งชำระเงิน"),
	);
?>