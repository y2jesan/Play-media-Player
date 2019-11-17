<?php include 'header.php';?><br>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    	#playlist{
    		color: white;
    	}
		#playlist li a{
    		color:white;
    		text-decoration: none;
    	}
		#playlist .current-song a{
    		color:red;
		}
		table, th, td {
    		border: 1px solid black;
    		position: relative;
    		background: rgba(0,0,0,0.3);
		}
	</style>
</head>
<body>
<br>
<div class="page">
<form allign="center">
	<table align="center" style="width:50%" border="1px" bgcolor="#282929">
	<tr>
		<td>
		<p>Now Playing</p>
		</td>
		<td>
		<p>Current Playlist</p>
		</td>
	</tr>
	<tr>
		<td>
			<center><audio src="" controls id="audioPlayer">
        	Sorry, your browser doesn't support html5!
    		</audio></center>
		</td>
		<td>
			<ul class="mvi" id="playlist">
        		<li  class="current-song"><a href="audio/Aniket Prantor.mp3">Aniket Prantor</a></li>
        		<li><a href="audio/Inis Mona.mp3">Inis Mona</a></li>
        		<li><a href="audio/Numb.mp3">Numb</a></li>
    		</ul>
    		<script src="https://code.jquery.com/jquery-2.2.0.js"></script>
    		<script src="audioPlayer.js"></script>
    		<script>audioPlayer();</script>
		</td>
	</tr>	
</table>
</form>
</div>
</body>
<!html>
