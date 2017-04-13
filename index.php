<?php
	require_once ('site.header.php');
	require_once('inc/auth.php');
	include_once ("authconfig.php");
	$auth = new auth();
?>
 	<div class="left_content">
        <div class="title">
			<span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Featured products
		</div>		
<?	
	$categorie=rand(1,6);
	$auth->connect();
    $result=$auth->displaystock($categorie,"related");
	while ($row = mysql_fetch_array($result)) {
	extract($row);
?>	
		<div class="feat_prod_box">
			<div class="prod_img"><a href="details.php?id=<?=$stockid?>"><img src="<?=$pix?>" alt="" title="" border="0" width="101" height="100"/></a></div>
			<div class="prod_det_box">
				<div class="box_top"></div>
				<div class="box_center">
					<div class="prod_title"><?=$name?></div>
					<p class="details">Price:&nbsp;<?=$cost?>.</p>
					<a class="more" href="details.php?id=<?=$stockid?>">- more details -</a>
					<div class="clear"></div>
				</div>	
				<div class="box_bottom"></div>
			</div>    
			<div class="clear"></div>
		</div>	            
<?          
	}
?>
		<div class="clear"></div>	  
		<div class="clear"></div>
    </div><!--end of left content-->     
<?
	include ('site.footer.php');
?>
