<?php
	include "site.header.php";
	session_unset();
?>
	<table>
		<tr>
			<TD  valign="top" align="center">
			<p><b>Login Results</b></p>
			The username and password do not match the ones in the database.
			<p>Please go back and login again.</p>
			<a href="myaccount.php">Return to logon screen</a>
			</TD>
		</tr>	
	</table>
<?php 
	include "site.footer.php";
?>