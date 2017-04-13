<?
include('siteadmin.header.php');
include_once ("inc/auth.php");
    include('checkadmin.php');
?>

<div id="container">
<div>

<table border="0" cellpadding="0" cellspacing="0" align= "center"><tr><td>
<a href="adminindex.php" ><img src="buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a>
<a href="items.php" ><img src="buttons/button2up1.png" border="0" id="button2" vspace="1" hspace="1"></a>
<a href="purchase.php" ><img src="buttons/button3up1.png" border="0" id="button3" vspace="1" hspace="1"></a>
<a href="sales.php" ><img src="buttons/button4up1.png" border="0" id="button4" vspace="1" hspace="1"></a>
<a href="logout.php" ><img src="buttons/button5up1.png" border="0" id="button5" vspace="1" hspace="1"></a><br>
</td></tr></table>

</div>
<div>
<object width="550" height="400">
<param name="movie" value="LINE_001.SWF">
<embed src="swf/LINE_001.SWF" width="100%" height="10">
</embed>
</object>
</div>
<form id="main" name="form" class="wufoo " autocomplete="on"
	enctype="multipart/form-data" method="POST">
<input type="hidden" id="setaction" name="setaction" value="">


<?php 



	include_once ("authconfig.php"); 
	include_once ("inc/auth.php");
	require_once ('check.php');

 $group = new auth();
 $id = (isset($_POST['txtid']))?$_POST['txtid']:'';

 if(isset($_POST['setaction'])){
    if ($_POST['setaction']=="modify"){
			header("Location:../my/modifymember.php?id=".$id);
		exit;
	}
	else
	if ($_POST['setaction']=="delete"){
	$group->delete_stock($id);

	}
 }
?>
<input type="hidden" id="txtid" name="txtid" >


<center><h1><font color='maroon'>Items in stock</font></h1></center>

<table cellspacing='2' cellpadding='0' width='800' align= "center" >
	<tr>
		<th bgcolor=#5888C2><font face='Arial' color='white'>name</font</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>qty</font</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>cost</font</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>picture</font</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>Actions</font</th>
	</tr>

<?
$color="#98EC66";

$result = $group->displaystock("All","All");

while($row = mysql_fetch_object($result))
{
	if($color=="#EDF1F4")
	{

	echo "<tr bgcolor=$color>";
	echo "<td height=\"2px\">".$row->name."</td><td height=\"2px\">".$row->qty."</td>
	<td height=\"2px\">".$row->cost."$</td>
		<td height=\"2px\"><img src=\"" .$row->pix. "\"width=\"60\" height=\"60\"></td>
	<td height=\"2px\"><input type=\"image\" alt=\"delete\" src=\"images/delete.png\" 
	name=\"image\" onclick=\"checkDelete(" .$row->stockid. ");\"  width=\"20\" height=\"20\">delete
	
	<input type=\"image\" alt=\"show\" src=\"images/view.png\" 
	name=\"image\" src=\"images/delete.gif\" onclick=\"popupWindow('details.php?id=".$row->stockid."&view=2')\"width=\"20\" height=\"20\">view</td>";
	$color="#98EC66";
	}
	else
	{
	echo "<tr bgcolor=$color>";
		echo "<td height=\"2px\">".$row->name."</td><td height=\"2px\">".$row->qty."</td>
	<td height=\"2px\">".$row->cost."$</td>
	<td height=\"2px\"><img src=\"" .$row->pix. "\"width=\"60\" height=\"60\"></td>
	<td height=\"2px\"><input type=\"image\" alt=\"delete\" src=\"images/delete.png\" 
	name=\"image\" onclick=\"checkDelete(".$row->stockid.");\"  width=\"20\" height=\"20\">delete
	<input type=\"image\" alt=\"show\" src=\"images/view.png\" 
	name=\"image\" src=\"images/delete.gif\" onclick=\"popupWindow('details.php?id=".$row->stockid."&view=2')\"width=\"20\" height=\"20\">view</td>";
	$color="#EDF1F4";
	}
} 

?>
</table>
 </form>
</div><!--container-->
<?
include('siteadmin.footer.php');
?>