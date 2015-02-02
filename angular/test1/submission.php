<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$con = mysqli_connect('localhost','root','','student_data');
	if(!$con) {
		die("Unable to select database");
	}

	$core=array();
	$elective=array();
	$i=0;
	$j=0;
	$k=0;
	foreach($request as $course){
		if($course->selected){
			if(!(strcmp($course->Type,"Core")))
		{$core[$j] = $course->Code.' | '.$course->Name;	
		echo"$core[$j] \n";
		$j++;
		}
		if(!(strcmp($course->Type,"Elective")))
		{$elective[$k] = $course->Code.' | '.$course->Name;	
		echo"$elective[$k] \n";
		$k++;
		
		}
		}
	}
	for($i=$j;$i<6;$i++)
	{
		$core[$i]='';
	}
	for($i=$k;$i<4;$i++)
	{
		$elective[$i]='';
	}
	$email = 'sunil@gmail.com';
	$branch ='co';	
	$db_update = "UPDATE $branch SET elective1 = '$elective[0]' , elective2 = '$elective[1]' , elective3 = '$elective[2]' , elective4 = '$elective[3]', core1 = '$core[0]' , 
core2 = '$core[1]' ,	core3 = '$core[2]' , core4 = '$core[3]', core5 = '$core[4]', core6 = '$core[5]'  WHERE email= '$email'";

	mysqli_query($con,$db_update);
?>