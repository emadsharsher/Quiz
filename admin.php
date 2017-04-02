<?php
require_once("page.php");
IsValidUser("admin");

PageHeader("ADMIN");
echo "<div align='right'>Welcome, ".$_SESSION["name"];
echo "<a href='logout.php'> Logout</a>";
echo "</div>";
?>
<form action="write.php" method="POST">
<table>
<tr>
<td>enter the question:<input type="text" name="question" size="50"/></td>
</tr>
<tr>
<td>option1:<input type="checkbox"  name="opt[]" value="1" size="50"/><input type="text" name="1" size="50"/></td>
</tr>

<tr>
<td>option1:<input type="checkbox"  name="opt[]" value="2" size="50"/><input type="text" name="2" size="50"/></td>
</tr>

<tr>
<td>option1:<input type="checkbox"  name="opt[]" value="3" size="50"/><input type="text" name="3" size="50"/></td>
</tr>

<tr>
<td>option1:<input type="checkbox"  name="opt[]" value="4" size="50"/><input type="text" name="4" size="50"/></td>
</tr>

<tr>
<td><input type="submit" name="submit" value="submit"/></td>
</tr>

</table>

</form>



<?
PageFooter();
?>