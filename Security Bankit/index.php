<?php
	session_start();
	include "include/check_session_in.php";
	include "include/functions.php";
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="select * from sign_up where email='$email' and password=PASSWORD('$password')";
		$account=getdb($sql);
		if(count($account)<=0)
		{
			?>
			<script type="text/javascript">
				alert("Email Id and Password didnot match..!!");
				location="index.php";
			</script>
			<?php
			exit;
		}
		if($account[0]['status']=="0")
		{
			?>
			<script type="text/javascript">
				alert("Your account has not been activated. Please follow the link sent through mail..!!");
				location="index.php";
			</script>
			<?php
			exit;
		}
		$_SESSION['id']=$account[0]['id'];
		?>
		<script type="text/javascript">
			location="main.php";
		</script>
		<?php
		exit;
	}
	if(isset($_POST['register']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		//$gender=$_POST['gender'];
		//if($gender=="Male")
		//	$photo="profile_pic/male.png";
		//else
			//$photo="profile_pic/female.png";
		$sql="insert into sign_up values('$name','$email',PASSWORD('$password'))";
		if(!updatedb($sql))
		{
			?>
			<script type="text/javascript">
				alert("Couldnot sign up. Please try again later..!!");
				location="index.php";
			</script>
			<?php
		}
		$sql="select * from sign_up where email='$email' and password=PASSWORD('$password')";
		$account=getdb($sql);
		//$sql="insert into profile values('".$account[0]['id']."','$name','','','$gender','','','','','','$photo')";
		//updatedb($sql);
		$sub="Thank You for registering in My Friend Circle";
		$msg="Please follow the link to activate your account\n\nhttp://127.0.0.1/Security%20Bankit/confirm.php?id=".$account[0]['id'];
		//mail($email,$sub,$msg,"FROM:My Friend Circle<no-reply@myfriendcircle.com>");
		?>
		<script type="text/javascript">
			alert("Account has been created. Please follow the link sent to your mail.");
			location="index.php";
		</script>
		<?php
		exit;
	}
	include "include/header.php";
?>
<div align="center">
	<hr>
	<br>
	<table width="100%">
		<tr>
			<th rowspan="2">
				<img src="images/circle.jpg" width="550px" height="400px">
			</th>
			<th valign="top">
				<h1 style="text-align:left;">Sign In</h1>
				<form method="post">
					<table>
						<tr>
							<th align="left">Email</th>
							<th>:</th>
							<th><input placeholder="Email ID" class="txt" autofocus="autofocus" type="text" required="required" pattern="[\w\-\.\+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}" name="email" size="30"></th>
						</tr>
						<tr>
							<th align="left">Password</th>
							<th>:</th>
							<th><input placeholder="Password" class="txt" type="password" required="required" name="password" size="30"></th>
						</tr>
						<tr>
							<th colspan="3">
								<input class="btn" type="submit" value="Login" name="login">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="btn" type="reset" value="Reset">
							</th>
						</tr>
					</table>
				</form>
			</th>
		</tr>
		<tr>
			<th>
				<h1 style="text-align:left;">Sign Up</h1>
				<form method="post">
					<table>
						<tr>
							<th align="left">Name</th>
							<th>:</th>
							<th><input placeholder="Name" class="txt" type="text" required="required" name="name" size="30"></th>
						</tr>
						<tr>
							<th align="left">Email</th>
							<th>:</th>
							<th><input placeholder="Email ID" class="txt" type="text" required="required" pattern="[\w\-\.\+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}" name="email" size="30"></th>
						</tr>
						<tr>
							<th align="left">Password</th>
							<th>:</th>
							<th><input placeholder="Password" class="txt" type="password" required="required" name="password" size="30"></th>
						</tr>
						<tr>
							<th align="left">Gender</th>
							<th>:</th>
							<th>
								<label class="txt"><input name="gender" checked="checked" type="radio" value="Male">Male</label>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="txt"><input name="gender" type="radio" value="Female">Female</label>
							</th>
						</tr>
						<tr>
							<th colspan="3">
								<input class="btn" type="submit" value="Register" name="register">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="btn" type="reset" value="Reset">
							</th>
						</tr>
					</table>
				</form>
			</th>
		</tr>
	</table>
	<br>
	<hr>
</div>
<?php
	include "include/footer.php";
?>