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
	$link = mysql_connect('localhost','root','');
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db('collegen_nitkmech');
	if(!$db) {
		die("Unable to select database");
	}
	?>
	

<div id='fg_membersite_content'>
<p><center>
<h2> National Institute of Technology Karnataka, Surathkal </h2>
<h3> Course Registration Form: </h3>



<?php





 $sql = mysql_query("SELECT * FROM mechdept ORDER BY username");
echo "<table border='2' cellpadding='4' cellspacing='2'><tr><td>Name</td><td>Roll No</td><td>Core1</td><td>Core2</td><td>Core3</td><td>Core4</td>
<td>Elective1</td><td>Elective2</td><td>Elective3</td>";
 
 
        //$data = mysql_fetch_array($sql);

        while ($row = mysql_fetch_assoc($sql)) {
                echo "<tr><td>". $row["name"];
				echo "</td><td>". $row["username"];
				echo "</td><td>". $row["core1"];
				echo "</td><td>". $row["core2"];
				echo "</td><td>". $row["core3"];
				echo "</td><td>". $row["core4"];
                echo "</td><td>". $row["elective1"];
				echo "</td><td>". $row["elective2"];
				echo "</td><td>". $row["elective3"];
                echo "<br><tr>";
        }


		
		
mysql_close();



?>


</p>





</table>



<br><br>



<br><br>

<table border='1' cellpadding='25' cellspacing='4'>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Sign. of Faculty Advisor </td>
<td>Sign of HOD with Seal </td>
</tr>
</table>

<p>
<a href='login-home.php'>Home</a>
</p>
</div>
</body>
</html>
