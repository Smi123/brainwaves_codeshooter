<?php
	session_start();
	if(isset($_SESSION['id']))
		unset($_SESSION['id']);
?>
<script type="text/javascript">
	location="index.php";
</script>