	<link rel="stylesheet" type="text/css" href="style.css">
<?php 
if (isset($_POST['sub'])) {
	$num = (int) ($_POST['num']);	

	$h2 = ' class="h2"';

	function convertToMinutes($seconds)
	{
		$sec = $seconds % 60;

		$h = ($seconds >= 3600 && function_exists('intdiv')) ?	$h = intdiv($seconds, 3600) :	$h = number_format($seconds / 3600);
				
		$min = (function_exists('intdiv')) ?	$min = intdiv($seconds, 60) :	$min = ($seconds - $sec) / 60;
			
				if ($h >= 1) {
							$min = $min % 60;
				}

		$h = ($h < 9) ? '0' . $h : $h;
		$min = ($min < 10) ? '0' . $min : $min;
		$sec = ($sec < 10) ? '0'.$sec : $sec;
			return "H $h: M $min: S $sec";
	
	}
	echo "<h2$h2>" .convertToMinutes($num) . '</h2>';
} else {
	$h = 0;
	$min = 0;
	$sec = 0;
}
?>

<form action="index.php" method="post" class="form">
		<input placeholder="input number" type="text" name="num" id="put">
		<input type="submit" name="sub">
</form>