<? 

	include_once ("inc/auth.php");

	$group = new auth();

		$result = $group->searchstock($_GET['str']);
		while($row = mysql_fetch_object($result))
		{
			echo $row->name."<br>";
		}
	
?>