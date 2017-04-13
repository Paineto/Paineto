<?php

	require('site.header.php');
	require_once('inc/auth.php');
	include_once ("authconfig.php");
	require_once('inc/functions.inc.php');
	include('pagination.php');
	$auth = new auth();
?>
		<div class="title">Items In Our Store.</div>	
		<div class="contact_form" >		
			<form name="Search" method="POST" action=""  >
				<div class="form_subtitle">Search</div>
					<strong>Categorie</strong>
					<select name="categorie">
						<option value="All">All
<?
	$conn=$auth->connect();
	$result = $auth->displaycat();
	while($row = mysql_fetch_object($result)){
				echo  "<option value=".$row->id.">".$row->description;
	}
?>
					</select>
					<strong>Prices</strong>
					<select name="price">
						<option value="All">All
<?
	for($i=50;$i<1001;$i+=50){
		echo 			"<option value=".$i."><".$i;
	}
?>
					</select><br><br>
					______________________________________<input type="submit" name="filter" value="Filter" >
			</form>
			<div class="feat_prod_box">
<?php
	if(isset($_POST['filter']) || isset($_GET['cat']) || isset($_GET['page'])){ 
		if(isset($_POST['filter'])){
			unset($_GET);
			$name=$_POST['categorie'];
			$price=$_POST['price'];
			$_SESSION['Categorie']=$name;
			$_SESSION['Prices']=$price;
			switch ($name) {
				case '1':print "Fruits and vegetables";
				break;
				case '2':print "cosmetics";
				break;
				case '3':print "Cans";
				break;
				case '4':print "Nutrition";
				break;
				case '5':print "Meat";
				break;
				case '6':print "others";
				break;
				Default: print "All categories.";
			}
		echo "\t\t\t\tPrice : ".$price;	
		}
		if(isset($_GET['cat']))
		$sql=$auth->displaystock1($_GET['cat'],"All");
		else
		if(isset($_GET['page'])) 
		$sql=$auth->displaystock1($_SESSION['Categorie'],$_SESSION['Prices']);
		else
		$sql=$auth->displaystock1($name,$price);
		$pager = new Pagination($conn,$sql,4);
		$result = $pager->paginate();
		$output[] = '<ul>';
		while ($row = mysql_fetch_array($result)) {
			$output[] = '<li><br><img src = "'.$row['pix'].'" width="101" height="100"> '.$row['name'].' : '.$row['cost'].'<br>_____________________&nbsp;&nbsp;&nbsp;&nbsp;<a href="details.php?id='.$row['stockid'].'">Details,&nbsp;&nbsp;&nbsp;</a><a href="cart.php?action=add&id='.$row['stockid'].'">Add to cart</a></li>';
		}
		$output[] = '</ul>';
		echo implode('',$output);
		echo '<p style="text-align: center;">'.$pager->FullNavigate().'</p>';
	}
?>
			</div>
		</div>	
<?
	require('site.footer.php');
?>