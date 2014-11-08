<table cellspacing="0" style="border-left-style:solid;border-right-style:solid;border-top-style:solid;border-bottom-style:solid;border-color:rgb(154,154,154)" height="450px" width="100%">
		<tr>
			<td valign="top" style="border-right-style:solid;border-color:rgb(154,154,154);" width="20%">
				<div>
					<table width="100%">
						<tr>
							<th>
								<img src="<?php echo $profile[0]['photo'] ?>" height="200px" width="100%">
							</th>
						</tr>
						<tr onclick="location='wall.php<?php if(isset($_GET['id'])) { ?>?id=<?php echo $_GET['id']; } ?>';" style="background:#cccccc;cursor:pointer;" height="35px">
							<td width="100%"><b>Wall</b></td>
						</tr>
						<tr onclick="location='profile.php<?php if(isset($_GET['id'])) { ?>?id=<?php echo $_GET['id']; } ?>';" style="background:#aaaaaa;cursor:pointer;" height="35px">
							<td><b>Profile</b></td>
						</tr>
						<?php
							if(!isset($_GET['id']) || $_GET['id']==$_SESSION['id'])
							{
								?>
								<tr onclick="location='edit_profile.php';" style="background:#cccccc;cursor:pointer;" height="35px">
									<td><b>Edit Profile</b></td>
								</tr>								
								<?php
							}
						?>
						<?php
							if(isset($_GET['id']) && $_GET['id']!=$_SESSION['id'])
							{
								$sql="select * from friend_request where (from_id='".$_SESSION['id']."' and to_id='".$_GET['id']."') or (to_id='".$_SESSION['id']."' and from_id='".$_GET['id']."')";
								$srch_request=getdb($sql);
								if(count($srch_request)<=0)
								{
									?>
									<tr onclick="location='?fr=<?php echo $_SESSION['id']; ?>&to=<?php echo $_GET['id']; ?>&id=<?php echo $_GET['id']; ?>';" style="background:#cccccc;cursor:pointer;" height="35px">
										<td><b>Send Friend Request</b></td>
									</tr>								
									<?php
								}
								else if($srch_request[0]['status']=="1")
								{
									?>
									<tr onclick="location='?op=remove&fr=<?php echo $_SESSION['id']; ?>&to=<?php echo $_GET['id']; ?>&id=<?php echo $_GET['id']; ?>';" style="background:#cccccc;cursor:pointer;" height="35px">
										<td><b>Remove from Friend List</b></td>
									</tr>								
									<?php
								}
								else
								{
									?>
									<tr style="background:#cccccc;cursor:pointer;" height="35px">
										<td><b>Friend Request sent</b></td>
									</tr>								
									<?php
								}
							}
						?>
					</table>
				</div>
			</td>
			<td valign="top" width="60%">