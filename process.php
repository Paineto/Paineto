<?php
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
	
	$user = new auth();

	$fullname = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$Company = $_POST['Company'];
	$Phone = $_POST['Phone'];
	$Address = $_POST['Address'];
	$Dateofbirth = $_POST['Date'];
	$team = "2";
	$status = "Active";

	if((strpos($email,'@')==FALSE) or (strpos($email,'.')==FALSE)) {
		include ("site.header.php");
		echo "<div>";
		print "Invalid Email address, Would you like to <a href=\"signup.php\">Try again?</a></div>";
		include ("site.footer.php");
		echo"</div>";
		die();	
	} 
	$situation = $user->add_user ($fullname,$username, $password, $team, $status, $Company, $Phone,$email, $Address , $Dateofbirth);                            
	if ($situation == "blank username") {
		$message = "User field cannot be blank.";
	}
	elseif ($situation == "username exists") {
		$message = "Username already used! Please try again with a newone, or if you are trying to reach your previous account<br> <a href=\"contact.php\">contact us</a>!";
	}
	elseif ($situation == "blank password") {
		$message = "Password field cannot be blank!";
		}
	elseif ($situation == 1) {
		$message = "Added successfully!";
		}
	else {
		$message = "error";
	}
	include "site.header.php";
?>
	<div id="content">
		<h2>Registration Results</h2>
		<table border="0" cellpadding="5" cellspacing="0" style="width:400px"class="maincentre">
			<tr>
				<td><?print $message;?></td>
			</tr>
		<tr>
			<td><br><a href="signup.php">Go back</a></td>
		</tr>
		</table>
	</div>
<?php
	include "site.footer.php";
?>