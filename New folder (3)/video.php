<?php include 'header.php';?><br>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie</title>
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
//<div class="page">
<form>
	<table align="center" style="width:75%" border="1px" bgcolor="#282929">
	<tr>
		<td>
		<p>Now Playing</p>
		</td>
		<td>
		<p>Movies</p>
		</td>
	</tr>
	<tr>
		<td>
			<center><video width="640" height="360" controls id="audioPlayer">
  			<source src="" type="video/mp4">
			Your browser does not support the video tag.
			</video></center>
		</td>
		<td>
			<ul class="mvi" id="playlist">
        		<li class="current-song"><a href="video/Justice League Trailer(2017).mp4">Justice League Trailer(2017)</a></li>
        		<li><a href="video/Pirates of the Caribbean- Dead Men Tell No Tales Official Teaser Trailer(2017).mp4">Pirates of the Caribbean- Dead Men Tell No Tales Official Teaser Trailer(2017)</a></li>
        		<li><a href="video/THE BOSS BABY-Trailer.mp4">The Boss Baby-Trailer</a></li>
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
