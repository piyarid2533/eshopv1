<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Invoice</title>
  <style>
    body {font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857;color: #333;}
    table{border-collapse: collapse;border-spacing: 0px;}
    table tr:not(:last-child){border-bottom:1px dashed #CCC;}
    a{color:#B45F04;text-decoration:none;}
    h1,h2,h3,h4{margin:0px;padding:0px;}
    hr{border-top:1px dashed #DDD;border-bottom:0px;}
  </style>
</head>
<body>
  <?php 
    include_once "/../../../lib/webconfig.php";
    include_once "/../../../func/database.class.php";
    include_once "/../../../func/function.class.php";

    $func = new Func();
    $mydb = new Database();
    $invoice = $mydb->clearText($_GET['invoice']);

    $invoice_data = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
    $invoice_row = mysqli_fetch_assoc($invoice_data);

?>
<div style="text-align: center;"><img src="<?php echo DOMAIN?>/images/logo.png"/></div>
  <div style="margin-top:30px;">
    <div><h4>Invoice: <?php echo $invoice_row['order_invoice']?></h4></div>
    <div><h4>Date: <?php echo substr($invoice_row['order_time'],0,10)?></h4></div>
<?php 
  $sec = $_GET['sec'];
  switch($sec){
    case "payments":

    $paydata = "SELECT * FROM shop_paydata WHERE paydata_invoice = '".$invoice."'";
    $paydata_result = $mydb->runQuery($paydata);
    $paydata_row = mysqli_fetch_assoc($paydata_result);
?>
<hr></hr>
<div>ขอบคุณสำหรับการเลือกซื้อสินค้าจากเรา</div>
<div>จำนวนเงินที่โอนเข้ามา <?php echo number_format($paydata_row['paydata_money'],2)?> ฿</div>
<div>กรุณารอเจ้าของร้านยืนยันการโอนเงิน อาจจะต้องใช้เวลา 1-24 ชั่วโมง</div>
<?php
    break;
    case "approved":
?>
<hr></hr>
<div>ทางเจ้าของร้านได้ทำการตรวจสอบการโอนเงินของท่านแล้ว</div>
<div>ทางเราจะรีบจัดส่งสินค้าให้กับท่านภายใน 1-24 ชั่วโมงและจะแจ้งรายละเอียดต่างๆให้ท่านทราบตลอด</div>
<div>ขอบคุณที่เลือกสินค้าจากเรา</div>
<?php
    break;
    case "sendinvoice":
?>
      <table style="width:100%;">
        <tr>
          <td style="width:70%;padding:5px;background-color:#141414;color:#FFF;">ชื่อสินค้า</td>
          <td style="width:30%;padding:5px;text-align:right;background-color:#141414;color:#FFF;">ราคา</td>
        </tr>
        <?php
          $sum = "";
          $invoice = $mydb->runQuery("SELECT * FROM shop_order WHERE order_invoice = '".$invoice."'");
          while($invoice_row = mysqli_fetch_assoc($invoice)){

          $shop_data = $mydb->runQuery("SELECT * FROM shop_data WHERE shop_did = '".$invoice_row['shop_did']."'");
          $shop_row = mysqli_fetch_assoc($shop_data);
          $sum += $shop_row['shop_price'];
        ?>
        <tr>
          <td style="background-color:#F9F9F9;padding:5px;border-right:1px dashed #CCC;"><?php echo $shop_row['shop_name']?></td>
          <td style="background-color:#F9F9F9;text-align:right;padding:5px;"><?php echo number_format($shop_row['shop_price'],2);?> ฿</td>
        </tr>
          <?php } ?>
        <tr>
          <td style="width:70%;text-align:right;background-color:#E4E4E4;">รวมเป็นเงิน</td>
          <td style="width:30%;text-align:right;background-color:#E4E4E4;"><?php echo number_format($sum,2);?> ฿</td>
        </tr>
      </table>
<?php 
  break;
} 
?>
  </div>
</body>
</html>
