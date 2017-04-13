<?	
	require('siteadmin.header.php');
	include_once ("inc/auth.php");
	include('checkadmin.php');
	$group = new auth();

    if (array_key_exists('add', $_POST)) {
		if(isset($_POST["selectItem"]))
		$Item = $_POST["selectItem"];
		else
		$Item= "";
		if(isset($_POST["Supplier"]))
		$pid = $_POST["Supplier"];
		else
		$pid= "";
		$whouse =$_POST["whouse"];
		$qty = $_POST["qty"];
		$cost= $_POST["cost"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$date3 = $_POST["date3"];
		$date = $date1 . "-" . $date2 . "-" . $date3;
		
		$con = mysql_connect("localhost","root",""); 
		mysql_select_db("inventory", $con);
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }				
					
			if($Item == '' || $qty == 0 || $pid == '' || $cost == 0  ){ 
			header('Refresh: 0; URL=purchase.php?note=1');
			}
			else {   			
				$totalaccount=$cost*$qty;
						
				$query =("INSERT INTO invoice (item,Total,whouse , transdate, typeid,pid,qty)
				VALUES ('$Item',  '$totalaccount','$whouse', '$date',2, '$pid','$qty')")or die(mysql_error());
				mysql_query($query);

				$query = ("UPDATE stock set qty = qty + $qty where name='$Item'") or die(mysql_error());
				mysql_query($query);

				$query=mysql_query("select * from account where accid = $pid")or die(mysql_error());
				if (mysql_num_rows($query) > 0){
				$query = ("UPDATE  account set account = account + $totalaccount where accid=$pid") or die(mysql_error());
				}
				else
				$query = ("insert into account values('',$pid,2,$totalaccount)") or die(mysql_error());
				mysql_query($query);
				header('Refresh: 0; URL=purchase.php?note=2');	
				
								
				}					
	}
?>  	
				   					   
<div id="container">
	<form id="sales" name="sales"  autocomplete="on"  method="POST" action="" >
		<input type="hidden" id="setaction" name="setaction" value="">
			<div class="info">
			<h2>PURCHASE INVOICE</h2>
			</div>
			<div>
			<table border="0" cellpadding="0" cellspacing="0"><tr><td>
			<a href="adminindex.php"><img src="buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a><a href="items.php"><img src="buttons/button2up1.png" border="0" id="button2" vspace="1" hspace="1"></a><a href="purchase.php" ><img src="buttons/button3up1.png" border="0" id="button3" vspace="1" hspace="1"></a><a href="sales.php" ><img src="buttons/button4up1.png" border="0" id="button4" vspace="1" hspace="1"></a><a href="logout.php" ><img src="buttons/button5up1.png" border="0" id="button5" vspace="1" hspace="1"></a><br>
			</td></tr></table>
			</div>
<?
if(isset($_GET['note']) &&  $_GET['note'] == 1){
?>
<div align="center" style="border:2px solid red">
<b>Fill the form (Item ,Qty, Custumer ,cost) </b>
</div>
<?
}
else
if(isset($_GET['note']) &&  $_GET['note'] == 2){
?>
<div align="center" style="border:2px solid red">
		<b>Purchase Done</b>
</div>
<?
}
?>
<div >
	<h4><a href="reportinvoice.php?type=2">Go To Report</a></h4>
</div>
<ul>
		
	<li>
		<label>Item
		</label>
		<div>
			<input id="a" type="text" onchange="searchitem()" name="a" size="6" class="field text medium"  >
				<select name="selectItem"  value="" size="1" >
			
<? 
 if(isset($_POST['setaction'])){
         $item = $_POST["selectItem"];
    if ($_POST['setaction']=="item"){
		
		$result = $group->searchstock($_POST['a']);
		while($row = mysql_fetch_object($result))
		{
			echo "<option value=".$row->name.">".$row->name;
		}
	}
	else
	if (isset($item))
		echo "<option value=".$item.">".$item;
		
	
 }
?>
				</select>
		</div>
	</li>
    <li>
	<label>Appraised Value</label>
	
	<span>$</span>
	<span>
		<input id="cost" name="cost" type="text" class="field text medium" value="<?if(isset($_POST['cost'])) echo $_POST['cost']?>" size="10" 	/> 	
		<label for="Field0">Dollars</label>
	</span>
		
	</li>

<li>
	<label>
		Date :
			</label>
	<span>
		<input	id="date1" name="date1" value="<?if(isset($_POST['date1'])) echo $_POST['date1']?>"  type="text" class="field text medium" size="2" maxlength="2" /> /
		<label >MM</label>
	</span>
	<span>
		<input 	id="date2" name="date2"  value="<?if(isset($_POST['date2'])) echo $_POST['date2']?>" type="text" class="field text medium" size="2" maxlength="2" /> /
		<label >DD</label>
	</span>
	<span>
	 	<input id="date3" name="date3"  value="<?if(isset($_POST['date3'])) echo $_POST['date3']?>" type="text" class="field text medium" 	size="8" maxlength="4"/>
		<label>YYYY</label>
	</span>
	<span id="cal2">
		<img id="pick2" class="datepicker" src="images/calendar.png" alt="Pick a date." />
	</span>
</li>
<li>
	<label>Supplier</label>
	<div>
		<input type="text" onchange="searchpeople()" name="b" size="4" class="field text medium" >
		<select name="Supplier"  size=1 >

<? 
 if(isset($_POST['setaction'])){
         $supplier = $_POST["Supplier"];
    if ($_POST['setaction']=="people"){
		
		$result = $group->display(2,$_POST['b']);
		while($row = mysql_fetch_object($result))
		{
			echo "<option value=".$row->id.">".$row->fullname;
		}
	}
	else
		echo "<option value=".$supplier.">".$item;
 }
?>
		</select>
	</div>
	</li>
<li >
	<label>Quantity</label>
	<div>
		<input id="Quantity" name="qty" 	type="text"	class="field text medium"	maxlength="255" />
			</div>
	</li>
<li>
	<label>
		ware house
			</label>
	<div>
		<input id="whouse" name="whouse" type="text" class="field text medium" 	maxlength="255" />
			</div>
	</li>
	<li class="buttons">
				<input id="savepurch" class="btTxt submit"  type="submit"  name="add" value="Submit" />
			   
	</li>
</ul>
</form>
</div><!--container-->
<?	
	require('siteadmin.footer.php');
?>