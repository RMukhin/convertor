	<link rel="stylesheet" type="text/css" href="style.css">
<?php 
	if (isset($_POST['sub'])) {
		$num = (int) ($_POST['num']);	

		$h2 = ' class="h2"';

		function convertor($seconds)	{

			define('SEC_IN_HOUR', 3600);
			define('SEC_IN_MIN', 60);

			$sec = $seconds % SEC_IN_MIN;

			$h = ($seconds >= SEC_IN_HOUR && function_exists('intdiv')) ?	$h = intdiv($seconds, SEC_IN_HOUR) :	$h = number_format($seconds / SEC_IN_HOUR);
					
			$min = (function_exists('intdiv')) ?	$min = intdiv($seconds, SEC_IN_MIN) :	$min = ($seconds - $sec) / SEC_IN_MIN;
				
					if ($h >= 1) {
						$min = $min % SEC_IN_MIN;
					}

			$h = ($h < 9) ? '0' . $h : $h;
			$min = ($min < 10) ? '0' . $min : $min;
			$sec = ($sec < 10) ? '0'.$sec : $sec;
				return "H $h : M $min : S $sec";
		
		}
} else {
	$h = 0;
	$min = 0;
	$sec = 0;
}
		echo "<h2$h2>" .convertor($num) . '</h2>';
?>

<form action="index.php" method="post" class="form">
		<input placeholder="input number" type="text" name="num" id="put">
		<input type="submit" name="sub">
</form>