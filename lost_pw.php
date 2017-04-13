<?
	include "site.header.php";
	include_once ("authconfig.php");
    include("inc/auth.php");
    $email_address=$_POST['email_address'];
	if(!$email_address){
		header("Location: ../my/forgot.php?view=1");	
		exit;
    }
	//check to see if record exists	
	$auth= new auth();
	$auth->connect();
	$result = $auth->display($email_address,'email');
	$rows = mysql_num_rows($result);
	if($rows == 0){
		header("Location: ../my/forgot.php?view=2");	
		exit;	
	}
	// generate password, 
	function makeRandomPassword() {
  		$salt = "abchefghjkmnpqrstuvwxyz0123456789";
  		srand((double)microtime()*1000000); 
	  	$i = 0;
		$pass='';
	  	while ($i <= 7) {
	    		$num = rand() % 33;
	    		$tmp = substr($salt, $num, 1);
	    		$pass = $pass . $tmp;
	    		$i++;
	  	}
	  	return $pass;
	}

	$random_password = makeRandomPassword();
	$db_password = md5($random_password);
	$sql = mysql_query("UPDATE people SET passwd='$db_password' WHERE email='$email_address'");

	$subject = "<div class='title'>Your Password at our website!</div><br>";
	$message = "Hi, we have reset your password.<br>
	New Password:<b class='red'> $random_password</b><br>
	You can follow this link to Login<br>
	http://www.maarouf.com/login.php<br>
	Thanks!
	This is an automated response, please do not reply!";
	echo $subject."<br><br>";
	echo "Email: ".$email_address."<br><br>";
	echo $message."<br><br><br><br>";
	
	//mail($email_address, $subject, $message, "From: MyDomain Webmaster<admin@website.com>);
	
	echo "<b>Your password has been sent! Please check your email!<br /></b>";
	
	include ('site.footer.php');
?>
