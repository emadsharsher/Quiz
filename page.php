<?php
session_start();
function PageHeader($title)
{
?>
<html>
<head>
	<title><?=$title?></title>
</head>
<body>
<table align="center" width="800">
<tr>
	<td align="center"><h1>ONLINE QUIZ MGT. SYSTEM</h1> <hr /></td>
</tr>
<tr>
	<td>
<?php
}
function PageFooter()
{
?>
	</td>
</tr>
<tr>
	<td align="center">Copyright to AIUB, 2015</td>
</tr>
</table>
</body>
</html>
<?php
}
function IsValidUser($type)
{
	if(!isset($_SESSION["type"]))
		header('Location: logout.php');
	if($_SESSION["type"] != $type)
		header('Location: logout.php');
}
?>