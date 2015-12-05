<?php 
header('Access-Control-Allow-Origin: *' );
        header('Access-Control-Allow-Credentials: true' );
        header('Access-Control-Request-Method: *');
        header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *,x-requested-with,Content-Type');
        header('X-Frame-Options: DENY');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$name=$request->name;
$symptoms=$request->symptoms;
$place=$request->place;
$gender=$request->gender;
$age=$request->age;
$con=mysqli_connect('mysql.2freehosting.com','u180536831_mt','sunny6','u180536831_mt');
$result=mysqli_query($con,"select disease,symptoms,score,vscore,nvscore from data");
$i=0;
while($result1= mysqli_fetch_array($result)){
	$dis[$i]=$result1['disease'];
	$symp[$i]=$result1['symptoms'];
	$prescore[$i]=$result1['score'];
	$prevscore[$i]=$result1['vscore'];
	$prenvscore[$i]=$result1['nvscore'];
}
$trig=0;
$j=0;
for($i=0;$i<count($dis);$i++) {
$dscore[$i]=0;
$symptomsfinal=preg_split("/[\s,]+/", $symptoms);
$keywords = preg_split("/[\s,]+/", $symp[$i]);
$sympscore = preg_split("/[\s,]+/", $prescore[$i]);
$fvscore=preg_split("/[\s,]+/", $prevscore[$i]);
$fnvscore=preg_split("/[\s,]+/", $prenvscore[$i]);
$diff=array_intersect($symptomsfinal, $keywords);
$g=0;
foreach($keywords as $gg) {
	$score[$gg]=(float)$sympscore[$g];
	$vscore[$gg]=(float)$fvscore[$g];
	$nvscore[$gg]=(float)$fnvscore[$g];
	$g++;
}
foreach($diff as $dd) {
	$dscore[$i]+=$score[$dd];
	$dvscore[$i]+=$vscore[$dd];
	$dnvscore[$i]+=$nvscore[$dd];
}
if($dscore[$i]>35) {
	
if($dvscore>$dnvscore){
	$diseases[$j]=$dis[$i]." With Viral agents";
	$j++;
} else {
	$diseases[$j]=$dis[$i]." With Non-Viral agents";
	$j++;
}
}
}
$output=json_encode($diseases);
echo"$output";
?>