<?
	if(isset($_SESSION['permission'])){
		if($_SESSION['permission'] == 'admin'){
		header("Location:../my/".$admin);
		}
		else 
		{
		header("Location:../my/".$success);
		}
	 }
?>
