<?php 
	include('siteadmin.header.php');
	include_once ("authconfig.php"); 
	include_once ("inc/auth.php");
	include('checkadmin.php');
	require_once ('check.php');
	 
	$card = new auth();
	$id = (isset($_POST['txtid']))?$_POST['txtid']:'';
	if(isset($_POST['setaction']) && $_POST['setaction']=="delete"){
		 $card->delete_card($id);
    }
?>
	<div id="container">
		<div>
			<table border="0" cellpadding="0" cellspacing="0"align= "center">
				<tr>
					<td><a href="adminindex.php"><img src="buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a></td>
					<td><a href="authmembers.php"><img src="buttons/button2up.png" border="0" id="button2" vspace="1" hspace="1"></a></td>
					<td><a href="authsuppliers.php"><img src="buttons/button3up.png" border="0" id="button3" vspace="1" hspace="1"></a></td>
					<td><a href="authgroup.php" ><img src="buttons/button4up.png" border="0" id="button4" vspace="1" hspace="1"></a></td>
					<td><a href="authcards.php"><img src="buttons/button5up.png" border="0" id="button5" vspace="1" hspace="1"></a></td>
					<td><a href="logout.php"><img src="buttons/button6up.png" border="0" id="button6" vspace="1" hspace="1"></a></td><br>
				</tr>
			</table>
		</div>
		<div>
			<object width="550" height="400">
				<param name="movie" value="LINE_001.SWF">
				<embed src="swf/LINE_001.SWF" width="100%" height="10">
				</embed>
			</object>
		</div>
		<form id="main" name="form" class="wufoo " autocomplete="on" method="POST">
			<input type="hidden" id="setaction" name="setaction" value="">
			<input type="hidden" id="txtid" name="txtid" >
			<center><h1><font color='maroon'>Credit Card</font></h1>
				<table cellspacing='2' cellpadding='0' width='800'>
					<tr>
						<th bgcolor=#5888C2><font face='Arial' color='white'>User Name</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>Card holder's Name</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>Card number</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>Amount</th>
						<th bgcolor=#5888C2><font face='Arial' color='white'>Action</th>
		
<?
	$color="#E2FEF0";
	$result = $card->displaycard();
	while($row = mysql_fetch_object($result))
	{
		$name = $card->fullname($row->pid,1);
		if($color=="#DDFCDA"){
		echo 			"<tr bgcolor=$color>";	
		echo '			<td height="2px">'.$name.'</td>
						<td height="2px">'.$row->name.'</td>
						<td height="2px">'.$row->number.'</td>
						<td height="2px">'.$row->total.'</td>
						<td height="2px"><input type="image" alt="delete" src="images/delete.png" name="image" onclick="checkDelete('.$row->id.');"  width="20" height="20">Delete</td>';
		$color="#E2FEF0";
		}
		else{
		echo 		"<tr bgcolor=$color>";
		echo '	  	    <td height="2px">'.$name.'</td>
						<td height="2px">'.$row->name.'</td>
						<td height="2px">'.$row->number.'</td>
						<td height="2px">'.$row->total.'</td>
						<td height="2px"><input type="image" alt="delete" src="images/delete.png" name="image" onclick="checkDelete('.$row->id.');"  width="20" height="20">Delete</td>';
		$color="#DDFCDA";
		}
			echo "	</tr>";		
	}
?>
				</table>
			</center>
		</form>
	</div><!--container-->
<?
	include('siteadmin.footer.php');
?> 
