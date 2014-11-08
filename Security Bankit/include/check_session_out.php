<?php
	if(!isset($_SESSION['id']))
	{
		?>
		<script type="text/javascript">
			location="index.php";
		</script>
		<?php
		exit;
	}
?>