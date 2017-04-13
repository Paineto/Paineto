<?
	session_start();
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
 
	$_SESSION['fullname'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	//$_SESSION['permission']= "admin";	
	$username =  $_SESSION['fullname'];
	$password =  $_SESSION['password'];

	$Auth = new auth();
	$detail = $Auth->authenticate($username, $password);
	
	if ($detail==0){ 
		include ('site.header.php');
		echo "<div><img src='../my/images/loading_wh.gif' ></div>";
		header('Refresh: 2; URL='.$failure);
		include ('site.footer.php');
	}
	elseif ($detail['team'] == 1 ) {
		$_SESSION['permission']= "admin";
		include ('site.header.php');
		echo "<div><img src='../my/images/loading_wh.gif' ></div>";
		header('Refresh: 2; URL='.$admin);
		include ('site.footer.php');
	}
	else 
	{
	$_SESSION['permission'] = 'user';
	include ('site.header.php');
	echo "<div><img src='../my/images/loading_wh.gif' ></div>";
	header('Refresh: 2; URL='.$success);
	include ('site.footer.php');
	}
?>
