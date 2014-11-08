<?php
	session_start();
	include "include/check_session_out.php";
	include "include/functions.php";
	$id=$_SESSION['id'];
	if(isset($_GET['id']))
		$id=$_GET['id'];
	$sql="select * from account where id='$id'";
	$account=getdb($sql);
	$sql="select * from profile where id='$id'";
	$profile=getdb($sql);
	include "include/header.php";
?>
<script type="text/javascript">
	function validate()
	{
		
		if(document.getElementById('pic').value.length!=0)
		{
			var fname=document.getElementById('pic').value;
			var ext='',i;
			for(i=fname.length-1;fname[i]!='.';i--)
				ext=fname[i]+ext;
			ext=ext.toLowerCase();
			if(ext!='jpg' && ext!='jpeg' && ext!='gif' && ext!='png' && ext!='bmp')
			{
				alert("Please select a valid image file..!!");
				return false;
			}
		}
		return true;
	}
</script>
<div>
	<?php
		include "include/tab.php";
		include "include/left.php";
	?>	
	<div align="center">
		<h2>Edit Profile</h2>
		<table cellspacing="0" width="80%">
			<tr style="background:#cccccc;height:35px;">
				<th width="30%" align="left">Name</th>
				<th>:</th>
				<td><?php echo $profile[0]['name']; ?></td>
			</tr>
			<tr style="background:#aaaaaa;height:35px;">
				<th align="left">Phone Number</th>
				<th>:</th>
				<td><?php echo $profile[0]['phone']; ?></td>
			</tr>
			<tr style="background:#cccccc;height:35px;">
				<th align="left">Place</th>
				<th>:</th>
				<td><?php echo $profile[0]['place']; ?></td>
			</tr>
			<tr style="background:#aaaaaa;height:35px;">
				<th align="left">Gender</th>
				<th>:</th>
				<td><?php echo $profile[0]['gender']; ?></td>
			</tr>
			<tr style="background:#cccccc;height:35px;">
				<th align="left">Date of Birth</th>
				<th>:</th>
				<td><?php echo $profile[0]['dob']; ?></td>
			</tr>
			<tr style="background:#aaaaaa;height:35px;">
				<th valign="top" align="left">Interests</th>
				<th valign="top">:</th>
				<td><?php echo str_replace("\n","<br>",$profile[0]['interest']); ?></td>
			</tr>
			<tr style="background:#cccccc;height:35px;">
				<th valign="top" align="left">Ambition</th>
				<th valign="top">:</th>
				<td><?php echo str_replace("\n","<br>",$profile[0]['ambition']); ?></td>
			</tr>
			<tr style="background:#aaaaaa;height:35px;">
				<th valign="top" align="left">Talents</th>
				<th valign="top">:</th>
				<td><?php echo str_replace("\n","<br>",$profile[0]['talents']); ?></td>
			</tr>
			<tr style="background:#cccccc;height:35px;">
				<th valign="top" align="left">Activities</th>
				<th valign="top">:</th>
				<td><?php echo str_replace("\n","<br>",$profile[0]['activities']); ?></td>
			</tr>
		</table>
	</div>
	<?php
		include "include/right.php";
	?>
</div>
<?php
	include "include/footer.php";
?>