<script> function cartClear(){
		localStorage.clear();
}</script>


<?php
	require 'frontendfooter.php';
	echo"<script type='text/javascript'>
				
						cartClear();
			
		</script>";
	session_start();
	session_destroy();
	
header('location:login.php');
?>



