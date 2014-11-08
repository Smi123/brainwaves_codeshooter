<?php
	if(isset($_SESSION['id']))
	{
		?>
		<script type="text/javascript">
			location="home.php";
		</script>
		<?php
		exit;
	}
?>