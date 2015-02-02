<?PHP
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username=$request->username;
$password=$request->password;
require_once("./include/membersite_config.php");

   if($fgmembersite->Login($username,$password))
   {
        echo true;
   }
   else
   		echo false;

?>