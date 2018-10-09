	<link rel="stylesheet" type="text/css" href="style.css">
<?php 
	if (isset($_POST['sub'])) {
		$num = (int) abs(strip_tags(($_POST['num'])));	

		$window = ' class="window"';

				
		function conva($seconds)	{
			$sec = 0;
			define('SEC_IN_HOUR', 3600);
			define('SEC_IN_MIN', 60);

			$sec = $seconds % SEC_IN_MIN;

			$h = ($seconds >= SEC_IN_HOUR && function_exists('intdiv')) ? intdiv($seconds, SEC_IN_HOUR) :	(int) ($seconds / SEC_IN_HOUR);
					
			$min = (function_exists('intdiv')) ? intdiv($seconds, SEC_IN_MIN) : (int) $seconds / SEC_IN_MIN;
				
					if ($h >= 1) {
						$min %= SEC_IN_MIN;
					}

			$h = ($h < 10) ? '0' . $h : $h;
			$min = ($min < 10) ? '0' . $min : $min;
			$sec = ($sec < 10) ? '0'.$sec : $sec;
				return "H $h : M $min : S $sec";
		}
				if ($num > 359999) {
					echo "<h1$window>Too big to fall</h1>";
				} else {
					echo "<h2$window>" . conva($num) . '</h2>';
				}

} else {
					$h = 0;
					$min = 0;
					$sec = 0;
}?>
<form action="index.php" method="post" class="form">
		<input placeholder="input number" type="text" name="num" maxlength="6">
		<input type="submit" name="sub">
</form>
