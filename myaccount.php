<?php 
	include "site.header.php";
	include_once ("authconfig.php");
	include_once ("Userarea.php");
?>	
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
        	<div class="feat_prod_box_details">
				<p class="details"></p>
              	<div class="contact_form">
					<div class="form_subtitle">login into your account</div>
					<form id="signin" name="Sample" method="post" action="<?php print $resultpage ?>">        
						<div class="form_row">
							<label class="contact"><strong>Username:</strong></label>
							<input type="text" class="contact_input" name="username" />
						</div>  
						<div class="form_row">
							<label class="contact"><strong>Password:</strong></label>
							<input type="password" class="contact_input" name="password" />
						</div>                     
						<div class="form_row">
							<div class="terms">
								<a href="forgot.php">Forgot your password?</a>
							</div>
						</div> 						
						<div class="form_row">
							<input type="submit" class="register" value="login" />
						</div>                     
					</form>                      
                </div>              
            </div>	           
			<div class="clear"></div>
        </div><!--end of left content-->
<?
	include ('site.footer.php');
?>
