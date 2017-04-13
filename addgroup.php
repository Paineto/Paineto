<?
	include "site.header.php"; 
	include_once ("authconfig.php"); 
	include_once ("inc/auth.php");
	require_once ('checkadmin.php');

	$group = new auth();
	if(isset($_POST['addgp'])){
		$teamname = $_POST['name'];
		$teamlead = $_POST['lead'];
		$group->add_team($teamname,$teamlead);
		header('Refresh: 0; URL=authgroup.php');
	}
?>
	<div id="content">
		<div class="contact_form">
			<div class="form_subtitle">Greate new Group</div>
			<form id="modify" name="creategroup"  method="post">
				<input type="hidden" id="addgp" name="addgp" value="">
				<p align="center">
					<strong>Group Name:</strong><br>
					<input id="name" type="text" size="50" name="name" />
				</p>
				<p align="center">
					<strong>lead:</strong><br>
					<input id="lead" type="text" size="50" name="lead" />
				</p>
				<p align="center">
					<input type="submit" value="insert" name="group" />
					<input type="hidden" id="txtid" name="txtid" value="<?=$id?>">
				</p>
			</form>
		</div>
	</div>
<?
	include "site.footer.php";
?>