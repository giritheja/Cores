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
Email: <?= $fgmembersite->UserEmail() ?>

<br><br>

<h3> Press submit only when you are sure about your choices </h3>
</p>





<br><br>


<!-- Form Code Start -->
<div id='fg_membersite'>
<form id="electives" name="electives" method="post" action="elec.php">
<fieldset >
<legend>Core Courses:</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />


<div class='container'>

<tr><td><label>Core1</label></td><td></td></tr>

<select name="core1" id="core1">
<option value=""></option>
<option value="ME350|Heat Transfer">ME350|Heat Transfer</option>
</select>


    <span id='register_core1_errorloc' class='error'></span>
</div>

<div class='container'>

<tr><td><label>Core2</label></td><td>

<select name="core2" id="core2">
<option value=""></option>
<option value="ME351|Machine Dynamics & Vibrations">ME351|Machine Dynamics & Vibrations</option>
</select>

    <span id='register_core2_errorloc' class='error'></span>
</div>

<div class='container'>
<tr><td><label>Core3</label></td><td></td></tr>

<select name="core3" id="core3">
<option value=""></option>
<option value="ME352|Machine Shop – I">ME352|Machine Shop – I</option>
</select>
    <span id='register_core3_errorloc' class='error'></span>
</div>


<div class='container'>
<tr><td><label>Core4</label></td><td></td></tr>

<select name="core4" id="core4">
<option value=""></option>
<option value="HU300|Engineering Economics">HU300|Engineering Economics</option>
</select>
    <span id='register_core3_errorloc' class='error'></span>
</div>


</fieldset>



<br><br>
<fieldset >
<legend>Electives</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />


<div class='container'>

<tr><td><label>Elective1</label></td><td></td></tr>

<select name="elective1" id="elective1">
<option value=""></option>
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




    <span id='register_elective1_errorloc' class='error'></span>
</div>

<div class='container'>

<tr><td><label>Elective2</label></td><td>

<select name="elective2" id="elective2">
<option value=""></option>
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




    <span id='register_elective1_errorloc' class='error'></span>
</div>

<div class='container'>

<tr><td><label>Elective3</label></td><td></td></tr>

<select name="elective3" id="elective3">
<option value=""></option>
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
