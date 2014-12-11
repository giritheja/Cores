<?PHP
require_once("./include/membersite_config.php");

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


<br><br>

<h3> Press submit only when you are sure about your choices </h3>
</p>





<br><br>


<!-- Form Code Start -->
<div id='fg_membersite'>
<form id="instructor" name="instructor" method="post" action="ins.php">

<fieldset >
<legend>Instructor's List</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
<?php 
	$con=mysqli_connect('localhost','root','','dept');
	$option=mysqli_query($con,'SELECT Code,Name FROM co ORDER BY Code ASC');
	//Need to come up with code so as to carry out the above query on multiple tables.
	
	?>
<div class='container'>

<tr><td><label>Select Course</label></td><td></td></tr>

<select name="course" id="course">
<?php 
	while ($options=mysqli_fetch_array($option)) 
	{ 	echo"<option value='".$options["Code"].' | '.$options["Name"]."'>".$options["Code"].' | '.$options["Name"]."</option>";
		}
?>
</select>




    <span id='register_course_errorloc' class='error'></span>
</div>

<div class='container'>

<tr><td><label>Sort In Order of</label></td><td>

<select name="sort" id="sort">
<option value="username">Roll No</option>
<option value="cgpa">CGPA</option>
</select>




    <span id='register_elective1_errorloc' class='error'></span>
</div>



<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>







<br><br>
<p>
<a href='login-home.php'>Home</a>
</p>
</div>
</body>
</html>
