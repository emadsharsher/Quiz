<?php

session_start();
	//echo "hello";
	$point=0;
	$ans=array();
	$data=$_SESSION["data"];
	$count=$_SESSION["count"];
	
	for($i=0;$i<$count;$i++)
	{
		$ans[$i]=$_POST["$i"];
	}
	
	
	
	for($j=0;$j<$count;$j++)
	{
		if($data[$j]["ans"]==htmlspecialchars( trim($ans[$j])))
		{
			$point++;
		}
		else continue;
	}
		echo "your score is $point";

?>