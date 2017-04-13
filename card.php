<?
	include ('site.header.php');
	require_once('inc/functions.inc.php');
	include_once ("authconfig.php"); 
	include_once ("inc/auth.php");
	require_once ('check.php');
	
	$group = new auth();
	if(isset($_POST['pay'])){
		$pid=$_GET["id"];
		$name=$_POST["name"];
		$Credit=$_POST["Credit"];
		$total=$_SESSION['total'];
		$date=$_POST["m"]."-".$_POST['y'];
		$code=$_POST["code"];
		if($name==''||$Credit==0 ||$date==0 ||$code==0 ){
			header("Location: ../my/card.php?id=".$pid."&note=2");
		}
		else{
			$group=$group->add_card($pid,$name,$Credit,$total,$date,$code);
			
			
			
			
			
			
			
			
			
	
?>
	<div align="center" style="border:2px solid red">
		<b>Thank You</b>
	</div>
	<br><br>
	<table align="center%" width="40%" cellspacing="2" bgcolor="#EEEEEE" border="0.1" bordercolor="#EEEEEE" bordercolorlight="#00FFFF">
		<tr>
			<td>Mr:</td>
			<td><?=$name?></td>
		</tr>
		<tr>
			<td>product:</td>
			<td>Quantity:</td>
			<td>Price:</td>
			<td>
<?php 
			echo updateproduct2($pid);
			echo showproduct();
			unset($_SESSION['cart']);
			unset($_SESSION['total']); 
?>
			</td>
		</tr>
		<tr>
			<tr></tr>
			<td>Total:</td>
			<td><?=$total?>$</td>
		</tr>
	</table>
<?
		}
	}
	else{
		if(isset($_GET['note']) &&  $_GET['note'] == 2){
?>
	<div align="center" style="border:2px solid red">
		<b>All fields are required </b>
	</div>
<?
	}
	if(isset($_GET['id'])){
?>
	<div class="title">
		<span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Very secure
	</div>
    <div class="feat_prod_box_details">
        <div class="contact_form">
			<div class="form_subtitle">Pay now</div>
			<form id="form1" name="pay" method="post" action="">
				<p>
					<strong>Card haolder's name:</strong><br>
					<input type="text" name="name" id="name" />
			    </p>
			    <p>
					<strong>Credit card number:</strong><br>
					<input type="text" name="Credit" id="Credit" />
			    </p>
			    <p>
					<strong>Expiry date:</strong><br>
					<label>
						<input name="m" type="text" id="m" size="4" />
					</label>
					<label>
						<input name="y" type="text" id="y" size="4" />
					</label>
				</p>	
				<p>
				<strong>Code:</strong><br>
					<label>
						<input type="text" name="code" id="code" />
					</label>
			    </p>
			    <p>
					<label>
						<input type="submit" name="pay" id="pay" value="pay now" />
					</label>
				</p>
				<p>&nbsp;
				</p>
				<p>&nbsp;
				</p>
			</form>
		</div>  
    </div>     	
<?
	}
	}
include ('site.footer.php');
?>