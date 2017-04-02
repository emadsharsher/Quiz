<?php
$ques=$_POST["question"];
$opt1=$_POST["1"];
$opt2=$_POST["2"];
$opt3=$_POST["3"];
$opt4=$_POST["4"];
$an=$_POST["opt"];
$ans=array();
$a=array();
for($i=1;$i<5;$i++)
{
	$ans[$i-1]=$_POST[$i];
}

for($i=0;$i<count($an);$i++)
{
$a[$i]=$ans[($an[$i])-1];	
}
$res=implode("|",$a);

$file=fopen("qbank.txt","a+");
fwrite($file,"\r\n".$ques);
fwrite($file,"\r\n".$opt1."\r\n");
fwrite($file,$opt2."\r\n");
fwrite($file,$opt3."\r\n");
fwrite($file,$opt4."\r\n");
fwrite($file,$res);
fclose($file);

echo "Update Successful";
echo "<a href='logout.php'> Logout</a>";
?>