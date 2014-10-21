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


<div class='container'>

<tr><td><label>Select Course</label></td><td></td></tr>

<select name="course" id="course">
<option value="ME350|Heat Transfer">ME350|Heat Transfer</option>
<option value="ME351|Machine Dynamics & Vibrations">ME351|Machine Dynamics & Vibrations</option>
<option value="ME352|Machine Shop – I">ME352|Machine Shop – I</option>
<option value="HU300|Engineering Economics">HU300|Engineering Economics</option>
<option value="1">E1</option>
<option value="2">E2</option>
<option value="3">E3</option>
<option value="4">E4</option>
<option value="5">E5</option>
<option value="6">E6</option>
<option value="7">E7</option>
<option value="8">E8</option>
<option value="9">E9</option>
<option value="10">E10</option>
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
