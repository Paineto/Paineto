<?  
	include ("siteadmin.header.php");
	include_once ("inc/auth.php");
	include_once ("authconfig.php");
	include('checkadmin.php');
    
	if(isset($_POST['adduser'])){
		$user = new auth();
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$Company = $_POST['Company'];
		$Phone = $_POST['Phone'];
		$Address = $_POST['Address'];
		$Dateofbirth = $_POST['Date'];
		$team = "3";
		$status = "Active";

		$situation = $user->add_supplier ($fullname, $team, $status, $Company, $Phone, $Address , $Dateofbirth);
	     
		if ($situation == "username exists") 
			$message = "Supplier already used! Please try again with a new one.";
		else 
		if ($situation == "blank level")
			$message = "Script broken!";
		else 
		if ($situation == 1) 
			$message = "Added successfully!";

		else 
			$message = "error";
?>
	<div id="content">
		<h2>Registration Results</h2>
			<table border="0" cellpadding="5" cellspacing="0" style="width:400px" class="maincentre">
				<tr>
					<td><?print $message;?><br>
					</td>
				</tr>
				<tr>
					<td>
<?
	if ($situation != 1) 
	print "Would you like to <a href=\"addsupplier.php\">Try again?</a>";
?>
					<br><a href="authsuppliers.php">Suppliers screen</a>
					</td>
			   </tr>
			</table>
	</div>	
<?
    }
	else
	{
?>
	<div id="content">
		<div class="contact_form">
			<div class="form_subtitle">Add new supplier</div>
			<form id="supplier" name="supplier"  method="post">
				<p align="center">
					<strong>Full Name:</strong><br>
					<input id="name" type="text" size="50" name="name" />
				</p>
				<p align="center">
					<strong>Company:</strong><br>
					<input id="Company" type="text" size="50" name="Company" />
				</p>
				<p align="center">
					<strong>Phone:</strong><br>
					<input id="Phone" type="text" size="50" name="Phone" />
				</p>
				<p align="center">
					<strong>Address:</strong><br>
					<input id="Address" type="text" size="50" name="Address" />
				</p>
				<p align="center">
					<strong>Date of birth:</strong><br>
					<input id="Date" type="text" size="50" name="Date" />
				</p>
				<p align="center">
					<strong>Email Address:</strong><br>
					<input id="email" type="text" size="50" name="email" />
				</p>
				<p align="center">
				<input type="submit" value="Add supplier" name="adduser" />
				</p>
			</form>
		</div>
	</div>
<?
	}
	include("siteadmin.footer.php");
?>
