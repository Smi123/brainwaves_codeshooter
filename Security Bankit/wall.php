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
	if(isset($_GET['op']) && $_GET['op']=="remove" && isset($_GET['fr']) && isset($_GET['to']))
	{
		$sql="select * from friend_request where (from_id='".$_GET['fr']."' and to_id='".$_GET['to']."') or (from_id='".$_GET['to']."' and to_id='".$_GET['fr']."')";
		$req=getdb($sql);
		$sql="delete from friend_request where id='".$req[0]['id']."'";
		updatedb($sql);
		?>
		<script type="text/javascript">
			location="wall.php?id=<?php echo $_GET['id']; ?>";
		</script>
		<?php
		exit;
	}
	if(isset($_GET['fr']) && isset($_GET['to']))
	{
		$sql="insert into friend_request values('','".$_GET['fr']."','".$_GET['to']."','0')";
		updatedb($sql);
		?>
		<script type="text/javascript">
			location="wall.php?id=<?php echo $_GET['id']; ?>";
		</script>
		<?php
		exit;
	}
	if(isset($_POST['post']))
	{
		$photo="";
		if(isset($_FILES['post_photo']['name']) && $_FILES['post_photo']['name']!="")
			$photo=$_FILES['post_photo']['name'];
		$text="";
		if(isset($_POST['post_text']) && $_POST['post_text']!="")
			$text=$_POST['post_text'];
		$by_id=$_SESSION['id'];
		$to_id=$_SESSION['id'];
		if(isset($_GET['id']))
			$to_id=$_GET['id'];
		$filename="";
		if($photo!="")
		{
			$ext="";
			$ext=get_extention($photo);
			$filename="wall_pic/".time().".".$ext;
			upload_file($_FILES['post_photo'],$filename);
		}
		$sql="insert into wall values('','$by_id','$to_id','$text','$filename')";
		updatedb($sql);
	}
	$sql="select * from wall where to_id='$id' order by id desc";
	$wall=getdb($sql);
	include "include/header.php";
?>
<script type="text/javascript">
	function validate()
	{
		if(document.getElementById('post_text').value.length==0 && document.getElementById('post_photo').value.length==0)
			return false;
		if(document.getElementById('post_photo').value.length!=0)
		{
			var fname=document.getElementById('post_photo').value;
			var ext='',i;
			for(i=fname.length-1;fname[i]!='.';i--)
				ext=fname[i]+ext;
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
	<div>
		<h1><?php echo $profile[0]['name']; ?></h1>
		<form enctype="multipart/form-data" method="post">
			<center>
				<fieldset>
					<legend><h3>Write on <?php echo $profile[0]['name']; ?>'s Wall</h3></legend>
					<table width="100%">
						<tr>
							<th valign="top">
								<textarea id="post_text" name="post_text" cols="30" rows="5"></textarea>
							</th>
							<th valign="top">
								<h2>Upload Photo</h2>
								<input id="post_photo" type="file" name="post_photo" class="btn">
							</th>
						</tr>
					</table>
					<input onclick="return validate()" class="btn" type="submit" name="post" value="Post on <?php echo $profile[0]['name']; ?>'s Wall">
				</fieldset>
			</center>
		</form>
		<?php
			for($i=0;$i<count($wall);$i++)
			{
				$sql="select * from profile where id='".$wall[$i]['by_id']."'";
				$wall_profile=getdb($sql);
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