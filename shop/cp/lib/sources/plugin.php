<div class="contain">
<?php
@$src = $_GET['src'];
@$op = $_GET['op'];
@$install = $_GET['install'];
@$disable = $_GET['disable'];
@$enable = $_GET['enable'];

if($install){
	$xml = simplexml_load_file("plugin/".$install."/info.xml") or die("Error: Cannot create object");
	$query = $mysqli->query("INSERT INTO plugin (name,enable,pos) VALUES ('".$install."','1','".$xml->info->item->position."')");
	if($query){
		echo "ทำการติดตั้ง ปลั้กอินสำเร็จ";
	}
} else if($disable){
	$query = $mysqli->query("UPDATE plugin SET enable = '0' WHERE name = '".$disable."'");
	if($query){
		echo "ปิด Plugin " . $disable . " แล้ว";
	}
} else if($enable){
	$query = $mysqli->query("UPDATE plugin SET enable = '1' WHERE name = '".$enable."'");
	if($query){
		echo "เปิด Plugin " . $enable . " แล้ว";
	}
} else {
if($src){
	$xml = simplexml_load_file("plugin/".$src."/info.xml") or die("Error: Cannot create object");
	$loc = "plugin/".$src."/menu.php";
	if(file_exists($loc)){
		require($loc);
		
		foreach($nav_menu[$src] as $key => $value){		
		echo "<a href='?sec=".$sec."&insub=plugin&src=".$src."&op=" . $key ."'>". $value . "</a> ";	
		}
		echo "<div style='margin-bottom:10px;'></div>";
		
		if($op == ""){
			require($insub_menu['']);
		} else {
			require($insub_menu[$op]);
		}
		
	} else {
		echo $xml->info->item->name;
	}
} else {
if ($handle = opendir('plugin')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			$xml = simplexml_load_file("plugin/".$entry."/info.xml") or die("Error: Cannot create object");
			$plugin = $mysqli->query("SELECT * FROM plugin WHERE name = '".$entry."'");
			$plugin_result = $plugin->fetch_assoc();
?>
	<div class="media">
      <a class="media-left" href="#">
        <img data-holder-rendered="true" src="<?php echo $xml->info->item->image?>" style="width: 64px; height: 64px;">
      </a>
      <div class="media-body">
        <div><h4 class="media-heading"><?php echo $xml->info->item->name?></h4></div>
        <span><?php echo $xml->info->item->description?></span>
		<div>[ <a href="?sec=plugin&insub=plugin&src=<?php echo $entry?>">ปรับแต่ง</a> ] [ <?php if(!$plugin_result){echo "<a href='?sec=plugin&insub=plugin&install=".$entry."'>ติดตั้ง</a>";} else { if($plugin_result['enable']) { echo "<a href='?sec=plugin&insub=plugin&disable=".$entry."'>ปิด</a>";} else { echo "<a href='?sec=plugin&insub=plugin&enable=".$entry."'>เปิด</a>";}}?> ]</div>
      </div>
    </div>
<?php
		}
	}
	closedir($handle);
}
}
}
?> 
</div>