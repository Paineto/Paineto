<?php
	include ('site.header.php');
	require_once('inc/mysql.class.php');
	include_once ("authconfig.php");
	require_once('inc/functions.inc.php');
	include_once "inc/auth.php";
	include_once "check.php";

	if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=('');
	}
	$cart = $_SESSION['cart'];
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		switch ($action){
			case 'add':
				if ($cart) {
					$cart .= ','.$_GET['id'];
				} else {
					$cart = $_GET['id'];
				}
				break;
			case 'delete':
				if ($cart) {
					$items = explode(',',$cart);
					$newcart = '';
					foreach ($items as $item) {
						if ($_GET['id'] != $item) {
							if ($newcart != '') {
								$newcart .= ','.$item;
							} else {
								$newcart = $item;
							}
						}
					}
					$cart = $newcart;
				}
				break;
			case 'update':
			if ($cart) {
				$newcart = '';
				foreach ($_POST as $key=>$value) {
					if (stristr($key,'qty')) {
						$id = str_replace('qty','',$key);
						$items = explode(',',$newcart);
						$newcart = '';
						foreach ($items as $item) {
							if ($id != $item) {
								if ($newcart != '') {
									$newcart .= ','.$item;
								} else {
									$newcart = $item;
								}
							}
						}
						for ($i=1;$i<=$value;$i++) {
							if ($newcart != '') {
								$newcart .= ','.$id;
							} else {
								$newcart = $id;
							}
						}
					}
				}
			}
			if(isset($newcart))
			$cart = $newcart;
			break;
		}
		$_SESSION['cart'] = $cart;
	}
?>  
			<div class="feat_prod_box_details">
				<table class="cart_table" align="left">
					<tr class="cart_title">
						<td>Action</td>
						<td>Part name</td>
						<td>Unit price</td>
						<td>Qty</td>
						<td>Total</td>               
					</tr>
<?php
	echo showCart();
?>					
					<tr>
						<td>
						<br><button type="submit" class="selected">Update</button>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="cart_total"><span class="red">TOTAL:</span></td>
						<td> $<?=$_SESSION['total']?></td>                
					</tr>                  			
				</table>
				<div> <br><br><br><br><br><br><br><br><br><a href="shopping.php" class="continue">&lt; continue</a>
					<a href="card.php?id=<?echo $check["id"]?>" class="checkout">checkout &gt;</a>
				</div> 
			</div>	 
<?
	include ('site.footer.php');
?>		 