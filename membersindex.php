<?php 
	include "site.header.php";
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
	include_once ("check.php");	
?>
	<p><font face="Arial, Helvetica, sans-serif" size="5"><b>User Profile</b></font></p>
		<table  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
		  <tr bgcolor="#1CA8E9"> 
			<td colspan="2"> 
			  <div align="center"><font color="#FFFFCC"><b><font face="Arial, Helvetica, sans-serif" size="3">Results</font>
			  </b></font></div>
			</td>
		  </tr>
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">ID</font></b></td>
			<td align="left" width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["id"] ?></font></td>
		  </tr>		  
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">fullname</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? echo $check["fullname"] ?></font></td>
		  </tr>
		  <tr>
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Company</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["Company"] ?></font></td>
			 </tr>
		  <tr>	 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Address</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["Address"] ?></font></td>
		  </tr>
		  <tr>	 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Phone</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["Phone"] ?></font></td>
		  </tr>
		  </tr>
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">date of birth</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["dateofbirth"] ?></font></td>
		  </tr>
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">email</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["email"] ?></font></td>
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Username</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["uname"] ?></font></td>
		  </tr>
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Password</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <?=$_SESSION['password']?> &nbsp;&nbsp;<a href="<? echo $changepassword; ?>">Change</a></font></td>
		  </tr>
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Team</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["team"] ?></font></td>
		  </tr>
		  <tr> 
			<td width="16%" bgcolor="#CFD6DE"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Status</font></b></td>
			<td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check["status"] ?></font></td>
		  </tr>
		</table>
<?php 
	include "site.footer.php" 
?>