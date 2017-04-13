					<div class="clear"></div>
				</div><!--end of left content-->   
				<div class="right_content">
				<div class="languages_box">
					<span class="red">Date:</span>
			   	    <span class="blue"><?=date("d.m.Y")?></span>
				</div>
<?
	if(isset($_SESSION['fullname'])){
?>
                <div class="currency">
					<span class="red">Welcome: </span>
					<a href="myaccount.php"><?=$_SESSION['fullname']?></a>
					<a href="logout.php" class="selected" >LOGOUT</a>
                </div>
<?
	}
	else{
?>
				<div class="currency">
					<span class="red"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
					<a href="myaccount.php" class="selected" >LOGIN</a>
                </div>
<?
	}
?>                  
				<div class="cart">
					<div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
					<div class="home_cart_content">
<?
	require_once('inc/mysql.class.php');
	include_once ("authconfig.php");
	include_once ("inc/auth.php");
	require_once('inc/functions.inc.php');
	echo writeShoppingCart();
?>
					</div>
						<a href="cart.php" class="view_cart">view cart</a>            
				</div>
                <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Shop</div> 
				<div class="about">
					 <p>
						
						We Made shopping easy you can Buy bati5a .
					 </p>
				</div>            
				<div class="right_box">
					<div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>New Products</div> 
				
				
<?	
	$auth = new auth();
	$auth->connect();
    $result=$auth->displaystock("All","last");	
	while ($row = mysql_fetch_array($result)) {
	extract($row);  
?>
                    <div class="new_prod_box">
                        <?=$name?>
                        <div class="new_prod_bg">
							<a href="details.php?id=<?=$stockid?>"><img src="<?=$pix?>" alt="" title="" class="thumb" border="0"width="100" height="100" /></a>
                        </div>           
                    </div>            
<?
	}
?>                                    
				</div>             
				<div class="right_box">           
					<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div>              
					<ul class="list">
						<li>
							<div style="text-align: left;" id="result_box" dir="ltr">
								<a href="shopping.php?cat=5">Meat And chicken</a>
							</div>
						</li>
						<li>
							<div style="text-align: left;" id="result_box0" dir="ltr">
								<a href="shopping.php?cat=1">Fruits and vegetables</a>
							</div>
						</li>
						<li>
							<div style="text-align: left;" id="result_box0" dir="ltr">
								<a href="shopping.php?cat=2">cosmetics</a>
							</div>
						</li>
						<li>
							<div style="text-align: left;" id="result_box1" dir="ltr">
									<a href="shopping.php?cat=3">Cans</a>
							</div>
						</li>
						<li>
							<div style="text-align: left;" id="result_box1" dir="ltr">
								<a href="shopping.php?cat=4">nutrition</a>
							</div>
						</li>
						<li>
							<div style="text-align: left;" id="result_box1" dir="ltr">
								<a href="shopping.php?cat=6">Others</a>
							</div>
						</li>                                              
					</ul>
					<p>&nbsp;</p>
					<p>&nbsp;</p>         
						<div class="title"><span class="title_icon"><img src="images/bullet6.gif" alt="" title="" /></span>Advertisment<br><br><img src="images/cnam.jpg" alt="" title="" height="200" width="140" /></div>                
											 
				</div>                           
			</div><!--end of right content-->
			<div class="clear"></div>
       </div><!--end of center content-->                  
       <div class="footer">
			
			<div class="right_footer">
				<a href="#">All rights reserved for Bati5 Online™.</a>     
			</div>  
			<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" width="80" height="55" /></div>
       </div>
   
	</div>
	</body>
</html>