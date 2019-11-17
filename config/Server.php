<?php
session_start();
include_once('functions.php');

if($_REQUEST['work']=="signup"){
$fname=$_REQUEST['fname'];
$mail=$_REQUEST['mail'];
$pass=$_REQUEST['pass'];
$pass = md5($pass);
$cpass=$_REQUEST['cpass'];
$cpass = md5($cpass);
$phone=$_REQUEST['phone'];
		if (empty($fname) || empty($mail) || empty($pass) || empty($cpass) || empty($phone)){
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
		else {
			addUser($fname,$mail,$pass,$phone);
		}

}
if($_REQUEST['work']=="login"){
	$jsonData= getUSERFromDB();
	echo $jsonData;
}
if($_REQUEST['work']=="table"){
	$Data= getTableFromDB($_REQUEST["qr"],$_REQUEST["purp"]);
	echo $Data;
}
if($_REQUEST['work']=="upload"){
	$target_dir = "../audio/";
	$target_dir2 = "../audio/covers/";
	$_FILES["upimgFile"]["name"]=$_POST["album"].".jpg";
	$target_file = $target_dir . basename($_FILES["upFile"]["name"]);
	$target_file2 = $target_dir2 . basename($_FILES["upimgFile"]["name"]);



	$uploadOk = 1;
	//Check if image file is a actual image or fake image
	if($_FILES["upimgFile"]["type"]=="image/jpeg" || $_FILES["upimgFile"]["type"]==""){

	}
	else{
		echo "Invalid Album art<br>";
	  $uploadOk = 0;
	}
	if($_FILES["upFile"]["type"]!="audio/mp3"){
	  echo "Sorry, audio file only<br>";
	  $uploadOk = 0;
	}


	if (file_exists($target_file)) {
	    echo "Sorry, file already exists<br>";
	    $uploadOk = 0;
	}
	if ($_FILES["upFile"]["size"] > 200000000) {
	    echo "File size exceeded<br>";
	    $uploadOk = 0;
	}
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded<br>";
	}
	if($uploadOk != 0)
	{
		move_uploaded_file($_FILES["upFile"]["tmp_name"],$target_file);
		move_uploaded_file($_FILES["upimgFile"]["tmp_name"],$target_file2);
		$Path="audio/". basename($_FILES["upFile"]["name"]);
		$img=basename($_FILES["upimgFile"]["name"]);
		uploadSong($_POST["sname"],$_POST["album"],$_POST["year"],$Path,$_SESSION["username"],$img);
		echo "Successfully Uploaded. Redirect <a href='../Index.php'>Home<a/>";
	}
}

if($_REQUEST['work']=="uploadimg"){

	$target_dir = "../img/account/";
	$_FILES["upproFile"]["name"]=$_SESSION["username"].".jpg";
	$target_file = $target_dir . basename($_FILES["upproFile"]["name"]);


	$uploadOk = 1;
	//Check if image file is a actual image or fake image
	if($_FILES["upproFile"]["type"]!="image/jpeg"){
		echo "Sorry, Image file only<br>";
	}



	if ($_FILES["upproFile"]["size"] > 200000) {
	    echo "File size exceeded<br>";
	    $uploadOk = 0;
	}
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded<br>";
	}
	if($uploadOk != 0)
	{
		$_FILES["upproFile"]["name"]=$_SESSION["username"].".jpg";
		move_uploaded_file($_FILES["upproFile"]["tmp_name"],$target_file);

		$img=basename($_FILES["upproFile"]["name"]);
	  uploadProPic($_SESSION["id"],$img);
		echo "<script>alert('Pic Changed');window.location = '../Index.php';document.getElementById('studio').click();</script>";
	}
}

if($_REQUEST['work']=="list"){
	$data= getList($_REQUEST['qr']);
	echo $data;
}
if($_REQUEST['work']=="exist"){
	$data= getListbysong($_REQUEST['qr']);
	echo $data;
}
if($_REQUEST['work']=="song"){
	$data= getSong($_REQUEST['qr']);
	echo $data;
}
if(isset($_GET["work"])){
if($_GET["work"]=="RemoveFromPlaylist"){
RemoveFromPlaylist($_GET["songid"],$_GET["listid"]);
unset($_GET["work"]);
unset($_GET["songid"]);
unset($_GET["listid"]);
}}

if(isset($_GET["del"])){
if($_GET["del"]=="do"){
	DelSong($_GET["id"],$_GET["path"],$_GET["img"]);
	unset($_GET["del"]);
	unset($_GET["id"]);
	unset($_GET["path"]);
	unset($_GET["img"]);
}
}

if(isset($_GET["del"])){
if($_GET["del"]=="up"){
	upSong($_GET["id"],$_GET["title"],$_GET["album"],$_GET["date"]);
	unset($_GET["del"]);
	unset($_GET["id"]);
	unset($_GET["album"]);
	unset($_GET["date"]);
}
}

if(isset($_GET["login"])){
	$_SESSION["login"]=$_GET["login"];
	$_SESSION["type"]=$_GET["type"];
	$_SESSION["id"]=$_GET["id"];
	$_SESSION["username"]=$_GET["username"];
	$_SESSION["img"]=$_GET["img"];
}
if(isset($_GET["logout"])){
		session_unset();
		session_destroy();
}



?>
