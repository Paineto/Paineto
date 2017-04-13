<? 
    include ("site.header.php");
    require_once ('checkadmin.php');
?>
	<p><font face="Arial, Helvetica, sans-serif" size="5"><b>Administration</b></font></p>
	  <table style="WIDTH: 286px; HEIGHT: 286px" border="1">
		<tbody>
		  <tr>
			<td width="276" colspan="2">
			  <p align="left"><font size="2" face="Verdana">Welcome to the administration panel. Please click :</font></p>
			</td>
		  </tr>
		  <tr>
			<td width="301">
			  <p align="left"><a href="items.php"><img style="WIDTH: 137px; HEIGHT: 120px" border="0" alt="" src="images/inventorycontrol.jpg" width="333" height="277"></a></p><font size="2"><font face="Verdana"><strong>Stock</strong>- Add, modify, delete, inventory.</font></font><a href="authmembers.php"></a>
			</td>
			<td width="328">
			  <p><a href="reportsindex.php"><img style="WIDTH: 131px; HEIGHT: 128px" border="0" alt="" src="images/Report.jpg" width="256" height="256"></a></p>
			  <p><font size="2"><font face="Verdana"><strong>Reports</strong>- Show all data information.</font></font></p>
			</td>
		  </tr>
		  <tr>
			<td width="301">
			  <p><a href="authmembers.php"><img border="0" alt="" src="images/Member.jpg" width="0" height="0"><img style="WIDTH: 137px; HEIGHT: 109px" border="0" alt="" src="images/Member.jpg" width="336" height="344"></a></p>
			  <p><font size="2" face="Verdana"><font size="2"><font face="Verdana"><strong>Members&nbsp;-</strong> Add, modify,</font></font><font size="2"><font face="Verdana">delete
			  users.</font></font></font></p>
			</td>
			<td width="328">
			  <p align="center"><a href="logout.php"><img style="WIDTH: 143px; HEIGHT: 109px" border="0" alt="" src="images/Logout.png" width="343" height="336"></a></p><font size="2"><font face="Verdana"><strong>Logout-</strong> <em>exit currentsession.</em></font></font>
			</td>
		  </tr>
		</tbody>
	  </table>
<?
	include "site.footer.php"
?>
