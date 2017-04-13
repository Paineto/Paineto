<?php
	include ('siteadmin.header.php');
	include_once ("inc/auth.php");
    include('checkadmin.php');
	include_once ("inc/auth.php");
		
	
	$Report = new auth();
	
?>
				<table cellspacing='2' cellpadding='0' width='800'>
					<tr>
						<th bgcolor=#5888C2><font face='Arial' color='white'>fullname</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>type</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>balance</th>
						
					</tr>
<?
	$color="#E2FEF0";
	$result = $Report->displayacc(1);
	
	while($row = mysql_fetch_object($result)){
		
			if(($row->acctype) == 1)
			$type = "Credit";
			else
			$type = "Debit";
			$name=$Report->memberview($row->accid);
		if($color=="#DDFCDA"){	
			echo "	<tr bgcolor=$color>";
			echo "<td height=\"2px\">".$name['fullname']."</td><td height=\"2px\">".$type."</td>
			<td height=\"2px\">".$row->account."$</td>";
			$color="#98EC66";
		}
		else
		{
			if(($row->acctype) == 1)
			$type = "Credit";
			else
			$type = "Debit";
			echo "	<tr bgcolor=$color>";
			echo "<td height=\"2px\">".$name['fullname']."</td><td height=\"2px\">".$type."</td>
			<td height=\"2px\">".$row->account."$</td>";
			$color="#DDFCDA";
		}
			echo "	</tr>";
	}
?>					
				</table>
			    <a href="reportsindex.php">click to go back</a>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?
	include ('siteadmin.footer.php');
?>
      
     