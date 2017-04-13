<?php	
	include "site.header.php"; 
	include_once ("inc/auth.php");
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
	include('check.php');
	include('check2.php');
		
	$user = new auth();
	if(isset ($_GET['id']))
		$id = $_GET['id'];
	if(isset($_POST['modifyu'])){
		$fullname = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$Company = $_POST['Company'];
		$Phone = $_POST['Phone'];
		$Address = $_POST['Address'];
		$Dateofbirth = $_POST['Date'];
		$team = "2";
		$status = "Active";

		$user->modify_user ($id,$fullname, $password, $status, $Company, $Phone, $Address , $Dateofbirth,$email);
		$message = "modify successfully!";	
?>
	<div id="content">
		<h2>Registration Results</h2>
		<table border="0" cellpadding="5" cellspacing="0" style="width:400px"
			class="maincentre">
			<tr>
				<td><?print $message;?></td>
			</tr>
			<tr>
				<td><br><a href="authmembers.php">members screen</a></td>
			</tr>
		</table>
	</div>		
<?
	}
	else{
?>
	<div id="content">
		<div class="contact_form">
			<div class="form_subtitle">Modify User</div>
			<form id="modify" name="modifyu" method="post">
				<p align="center">
					<strong>Full Name:</strong><br>
					<input id="name" type="text" size="50" name="name" value="<? echo $check2["fullname"] ?>" />
				</p>
				<p align="center">
					<strong>Company:</strong><br>
					<input id="Company" type="text" size="50" name="Company" value="<? echo $check2["Company"] ?>"/>
				</p>
				<p align="center">
					<strong>Phone:</strong><br>
					<input id="Phone" type="text" size="50" name="Phone" value="<? echo $check2["Phone"] ?>"/>
				</p>
				<p align="center">
					<strong>Address:</strong><br>
					<input id="Address" type="text" size="50" name="Address" value="<? echo $check2["Address"] ?>"/>
				</p>
				<p align="center">
					<strong>Date of birth:</strong><br>
					<input id="Date" type="text" size="50" name="Date" value="<? echo $check2["Phone"] ?>"/>
				</p>
				<p align="center">
					<strong>Email Address:</strong><br>
					<input id="email" type="text" size="50" name="email" value="<? echo $check2["email"] ?>"/>
				</p>
				<p align="center">
					<strong>Password:</strong><br>
					<input id="password" type="password" size="50" name="password" />
				</p>
				<p align="center">
					<input type="submit" value="update" name="modifyu" />
					<input type="hidden" id="txtid" name="txtid" value="">
				</p>				
			</form>
		</div>
	</div>	
<?	
	}	
	include "site.footer.php";
?>