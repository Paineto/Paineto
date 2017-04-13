<?
	include_once ("authconfig.php");
    include "site.header.php";
	session_unset ();
	session_destroy();
	header('Refresh: 5; URL=myaccount.php');
?>
	<table>	
		<TR>
			 <TD>
				<center>
					<p><b>You have successfully logged off.</b></p>
					<p><b>Click <a href="<? echo $login; ?>">here</a>&nbsp; to re-login, or wait 5 second.</b></p>
				</center>
			 </TD>
		</TR>
	</table>
<?php 
	include "site.footer.php"
?>