<?php

function execute($sql){
	$conn = mysqli_connect("localhost", "root", "","play");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

function insExecute($sql){
	$conn = mysqli_connect("localhost", "root", "","play");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	if($result){
		return true;
	}else{
		return false;
	}
}

function getUSERFromDB(){
	$sql= "select * from user";
	return execute($sql);
}

function addUser($fname,$mail,$pass,$phone){

		$sql="INSERT INTO user (username,email,password,phone,type,login) values ('".$fname."','".$mail."','". $pass."','".$phone."','public',0)";

		if(insExecute($sql)){
			echo "Successfully created Account. Redirect <a href='../Index.php'>Home<a/>";
		}
		else {
			echo "hoinai";
		}

}
function getTableFromDB($qr,$purp){
	if($qr=="rel"){
	$sql= "select * from song order by releasedate desc";
	return execute($sql);}
	else if($purp=="artist"){
		$sql= "SELECT * from song WHERE artist='".$qr."'";
		return execute($sql);
	}
	else if($purp=="id"){
		$sql= "SELECT * from song WHERE id='".$qr."'";
		return execute($sql);
	}
	else if($purp=="all"){
		$sql= "SELECT * from song";
		return execute($sql);
	}
	else if($purp=="search"){
		$sql="SELECT * from song WHERE title LIKE '%".$qr."%' or album LIKE '%".$qr."%' or artist LIKE '%".$qr."%'";
		return execute($sql);
	}
}
function uploadSong($title,$album,$date,$Path,$artist,$img){
	$sql="INSERT INTO song (title,album,releasedate,path,artist,img) values ('".$title."','".$album."','".$date."','".$Path."','".$artist."','".$img."')";
	if(insExecute($sql)){
	}
	else {
		echo "server Error";
	}
}

function DelSong($id,$path,$img){
	$sql="DELETE FROM song WHERE id='".$id."'";
	insExecute($sql);
	unlink("../".$path);
	unlink("../audio/covers/".$img);
}
function upSong($id,$title,$album,$date){
	$sql="UPDATE song SET title='".$title."', album='".$album."', releasedate='".$date."' WHERE id=".$id."";
	insExecute($sql);
}

function uploadProPic($id,$img){
	$sql="UPDATE user SET img='".$img."' WHERE id=".$id."";
	insExecute($sql);
}

function getList($id){
	$sql= "SELECT * from playlistheader WHERE usid=".$id."";
	return execute($sql);
}

function getSong($id){
	$sql="SELECT * from playlistsong WHERE id=".$id."";
	return execute($sql);
}

function getListbysong($id){
	$sql="SELECT * from playlistsong WHERE songid=".$id."";
	return execute($sql);
}

function RemoveFromPlaylist($songid,$listid){
	$sql="DELETE FROM playlistsong WHERE id='".$listid."' and songid='".$songid."'";
	insExecute($sql);
}




?>
