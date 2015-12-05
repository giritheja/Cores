<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<?php



//Connect to mysql server
	$link = mysql_connect('localhost','root','');
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db('student_data');
	if(!$db) {
		die("Unable to select database");
	}
	$email = $fgmembersite->UserEmail(); 
	$branch= $fgmembersite->branch();
	$query = "SELECT * FROM $branch WHERE email='$email'"; 
$result = mysql_query($query);


$courses=array();

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
for($i=0;$i<4;$i++)
{	$j=$i+1;
if($row["elective$j"]=='')
	break;
else
array_push($courses,$row["elective$j"]);
}
for($i=0;$i<6;$i++)
{	$j=$i+1;
	if($row["core$j"]=='')
	break;
else
array_push($courses,$row["core$j"]);; 
}
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Home page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<div id='fg_membersite_content'>
<h2>Home Page</h2>
<h3>Welcome back <?= $fgmembersite->UserFullName();?>!
</br>Branch:<?= $fgmembersite->branch();?>
</br>Year:<?= $fgmembersite->Year();?></h3>
<p><a href='change-pwd.php'>Change password</a></p>
</div>
<?php if(count($courses)>0)
echo"<p><a href='access-controlled.php'>Change/Drop Courses</a></p>";
else
echo"<p><a href='access-controlled.php'>Select Courses</a></p>";
?>
<br>
<p><a href='electives.php'>View Submitted Choices</a></p>

<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
</body>
</html>
