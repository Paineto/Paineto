<?php
	include "site.header.php";
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
	include_once ("check.php");
?>
	<p align="center"><b><font face="Arial">Change Password</font></b></p>
	<div id="content">
		<div class="contact_form">
			<div class="form_subtitle">Change Password</div>
			<form id ="password" method="POST" action="chgpwd.php">
				<p align="center">
					<strong>&nbsp; Old Password:</strong><br>
					<input type="password" name="oldpasswd"" size="50" />
				</p>
				<p align="center">
					<strong>&nbsp; New Password:</strong><br>
					<input id="lead" type="text" size="50" name="newpasswd" />
				</p>
				<p align="center">
					<strong>&nbsp; Confirm:</strong><br>
					<input type="password" name="confirmpasswd" size="25"></td>
				</p>
				<p align="center">
					<input type="submit" value="Save Changes" name="submit">
					<input type="reset" value="Reset Fields" name="reset">
				</p>
			</form>
		</div>
	</div>
<?php
	if (isset($_POST['submit'])){
		$USERNAME = $_SESSION['fullname'];
		$PASSWORD = $_SESSION['password'];
		$submit = $_POST['submit'];
		$oldpasswd = $_POST['oldpasswd'];
		$newpasswd = $_POST['newpasswd'];
		$confirmpasswd = $_POST['confirmpasswd'];
    }
	else
	{
		$submit = "";
	}
	$user = new auth();
	$connection = mysql_connect($dbhost, $dbusername, $dbpass);
	$SelectedDB = mysql_select_db($dbname);
	$userdata = mysql_query("SELECT * FROM people WHERE uname='$USERNAME' and passwd='$PASSWORD'");
	if ($submit)
	{
		// Check if Old password is the correct
		if ($oldpasswd != $PASSWORD)
		{
			print "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b>Old password is wrong!</b>";
		}		
		// Check if New password if blank
		else if (trim($newpasswd) == ""){
			print "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b>New password cannot be blank!</b>";
		}				
		// Check if New password is confirmed
		else if ($newpasswd != $confirmpasswd)
		{
			print "		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b><b>New password was not confirmed!</b>";
		}
		else{
		$update = $user->modify_password($USERNAME, $newpasswd, $check["team"], $check["level"], $check["status"], $check["id"]);
			print "	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b>Password Changed!</b><br>";
			print "		You will be required to re-login so that your session will recognize the new password. <BR>";
			print "		Click <a href=\"$logout\">here</a> to login again.";		
		}
	}	
	include "site.footer.php";
?>