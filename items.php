<?	
	require('siteadmin.header.php');
	include_once ("inc/auth.php");
	include('checkadmin.php');
	$auth= new auth();
?>
		<!-- CSS -->
	<link rel="stylesheet" href="css/form.css" type="text/css" />
		<!-- JavaScript -->
	<script type="text/javascript" src="scripts/wufoo.js"></script>
	<div id="container">
		<div class="info">
			<h2>Add New Item</h2>
		</div>
		<div>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><a href="adminindex.php"><img src="buttons/button1up.png" border="0" id="button1" vspace="1" hspace="1"></a><a href="items.php"><img src="buttons/button2up1.png" border="0" id="button2" vspace="1" hspace="1"></a><a href="purchase.php" ><img src="buttons/button3up1.png" border="0" id="button3" vspace="1" hspace="1"></a><a href="sales.php" ><img src="buttons/button4up1.png" border="0" id="button4" vspace="1" hspace="1"></a><a href="logout.php" ><img src="buttons/button5up1.png" border="0" id="button5" vspace="1" hspace="1"></a><br></td>
				</tr>
			</table>
		</div>
		<form id="form1" name="form1" class="wufoo " enctype="multipart/form-data" autocomplete="on"method="POST" ">
<?
	if (isset($_POST['_submit_check'])){
		$name = $_POST["name"];
		$info = $_POST["info"];
		$sn = $_POST["sn"];
		$categorie = $_POST["categorie"];
		$whouse =$_POST["whouse"];
		$package = $_POST["packid"];
		$cost = $_POST["cost"];
		$filepath=$_POST['fileName'];

		$auth->connect();
		if($sn == 0){		  
?>
			<div align="center" style="border:2px solid red">
				<b>enter serial number</b>
			</div>
<?
		}
		else {
			$result = $auth->displaystock($sn,'sn');
			$row = mysql_num_rows($result);
			if($row > 0){
?>
			<div align="center" style="border:2px solid red">
				<b>Item already defined</b>
			</div>		
<?
			}
			else{
				$auth->insertstock($name, $info, $sn, $categorie,$package, $cost,$whouse ,$filepath);
?>
			<div align="center" style="border:2px solid red">
				<b>item inserted</b>
			</div>	
<?
				print "    \n\n\n"; 
			}

		}
	}
?>
			<div class="info">
				<h4><a href="reportstock.php">Go To Report</a></h4>
			</div>
			<ul>
				<li>
<?
echo ' <input type="file" name="file" size="30" style="cursor:hand;"/> <br /> ';
echo '<input type="submit" name="action" value="Upload" />';

	if(isset($_POST['action']))
	{
		    $uploaddir = "../my/images/";
		
			$filename = $_FILES['file']['name'];
			$filetmp  = $_FILES['file']['tmp_name'];
			$filesize = $_FILES['file']['size'];
			$filetype = $_FILES['file']['type'];
			$ext = substr(strrchr($filename, "."),1);
			$conf = $uploaddir . $filename;
            $filepath = $uploaddir . $filename;
		if ($filename != "")
		{
		
			if (!file_exists($filepath))
			{
				if ($ext == "jpg" || $ext == "gif" || $ext == "tiff" || $ext == "png" || $ext == "bmp")
				{
					if($filesize < "500000")
					{
						$upload = move_uploaded_file($filetmp, $filepath);
						echo '<font color=blue>'. $filename . ' <i>was successfully uploaded...</font><br />';	
					}
					else
					{
						echo '<font color=red>'.$filename . ' <i>greater than the maximum file size allowed...</font><br />';
					}
				}
				else
				{
					echo '<font color=red>'. $filename . ' <i>is invalid file type...</font><br />';
				}	
			}
			else
			{
				echo $filename . ' <i>already exists...</i><br />';
			}
		}
 
?>
					<input type="hidden" name="fileName" value="<?=$filepath?>"/> 
					<img src = "<?php echo $filepath;?>" width="200" height="300">
<?php
    }
    else {
     $filepath="none";	
?>
					<input type="hidden" name="fileName" value="<?=$filepath?>"/> 
<?  
	}
?>
				</li>
				<li id="foli1" 	>
					<label class="desc" >
						Item
					</label>
					<div>
						<input name="name" type="text" class="field text medium" 	maxlength="255" tabindex="1"/>
					</div>
				</li>	
				<li id="foli1" >
					<label class="desc">
						SN
					</label>
					<div>
						<input  name="sn" type="text" class="field text medium" value="" maxlength="255" tabindex="2" />
					</div>
				</li>
				<li id="foli3" >
					<label class="desc" >
						Description
					</label>
					<div>
						<textarea  name="info" class="field textarea small" rows="10" cols="50"	tabindex="3"></textarea>
					</div>
				</li>
				<li id="foli0" >
					<label class="desc">
						Appraised Value
					</label>
					<span class="symbol">$</span>
					<span>
						<input 	name="cost" type="text" class="field text currency" size="10" tabindex="4" /> 	
						<label for="Field0">Dollars</label>
					</span>					
				</li>
				<li id="foli6" >
					<label class="desc"  for="Field6">
						ware house
					</label>
					<div>
						<input 	name="whouse" type="text" class="field text medium" maxlength="255" 	tabindex="5" />
					</div>
				</li>
				<li id="foli7" >
					<label class="desc">
						Categorie
					</label>
					<div>
						<select name="categorie" 		class="field select medium" 		tabindex="6" > 						
							<option value="1" >
								Fruits and vegetables
							</option>
							<option value="2" >
								cosmetics
							</option>
							<option value="3" >
								Cans
							</option>
							<option value="4" >
								Nutrition
							</option>
							<option value="5" >
								Meat And chicken
							</option>
							<option value="56" >
								others
							</option>							
						</select>
					</div>
				</li>
				<li id="foli9">
					<label class="desc" >
						package?
					</label>
					<div class="col">
						<input  name="packid" type="hidden" value="" />				
						<input 	name="packid" type="radio" class="field radio" value="1" tabindex="7" />
						<label class="choice" for="Field9_0" >
							unit
						</label>					
						<input name="packid" type="radio" class="field radio" value="2" tabindex="8" />
						<label class="choice" for="Field9_1" >
							box
						</label>					
						<input name="packid" type="radio" class="field radio" value="3" tabindex="9" />
						<label class="choice" for="Field9_1" >
							Kg
						</label>												
					</div>
				</li>
				<li class="buttons">
					<input id="saveForm" class="btTxt submit"  type="submit"  name="add" value="Submit" tabindex="10" />
					<input type="hidden" name="_submit_check" value="1"/> 
				</li>
				<li style="display:none">
					<label for="comment">Do Not Fill This Out</label>
					<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
				</li>
			</ul>
		</form>
	</div><!--container-->
<?	
	require('siteadmin.footer.php');
?>