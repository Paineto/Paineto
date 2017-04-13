<?php
    if (isset($_SESSION['permission'])){
    	$USERNAME=$_SESSION['fullname'] ;
	    $PASSWORD=$_SESSION['password'] ;

        $CheckSecurity = new auth();
        $check = $CheckSecurity->page_check($USERNAME, $PASSWORD);
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
