<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username=$request->username;

require_once("./include/membersite_config.php");
	$branch=substr($username,2,2);
	$year=(int)(substr($username,0,2));//need code fixing
	$year=15-$year;//need code fixing also for sem
	$con= mysqli_connect('localhost','root','','dept');
	$result= mysqli_query($con,"SELECT * FROM $branch  ORDER BY Type ASC");
	$link = mysqli_connect('localhost','root','','student_data');
	//$email = $fgmembersite->UserEmail();
	$query = "SELECT * FROM $branch WHERE username='$username'"; 
	$out = mysqli_query($link,$query);
	$core=array();
	$elective=array();
while($row = mysqli_fetch_array($out)){   //Creates a loop to loop through results
	for($i=0;$i<4;$i++)
	{	$j=$i+1;
		if($row["elective$j"]=='')
			break;
		else
			array_push($elective,substr($row["elective$j"],0,5));
	}
	for($i=0;$i<6;$i++){
		$j=$i+1;
		if($row["core$j"]=='')
			break;
		else
			array_push($core,substr($row["core$j"],0,5)); 
	}
}	
	$i=0;$j=0;
while($result1= mysqli_fetch_array($result)){
	$ryear=(int)substr($result1['Code'],2,1);
	if($year>=$ryear)
	{if($year==$ryear&&$result1['sem']==2)
		$result1['current']=true;
	else
		$result1['current']=false;
	if($result1['Type']=='Core')
	{	$trig=0;
		$result1['username']=$username;	
		for($c=0;$c<count($core);$c++){
			if(strcasecmp($core[$c], $result1['Code'])==0)
			{$result1['selected']=true;
				$trig=1;
				break;
			}
			}
			if ($trig==0) {
			$result1['selected']=false;	
			
			}
	
	$i++;
	}
	else
	{	$trig=0;
		for($c=0;$c<count($elective);$c++){
		if(strcasecmp($elective[$c], $result1['Code'])==0){
			$result1['selected']=true;
			$trig=1;
			break;
		}
		}
		if($trig==0){
		$result1['selected']=false;	
		}
	
	$j++;
	}
$courses[]=$result1;
}	
}
$json=json_encode($courses);
echo"$json";
?>