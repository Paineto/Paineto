<?php 
	include('siteadmin.header.php');
	include_once ("authconfig.php"); 
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

	 $group = new auth();
	 $id = (isset($_POST['txtid']))?$_POST['txtid']:'';
		if (isset($_POST['setaction'])){
		$group->delete_invoice($id);

		}
	 
?>
<input type="hidden" id="txtid" name="txtid" >


<center><h1><font color='maroon'>INVOICES REPORTS</font></h1></center>

<table cellspacing='2' cellpadding='0' width='800' align= "center" >
	<tr>
		<th bgcolor=#5888C2><font face='Arial' color='white'> item name</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>Supplier</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>Qty</th>
		<th bgcolor=#5888C2><font face='Arial' color='white'>cost</th>
		
		<th bgcolor=#5888C2><font face='Arial' color='white'>Actions</th>
	</tr>

<?
$color="#98EC66";
if($_GET['type']==1)
$result = $group->displayinvoice(1);
else
if($_GET['type']==2)
$result = $group->displayinvoice(2);

while($row = mysql_fetch_object($result))
{
$name = $group->fullname($row->pid,1);


	if($color=="#EDF1F4")
	{

	echo "<tr bgcolor=$color>";
	echo "<td height=\"2px\">".$row->item."</td><td height=\"2px\">".$name."</td>
	<td height=\"2px\">".$row->qty."</td><td height=\"2px\">".$row->Total."$</td>
	<td height=\"2px\"><input type=\"image\" alt=\"delete\" src=\"images/delete.png\" 
	name=\"image\" onclick=\"checkDelete(" .$row->id. ");\"  width=\"20\" height=\"20\">delete";
	$color="#98EC66";
	}
	else
	{
	echo "<tr bgcolor=$color>";
	echo "<td height=\"2px\">".$row->item."</td><td height=\"2px\">".$name."</td>
	<td height=\"2px\">".$row->qty."</td><td height=\"2px\">".$row->Total."$</td>
	<td height=\"2px\"><input type=\"image\" alt=\"delete\" src=\"images/delete.png\" 
	name=\"image\" onclick=\"checkDelete(" .$row->id. ");\"  width=\"20\" height=\"20\">delete";
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