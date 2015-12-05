<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>An Access Controlled Page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<div id='fg_membersite_content'>

<p>
Logged in as: <?= $fgmembersite->UserFullName() ?> <br>
Branch: <?= $fgmembersite->branch() ?>
Year: <?= $fgmembersite->year() ?>

<br><br>

<h3> Press submit only when you are sure about your choices </h3>
</p>





<br><br>

<p>
<a href='login-home.php'>Home</a>
</p>
<!-- Form Code Start -->
<div id='fg_membersite'>
<form id="electives" name="electives" method="post" action="elec.php">
<fieldset >
<legend>Courses:</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
<div class='container'>
<?php 
	$branch=$fgmembersite->branch();
	$year=$fgmembersite->year();
	$year=15-$year;
	$con= mysqli_connect('localhost','root','','dept');
	$result= mysqli_query($con,"SELECT * FROM $branch WHERE sem='2' ORDER BY Type ASC");
	$link = mysqli_connect('localhost','root','','student_data');
	$email = $fgmembersite->UserEmail(); 
	$branch= $fgmembersite->branch();
	$query = "SELECT * FROM $branch WHERE email='$email'"; 
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
for($i=0;$i<6;$i++)
{	$j=$i+1;
	if($row["core$j"]=='')
	break;
else
array_push($core,substr($row["core$j"],0,5)); 
}
}	

$i=0;$j=0;
echo"<table border=\"2px\" cellpadding=\"35px\">";
echo"<tr><td><strong>Course Code</td><td><strong>Name of the Course Name</td><td><strong>Type</td><td><strong>Credits</td><td><strong>Select</td></tr>";
while($result1= mysqli_fetch_array($result))
{	$ryear=(int)substr($result1['Code'],2,1);
	if($year==$ryear)
	{$value= $result1['Code'].' | '.$result1['Name'];
	if($result1['Type']=='Core')
	{	$trig=0;	
		for($c=0;$c<count($core);$c++){
			if(strcasecmp($core[$c], $result1['Code'])==0)
			{echo"<tr><td>".$result1['Code']."</td><td><strong>".$result1['Name']."</td><td>".$result1['Type']."</td><td>".$result1['Credits']."</td><td><input type=\"checkbox\" name=\"core$i\" value=\"$value\" checked></td></tr>";
				$trig=1;
				break;
			}
			}
			if ($trig==0) {
			echo"<tr><td>".$result1['Code']."</td><td><strong>".$result1['Name']."</td><td>".$result1['Type']."</td><td>".$result1['Credits']."</td><td><input type=\"checkbox\" name=\"core$i\" value=\"$value\"></td></tr>";	
			}
	
	$i++;
	}
	else
	{	$trig=0;
		for($c=0;$c<count($elective);$c++){
		if(strcasecmp($elective[$c], $result1['Code'])==0){
		echo"<tr><td>".$result1['Code']."</td><td><strong>".$result1['Name']."</td><td>".$result1['Type']."</td><td>".$result1['Credits']."</td><td><input type=\"checkbox\" name=\"elective$j\" value=\"$value\" checked></td></tr>";
			$trig=1;
			break;
		}
		}
		if($trig==0){
		echo"<tr><td>".$result1['Code']."</td><td><strong>".$result1['Name']."</td><td>".$result1['Type']."</td><td>".$result1['Credits']."</td><td><input type=\"checkbox\" name=\"elective$j\" value=\"$value\" ></td></tr>";	
		}
	
	$j++;
	}
}	
}
echo"<input type=\"submit\" name=\"submit\" value=\"submit\"/>";
?>

</div>
</fieldset>
</form>
<br><br>
</div>
</body>
</html>
