<html>

  <style>
    	#playlist{
    		color: white;
        overflow-y: scroll !important;
    	}
		#playlist li a{
    		color:white;
    		text-decoration: none;
      	}
		#playlist .current-song a{
    		color:black;
        font-weight: 2px;
		}
    #art{
      color:white;
      font-size:10px;
    }
    audio{
      width: 80%;
      padding-top: 33px !important;
      background-color: #5b42ab !important;
      color:inherit: #5b42ab !important;
}
	</style>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-10">
      <audio src="" controls id="audioPlayer">
        	Sorry, your browser doesn't support html5!
    		</audio>
      </div>
        <div class="col-md-2">
			<ul class="vertical-menu pull-right" id="playlist">
    		</ul>
      </div>
      <script src="js/jquery-2.2.0.js"></script>
      <script src="audioPlayer.js"></script>

</div>
</div>
</html>
