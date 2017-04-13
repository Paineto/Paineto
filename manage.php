<?php
	include_once ("inc/auth.php");
	$Item = $_POST["Item"];
	$whouse =$_POST["whouse"];
	$qty = $_POST["qty"];
	$cost= $_POST["cost"];
	$date1 = $_POST["date1"];
	$date2 = $_POST["date2"];
	$date3 = $_POST["date3"];
	$date = $date1 . "-" . $date2 . "-" . $date3;

	$auth= new auth();
	$auth->connect();

	if(isset($_POST['add'])){
		$sn = $_POST["SN"];  
		$supplier= $_POST['Supplier'];
	if($Item == '' || $qty== 0 || $supplier== '' || $cost== 0  ){
		header("Location:../my/purchase.php?note=1");
	}
else {
		$totalaccount=$cost*$qty;

		$query =("INSERT INTO invoice (item,Total,whouse , transdate)
		VALUES ('$Item',  '$totalaccount','$whouse', '$date')")or die(mysql_error());
		mysql_query($query);

		$query = ("UPDATE stock set qty = qty + $qty where name='$Item'") or die(mysql_error());
		mysql_query($query);

		$account1=mysql_query("select * from account where id = 1")or die(mysql_error());
		$account = mysql_fetch_object($account1);
		$idaccount = $account->id;

		$query = ("UPDATE  account set account = account + $totalaccount where id=$idaccount") or die(mysql_error());
		mysql_query($query);
    }
?>
<SCRIPT language="JavaScript1.1">
			           <!--
					   
				           location.replace("purchase.php?note=2");
						   
                       //-->
         </SCRIPT>   
<?
}					  
else if(isset($_POST['sub'])){
$Custumer= $_POST['Custumer'];
if($Item == '' || $qty== 0 || $Custumer== '' || $cost== 0  ){
?>
<SCRIPT language="JavaScript1.1">
			           <!--
					   
				           location.replace("sales.php?note=1");
						   
                       //-->
                       </SCRIPT>
<div align="center" style="border:2px solid red">
<b>fill the form </b>
</div>

<?php
}
else {
	$totalaccount=$cost*$qty;

	$query =("INSERT INTO invoice (item,Total,whouse , transdate)
	VALUES ('$Item',  '$totalaccount','$whouse', '$date')")or die(mysql_error());
	mysql_query($query);

	$query = ("UPDATE stock set qty = qty - $qty where name='$Item'") or die(mysql_error());
	mysql_query($query);

	$querydebit = ("UPDATE  account set account = account - $totalaccount where id=1") or die(mysql_error());
	$querycredit = ("UPDATE  account set account = account + $totalaccount where id=2") or die(mysql_error());
	mysql_query($querydebit);
	mysql_query($querycredit);
	}
}
mysql_close($con);
?>

		<SCRIPT language="JavaScript1.1">
			           <!--
					   
				           location.replace("sales.php?note=2");
						   
                       //-->
         </SCRIPT>   
					   
					   
					   