<?php 
	include_once "site.header.php";
	include_once ("authconfig.php");
?>
		<form name="lost" method="post" action="lost_pw.php">
<? 	if(isset($_GET['view']) && $_GET['view'] ==1)  		
		echo '<div class="title">You forgot to enter your Email address</div>';
	else if(isset($_GET['view']) && $_GET['view'] ==2)
		echo '<div class="title">No records found matching your email address</div>';
	else
		echo '<div class="title">Please enter your email address</div>';
?>			
			<div class="feat_prod_box">
				<input name="email_address" type="text" id="email_address">
				<input name="recover" type="hidden" id="recover" value="recover">
				<input type="submit" name="Submit" value="Recover My Password!"> 
			</div>
		</form>
<?php
include "site.footer.php"
?>