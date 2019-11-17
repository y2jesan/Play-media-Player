<pre>
<?php
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$mail=$_REQUEST['mail'];
$pass=$_REQUEST['pass'];
$cpass=$_REQUEST['cpass'];
$phone=$_REQUEST['phone'];
print_r ($_REQUEST);
if (empty($fname) || empty($lname) || empty($mail) || empty($pass) || empty($cpass) || empty($phone)){
	echo "Please Fill All Fields";
}
else if(strpos($mail,"@")==false){
	echo "Invalid Email Format";
}
else if($pass != $cpass){
	echo "Password Didn't Match";
}
else if(!Checkdate($_REQUEST["month"],$_REQUEST["day"] , $_REQUEST["year"])){
	echo "Invalid Date";
}
?>
</pre>