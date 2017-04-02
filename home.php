<?php
require_once("page.php");
IsValidUser("user");
PageHeader("HOME");
echo "<form action='home.php' method='POST'>";
echo "<div align='right'>Welcome, ".$_SESSION["name"];
echo "<a href='logout.php'> Logout</a>";
echo "</div>";
if(!isset($_POST["submit"]))
{
$data = array();
$count = 0;
$file = fopen("qbank.txt","r");
while(!feof($file))
{
	$tmp = array();
	$tmp["ques"] = htmlspecialchars( trim(fgets($file)));
	$opt = array();
	for($i=0;$i<4;$i++)
		$opt[$i] = htmlspecialchars( trim(fgets($file)));
	shuffle($opt);
	$tmp["opt"] = $opt;
	$tmp["ans"] = explode("|",htmlspecialchars( trim(fgets($file))));
	$data[$count] = $tmp;
	$count++;
}
//print_r($data);
shuffle($data);
$_SESSION["data"]=$data;
$_SESSION["count"]=$count;
$s="[]";
for($i=0;$i<$count;$i++)
{
	$qn = $i+1;
	echo "<div><b> $qn .".$data[$i]["ques"]."</b></div>";
	$a=$data[$i]["ans"];
	if(count($a)>1)
	{
		foreach($data[$i]["opt"] as $opt)
		{
			echo "<div><input type='checkbox' name='$i$s' value='$opt' />".$opt."</div>";
		}

	}
	else
	{
		foreach($data[$i]["opt"] as $opt)
		{
		echo "<div><input type='radio' name='$i' value='$opt' />".$opt."</div>";
		}
	}
}
echo"</br>";
echo "<input type='submit' name='submit' value='Submit'/>";
}
PageFooter();
?>
</Form>

<?php
if(isset($_POST["1"]))
{
	$point=0;
	$ans=array();
	$data=$_SESSION["data"];
	$count=$_SESSION["count"];
	$anw=array();
	$ab=array();
	
	for($i=0;$i<$count;$i++)
	{
		$b=$_POST["$i"];
		if(count($b)>1)
		{
			$anw=$b;
		}
		else $ans[$i]=$b;
	}
	
	for($j=0;$j<$count;$j++)
	{
		$ab=$data[$j]["ans"];
		if(count($ab)>1)
		{
			for($k=0;$k<count($ab);$k++)
			{
				for($g=0;$g<count($ab);$g++)
				{
				if($ab[$k]==htmlspecialchars( trim($anw[$g]))) $point=$point+10;
				else continue;
				}
			}
		}
		elseif($ab[0]==htmlspecialchars( trim($ans[$j])))
		{
			$point=$point+10;
		}
		else continue;
	}
		echo "<h1>"."your score is $point"."</h1>";
}
?>
