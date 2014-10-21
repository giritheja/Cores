<?PHP
require_once("./include/membersite_config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>A</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>

<?php



//Connect to mysql server
	$link = mysql_connect('localhost','collegen_mech','[O1pW{p42xHD');
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db('collegen_nitkmech');
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$course = clean($_POST['course']);
	$sort = clean($_POST['sort']);

 ?>
	
	<div id='fg_membersite_content'>
<p>




</p>


<div id='fg_membersite_content'>
<p>

<center>
<h2> National Institute of Technology Karnataka, Surathkal </h2>
<h3> Course Registration Form: </h3>


<?php

if($sort=='username')
{
    $query = "SELECT * FROM mechdept WHERE core1='$course' OR core2='$course' OR core3='$course' OR core4='$course' 
OR elective1='$course' OR elective2='$course' OR elective3='$course' ORDER BY $sort "; 
}

else
{	$query = "SELECT * FROM mechdept WHERE core1='$course' OR core2='$course' OR core3='$course' OR core4='$course' 
OR elective1='$course' OR elective2='$course' OR elective3='$course' ORDER BY $sort DESC";

}


$result = mysql_query($query);

echo "<h3>List of Students in ".$course."&nbsp;(Sorted in order of ".$sort.")</h3><br>";
echo "<table border='2' cellpadding='4' cellspacing='2'>";
echo "<tr><td>Name</td><td>Roll No</td><td>Phone No.</td><td>Fee Receipt No.</td><td>CGPA</td></tr>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results


echo "<tr><td>".$row['name']."</td><td>".$row['username']."</td><td>".$row['phone_number']."</td><td>".$row['feereceipt'].
"</td><td>".$row['cgpa']."</td></tr>";

}


echo "</table>"; //Close the table in HTML




mysql_close();

?>


</p>





<a href='login-home.php'>Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href='instructor.php'>Back to Instructor's Page</a>
</p>
</div>
</body>
</html>
