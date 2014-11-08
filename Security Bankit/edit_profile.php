<?php
	session_start();
	include "include/check_session_out.php";
	include "include/functions.php";
	$id=$_SESSION['id'];
	$sql="select * from account where id='$id'";
	$account=getdb($sql);
	$sql="select * from profile where id='$id'";
	$profile=getdb($sql);
	if(isset($_POST['save']))
	{
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$place=$_POST['place'];
		$phone=$_POST['phone'];
		$dob=$_POST['dob'];
		$interest=$_POST['interests'];
		$ambition=$_POST['ambition'];
		$talent=$_POST['talents'];
		$activities=$_POST['activities'];
		$photo=$_FILES['pic']['name'];
		$filename=$profile[0]['photo'];
		if($photo!="")
		{
			$ext="";
			$ext=get_extention($photo);
			if($filename=="profile_pic/male.png" || $filename=="profile_pic/female.png")
				$filename="profile_pic/".time().".".$ext;
			upload_file($_FILES['pic'],$filename);
		}
		$sql="update profile set name='$name',gender='$gender',phone='$phone',dob='$dob',place='$place',interest='$interest',ambition='$ambition',talents='$talent',activities='$activities',photo='$filename' where id='$id'";
		updatedb($sql);
		?>
		<script type="text/javascript">
			location="profile.php";
		</script>
		<?php
		exit;
	}
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
		<form method="post" enctype="multipart/form-data">
			<table width="80%">
				<tr>
					<th align="left">Name</th>
					<th align="left">:</th>
					<td><input value="<?php echo $profile[0]['name']; ?>" type="text" class="txt" placeholder="Enter your Name" required="required" name="name" size="30"></td>
				</tr>
				<tr>
					<th align="left">Phone Number</th>
					<th>:</th>
					<td><input value="<?php echo $profile[0]['phone']; ?>" type="text" class="txt" placeholder="Enter your Phone Number" name="phone" size="30"></td>
				</tr>
				<tr>
					<th align="left">Place</th>
					<th>:</th>
					<td><input value="<?php echo $profile[0]['place']; ?>" type="text" class="txt" placeholder="Enter your Place" required="required" name="place" size="30"></td>
				</tr>
				<tr>
					<th align="left">Gender</th>
					<th>:</th>
					<td>
						<label class="txt"><input name="gender" <?php if($profile[0]['gender']=="Male") { ?>checked="checked" <?php } ?> type="radio" value="Male">Male</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="txt"><input name="gender" <?php if($profile[0]['gender']=="Female") { ?>checked="checked" <?php } ?> type="radio" value="Female">Female</label>
					</td>
				</tr>
				<tr>
					<th align="left">Date of Birth</th>
					<th>:</th>
					<td><input value="<?php echo $profile[0]['dob']; ?>" type="text" class="txt" placeholder="Enter your Date of Birth" required="required" name="dob" size="30"></td>
				</tr>
				<tr>
					<th valign="top" align="left">Interests</th>
					<th valign="top" align="left">:</th>
					<td><textarea cols="30" rows="5" class="txt" placeholder="Interests" name="interests"><?php echo str_replace("\n","<br>",$profile[0]['interest']); ?></textarea></td>
				</tr>
				<tr>
					<th valign="top" align="left">Ambition</th>
					<th valign="top" align="left">:</th>
					<td><textarea cols="30" rows="5" class="txt" placeholder="Ambition" name="ambition"><?php echo str_replace("\n","<br>",$profile[0]['ambition']); ?></textarea></td>
				</tr>
				<tr>
					<th valign="top" align="left">Talents</th>
					<th valign="top" align="left">:</th>
					<td><textarea cols="30" rows="5" class="txt" placeholder="Talents" name="talents"><?php echo str_replace("\n","<br>",$profile[0]['talents']); ?></textarea></td>
				</tr>
				<tr>
					<th valign="top" align="left">Activities</th>
					<th valign="top" align="left">:</th>
					<td><textarea cols="30" rows="5" class="txt" placeholder="Activities" name="activities"><?php echo str_replace("\n","<br>",$profile[0]['activities']); ?></textarea></td>
				</tr>
				<tr>
					<th align="left">Change Profile Image</th>
					<th>:</th>
					<td><input type="file" name="pic" class="btn"></td>
				</tr>
			</table>
			<input type="submit" value="Save" class="btn" name="save">
		</form>
	</div>
	<?php
		include "include/right.php";
	?>
</div>
<?php
	include "include/footer.php";
?>