<?php 

	if(!isset($_GET['view']))
		include "site.header.php";
	else{
		session_start();
		include_once ("inc/auth.php");
		include_once ("authconfig.php");
		include_once ("check2.php");	
		}
?>

<p><font face="Arial, Helvetica, sans-serif" size="5"><b>User Profile</b></font></p>
<table width="95%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#000066"> 
    <td colspan="2"> 
      <div align="center"><font color="#FFFFCC"><b><font face="Arial, Helvetica, sans-serif" size="3">Results</font>
      </b></font></div>
    </td>
  </tr>
  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">ID</font></b></td>
    <td align="left" width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["id"] ?></font></td>
  </tr>
  
  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">fullname</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["fullname"] ?></font></td>
  </tr>
  <tr>
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Company</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["Company"] ?></font></td>
	 </tr>
<tr>	 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Address</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["Address"] ?></font></td>
  </tr>
  <tr>	 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Phone</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["Phone"] ?></font></td>
  </tr>
  </tr>
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">date of birth</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["dateofbirth"] ?></font></td>
  </tr>
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">email</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["email"] ?></font></td>
  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Username</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["uname"] ?></font></td>
  </tr>



  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Team</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["team"] ?></font></td>
  </tr>
  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Level</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["level"] ?></font> </td>
  </tr>
  <tr> 
    <td width="16%" bgcolor="#0099CC"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Status</font></b></td>
    <td align="left"  width="84%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; <? echo $check2["status"] ?></font></td>
  </tr>
</table>


<?php
if(!isset($_GET['view']))
include "site.footer.php" 
?>