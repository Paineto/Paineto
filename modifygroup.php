<?php include "site.header.php"; 
	include_once ("authconfig.php"); 
	include_once ("inc/auth.php");
	require_once ('check.php');
	
	$group = new auth();
	if(isset ($_GET['id']))
	$id = $_GET['id'];
	else
	$id=$_POST['txtid'];
	
	if(isset($_POST['modify'])){
		$teamname = $_POST['name'];
		$teamlead = $_POST['lead'];
		$status = $_POST['status'];
		$group->modify_team($id,$teamname, $teamlead, $status);
		header("Location: ../my/authgroup.php");	
		exit;	
	}
?>
	<div id="content">
		<div class="contact_form">
			<div class="form_subtitle">Modify Group</div>
			<form id="modify" name="modifygroup" method="post">
				<input type="hidden" id="modify" name="modify" value="">
				<p align="center">
					<strong>Group Name:</strong><br>
					<input id="name" type="text" size="50" name="name" />
					</p>
				<p align="center">
					<strong>lead:</strong><br>
					<input id="lead" type="text" size="50" name="lead" />
				</p>
				<p align="center">
					<strong>status:</strong><br>
					<input id="status" type="text" size="50" name="status" />
				</p>					
				<p align="center">
					<input type="submit" value="update" name="group" />
					<input type="hidden" id="txtid" name="txtid" value="<?=$id?>">
				</p>
			</form>
		</div>
	</div>
<?
	include "site.footer.php";
?>