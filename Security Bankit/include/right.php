		</td>
		<td valign="top" style="border-left-style:solid;border-color:rgb(154,154,154)" width="20%">
			<div>
				<table width="100%">
					<tr>
						<th>Friends</th>
					</tr>
					<?php
						$sql="select * from friend_request where (from_id='$id' or to_id='$id') and status='1'";
						$friends=getdb($sql);
						for($i=0;$i<count($friends);$i++)
						{
							$sql="select * from profile where id in ('".$friends[$i]['from_id']."','".$friends[$i]['to_id']."') and id <> '$id'";
							$friend_profile=getdb($sql);
							?>
							<tr onclick="location='wall.php?id=<?php echo $friend_profile[0]['id']; ?>';" height="35px" style="<?php if($i%2==0) { ?>background:#aaaaaa;<?php } else { ?>background:#cccccc;<?php }?>cursor:pointer;">
								<td><b><?php echo $friend_profile[0]['name']; ?></b></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
		</td>
	</tr>
</table>