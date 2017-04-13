<?php
    if (isset($_SESSION['permission'])){

        $CheckSecurity = new auth();
        $check2 = $CheckSecurity->user_check($_GET['id']);
	}
	else{
		print "<b>Access Denied!<br></b>";
		print "<b>You have to login to view this page.<br></b></font>";
		// GO TO LOGIN PAGE
        print "You will be redirected back to the login page in a short while.</font>";
		header('Refresh: 2; URL=myaccount.php');
		include('site.footer.php');
		exit;
    } 
?>
