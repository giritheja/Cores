<?PHP
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
		$formvars['name'] = $request->name;
        $formvars['email'] = $request->email;
        $formvars['username'] = $request->username;
        $formvars['password'] = $request->password;
		$formvars['phone_number'] = $request->phone_number;
		$formvars['feereceipt'] = $request->feereceipt;
		$formvars['bankname'] = $request->bankname;
		$formvars['cgpa'] = $request->cgpa;
		$branch=substr($request->username,2,2);

if($formvars['username']){
	$con= mysqli_connect('localhost','root','','student_data');
	$formvars['confirmcode'] = 'y';
	$insert_query = 'insert into '.$branch.'(
                name,
                email,
                username,
                password,
				phone_number,
                confirmcode,
				feereceipt,
				bankname,
				cgpa
                )
                values
                (
                "' . $formvars['name']. '",
                "' . $formvars['email'] . '",
                "' . $formvars['username'] . '",
                "' . md5($formvars['password']) . '",
				"' . $formvars['phone_number'] . '",
                "' . $formvars['confirmcode']  . '",
				"' . $formvars['feereceipt'] . '",
				"' . $formvars['bankname'] . '",
				"' . $formvars['cgpa'] . '"
                )';
		$result=mysqli_query($con,$insert_query);
		if($result)
		echo true;
		else
			echo false;
	}else{
		echo false;
	}
 
?>   