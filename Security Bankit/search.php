<?php
	session_start();
	include "include/check_session_out.php";
	include "include/functions.php";
	$id=$_SESSION['id'];
	$sql="select * from account where id='$id'";
	$account=getdb($sql);
	$sql="select * from profile where id='$id'";
	$profile=getdb($sql);
	$sql="select * from profile where name like '%".$_POST['srch_name']."%'";
	$search=getdb($sql);
	include "include/header.php";
?>
<div>
	<?php
		include "include/tab.php";
		include "include/left.php";
	?>	
	<div align="left">
		<?php
			for($i=0;$i<count($search);$i++)
			{
				$sql="select * from profile where id='".$search[$i]['id']."'";
				$search_profile=getdb($sql);
				?>
				<hr>
				<table style="cursor:pointer;" onclick="location='wall.php?id=<?php echo $search_profile[0]['id']; ?>'" width="100%">
					<tr>
						<th width="20%" valign="top">
							<img src="<?php echo $search_profile[0]['photo']; ?>" width="100px" height="100px">
						</th>
						<th align="left" width="80%">
							Name : <?php echo $search_profile[0]['name']; ?>
						</th>
					</tr>
				</table>
				<?php
			}
		?>
	</div>
	<?php
		include "include/right.php";
	?>
</div>
<?php
	include "include/footer.php";
?>