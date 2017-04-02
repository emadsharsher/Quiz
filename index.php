<?php
require_once("page.php");
PageHeader("Login Page");
$userInfo = array();
$count = 0;
if(isset($_POST["Submit"]))
{
	$uname = trim($_POST["uname"]);
	$pass = trim($_POST["pass"]);
	
	$file = fopen("user.txt","r");
	while(!feof($file))
	{
		$userInfo[$count]["name"] = trim(fgets($file));
		$userInfo[$count]["pass"] = trim(fgets($file));
		$userInfo[$count]["type"] = trim(fgets($file));
		
		$cname = explode(":",$userInfo[$count]["name"]);
		$cpass = explode(":",$userInfo[$count]["pass"]);
		
		if($uname == trim($cname[1]) && $pass == trim($cpass[1]))
		{
			$ctype = explode(":",$userInfo[$count]["type"]);
			if(trim($ctype[1]) == "admin")
			{
				$_SESSION["name"] = $uname;
				$_SESSION["type"] = "admin";
				header('Location: admin.php');
			}
			else
			{
				$_SESSION["name"] = $uname;
				$_SESSION["type"] = "user";
				header('Location: home.php');
			}
		}
		$count++;
	}
	echo "<h3 align='center'>Invalid Information</h3>";
}

?>
<form action="index.php" method="post">
<table align="center">
<tr>
	<th align="right">Name : </th>
	<td><input type="text" name="uname" /></td>
</tr>
<tr>
	<th align="right">Password : </th>
	<td><input type="password" name="pass" /></td>
</tr>
<tr>
	<th align="right">&nbsp;</th>
	<td><input type="submit" value="Login" name="Submit" /></td>
</tr>
</table>
</form>
<?php
pageFooter();
?>
	
