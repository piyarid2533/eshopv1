<?php
function count_time($date)
{
	if(empty($date)) {
		return "No date provided";
	}
	 
		$periods = array("sec", "min", "hr", "day", "week", "mounth", "Y", "decade");
		$lengths = array("60","60","24","7","4.35","12","10");
		 
		$now = time();
		$unix_date = strtotime($date);
	 
	// check validity of date
	if(empty($unix_date)) {
		return "Bad date";
	}
	 
	// is it future date or past date
	if($now > $unix_date) {
		$difference = $now - $unix_date;
		$tense = "ago";
	 
	} else {
		$difference = $unix_date - $now;
		$tense = "from now";
	}
	 
	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		$difference /= $lengths[$j];
	}
	 
		$difference = round($difference);
	 
	if($difference != 1) {
		$periods[$j].= "s";
	}
	 
	return "$difference $periods[$j] {$tense}";
}
function protect_hack($text)
{
	return htmlspecialchars($text);
}
function cutStr($str, $maxChars='', $holder=''){
	if (strlen($str) > $maxChars ){
			$str = iconv_substr($str, 0, $maxChars,"UTF-8") . $holder;
	} 
	return $str;
} 
?>
