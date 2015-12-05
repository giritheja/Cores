<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username=$request->username;
$password=$request->password;
$pwdmd5=md5($password);
$branch=substr($username,2,2);
$link = mysqli_connect('localhost','root','root','student_data');
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = "SELECT * FROM $branch";	
$out = mysqli_query($link,$query);
while($row = mysqli_fetch_array($out))
if(strcmp($row['username'],$username))
	$result=false;
else
	if(strcmp($row['password'],$pwdmd5))
	$result=false;
	else
	$result=true;
$resultjson=json_encode($result);
echo"$resultjson"
?>