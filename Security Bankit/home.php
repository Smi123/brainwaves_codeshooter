<?php
	session_start();
	include "include/check_session_out.php";
	include "include/functions.php";
	$id=$_SESSION['id'];
	if(isset($_POST['accept']))
	{
		$sql="update friend_request set status='1' where id='".$_POST['request_id']."'";
		updatedb($sql);
	}
	if(isset($_POST['reject']))
	{
		$sql="delete from friend_request where id='".$_POST['request_id']."'";
		updatedb($sql);
	}
	$sql="select * from account where id='$id'";
	$account=getdb($sql);
	$sql="select * from profile where id='$id'";
	$profile=getdb($sql);
	$sql="select * from wall where to_id<>'$id' and (by_id in (select from_id from friend_request where status='1' and to_id='$id') or by_id in (select to_id from friend_request where status='1' and from_id='$id'))order by id desc";
	$wall=getdb($sql);
	$sql="select * from friend_request where status='0' and to_id='$id'";
	$active_friend_request=getdb($sql);
	include "include/header.php";
?>
<div>
	<?php
		include "include/tab.php";
		include "include/left.php";
	?>	
	<div>
		<h1>Hi., <?php echo $profile[0]['name']; ?></h1>
		<?php
			for($i=0;$i<count($active_friend_request);$i++)
			{
				$sql="select * from profile where id='".$active_friend_request[$i]['from_id']."'";
				$request_profile=getdb($sql);
				?>
				<hr>
				<table width="100%">
					<tr>
						<th width="20%" valign="top">
							<img src="<?php echo $request_profile[0]['photo'] ?>" width="100px" height="100px">
							<br>
							<?php echo $request_profile[0]['name']; ?>
						</th>
						<th valign="top" width="80%">
							<div>
								<form method="post">
									<input type="hidden" name="request_id" value="<?php echo $active_friend_request[$i]['id']; ?>">
									<input type="submit" name="accept" value="Accept" class="btn">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="submit" name="reject" value="Reject" class="btn">
								</form>
							</div>
						</th>
					</tr>
				</table>
				<?php
			}
		?>
		<?php
			for($i=0;$i<count($wall);$i++)
			{
				$sql="select * from profile where id='".$wall[$i]['by_id']."'";
				$wall_profile=getdb($sql);
				$sql="select * from profile where id='".$wall[$i]['to_id']."'";
				$to_wall_profile=getdb($sql);
				?>
				<hr>
				<table width="100%">
					<tr>
						<th width="20%" valign="top">
							<img style="cursor:pointer" onclick="location='wall.php?id=<?php echo $wall_profile[0]['id']; ?>';" src="<?php echo $wall_profile[0]['photo'] ?>" width="100px" height="100px">
							<br>
							<?php echo $wall_profile[0]['name']; ?>
						</th>
						<th valign="top" width="80%">
						<?php
							if($wall[$i]['by_id']!=$wall[$i]['to_id'])
							{
								?>
								<h4 style="cursor:pointer" onclick="location='wall.php?id=<?php echo $to_wall_profile[0]['id']; ?>';" align="left">Posted on <?php echo $to_wall_profile[0]['name']; ?>'s Wall</h4>
								<?php
							}
						?>
							<div>
								<?php
									if($wall[$i]['post']!="")
									{
										?>
										<div align="left">
											<?php
												echo str_replace("\n","<br>",$wall[$i]['post']);
											?>
										</div>
										<?php
									}
								?>
								<?php
									if($wall[$i]['img_url']!="")
									{
										?>
										<div>
											<img src="<?php echo $wall[$i]['img_url']; ?>" width="90%" height="200px">
										</div>
										<?php
									}
								?>
							</div>
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