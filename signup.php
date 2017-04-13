<?
	include ('site.header.php');
?>
    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Register</div>
    <div class="feat_prod_box_details">
        <div class="contact_form">
            <div class="form_subtitle">create new account</div>
            <form id="EmailForm" name="EmailForm" action="process.php" method="post">
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
					<strong>Username:</strong><br>
					<input id="username" type="text" size="50" name="username" />
				</p>
				<p align="center">
					<strong>Password:</strong><br>
					<input id="password" type="password" size="50" name="password" />
				</p>
				<p align="center">
					<input type="submit" value="Register" name="Submit" />
				</p>
			</form>
        </div>             
    </div>	         
<?
include ('site.footer.php');
?>
