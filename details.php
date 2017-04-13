<?
	include ('site.header.php');
	require_once('inc/auth.php');
	include_once ("authconfig.php");
	require_once('inc/functions.inc.php');
	$auth = new auth();
      		
	if(isset($_GET['id'])){
		$auth->connect();
		$result=$auth->displaystock($_GET['id'],"id");
		$row = mysql_fetch_array($result);
		extract($row);	
		?>
		<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
		<script src="scripts/prototype.js" type="text/javascript"></script>
		<script src="scripts/scriptaculous.js?load=effects" type="text/javascript"></script>
		<script src="scripts/lightbox.js" type="text/javascript"></script>
		<script type="text/javascript" src="scripts/java.js"></script>
        	
        <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Product name</div>
        <div class="feat_prod_box_details">
            <div class="prod_img"><img src="<?=$pix?>" alt="" title="" border="0" width="100" height="100" />
                <br /><br />
                <a href="<?=$pix?>" rel="lightbox">Enlarge</a>
            </div>               
                <div class="prod_det_box">
                	<div class="box_top"></div>
						<div class="box_center">
							<div class="prod_title">Details</div>
							<p class="details">
								<strong>Name:&nbsp;</strong><span class="red"><?=$name?></span><br>
								<strong>Categorie:&nbsp;</strong> <span class="red"><?=$categorie?></span><br>
								<strong>Serial number:&nbsp;</strong> <span class="red"><?=$sn?></span><br>
							</p> 
							<div class="price"><strong>PRICE:</strong> <span class="red"><?=$cost?>$</span></div>									   
							_______________________<a href="cart.php?action=add&id=<?=$stockid?>"><img src="images/order_now.gif" alt="" title="" border="0" /></a>
							<div class="clear"></div>
						</div>                  
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
		</div>	                     
        <div id="demo" class="demolayout">
            <ul id="demo-nav" class="demolayout">
                <li><a class="active" href="#tab1">More details</a></li>
                <li><a class="" href="#tab2">Related products</a></li>
            </ul>   
            <div class="tabs-container">
                <div style="display: block;" class="tab" id="tab1">
                    <p class="more_details"><?=$info;?>
                    </p>
                </div>	
				<div style="display: none;" class="tab" id="tab2">
<?  	$auth->connect();
		$result=$auth->displaystock($categorie,"related");	
		while($row = mysql_fetch_array($result)){ 
			extract($row);
?>
                    <div class="new_prod_box">
                        <?=$name?></a>
                        <div class="new_prod_bg">
							<a href="details.php?id=<?=$stockid?>"><img src="<?=$pix?>" alt="" title="" class="thumb" border="0"width="100" height="100" /></a>
                        </div>           
                    </div>
<?}

?>                                                                                                
                    <div class="clear"></div>
                </div>	          
            </div>
		</div>       
		
<script type="text/javascript">
var tabber1 = new Yetii({
id: 'demo'
});
</script>

<?php
    }
    else{
?>
		<div class="title"><a href="shopping.php">Please select Products First</a></div> 
<?
	}
	require('site.footer.php');
?>