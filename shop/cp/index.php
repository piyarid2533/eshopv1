<!DOCTYPE html>
<?php 
	session_start();
	date_default_timezone_set('Asia/Bangkok'); 
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Administrator Control Panel</title>

<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
</head>

<body>
<?php 
	include_once "../lib/webconfig.php";
	include_once "../func/database.class.php";
	include_once "../func/function.class.php";

	$func = new Func();
	$mydb = new Database();
	
	if(@$_SESSION['Admin']){
	require("lib/section.php");
	require("lib/section-div.php");
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Administrator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<?php 
			for($i=0;$i<=count($menu)-1;$i++){
			?>
				<li><a href="?sec=<?php echo $menu_sec[$i]?>"><?php echo $menu[$i]?></a></li>
			<?php
			}
			?>
			<li><a href="?sec=logout">ล็อกเอ้า</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		<span><h2>Menu</h2></span>
          <ul class="nav nav-sidebar">
		  	<?php 
				@$sec = $_GET['sec'];
				if($sec == ""){
					
				} else {
					if($sec == "logout"){
						echo "<meta http-equiv='refresh' content='0; url=index.php' />";
						session_destroy();
					} else {
						foreach($sub_menu[$sec] as $key => $value){		
							echo "<li><a href='?sec=".$sec."&insub=" . $key ."'>". $value . "</a></li>";
						}
					}
				}
			?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php
			@$insub = $_GET['insub'];
			if($sec == ""){
				@include("lib/sources/dashboard.php");
			} else {
				if($insub == ""){
					echo "test";
				} else {
					@include($insub_menu[$insub]);
				}
			}
		?>
        </div>
      </div>
    </div>
	<?php } else {?>
	 <div class="container">
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Administrator Login</h2>
        <input type="email" class="form-control" id="user">
        <input type="password" class="form-control" id="pass" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="DoLogin(); return false">Sign in</button>
      </form>
    </div>
	<?php } ?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	
</body>
</html>