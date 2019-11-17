<?php session_start(); ?>
<body>
  <div>
  <div class="container-fluid" id="studioBody">
    <h1>Studio</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">All Uploads</div>
          <div class="panel-body">
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Album</th>
                  <th>Released On</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </thead>
            <tbody id="upbody">
            </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Posts</div>
          <div class="panel-body">Panel Content</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Upload</div>
          <div class="panel-body">
<form class="form-horizontal" action="config/Server.php?work=upload" enctype="multipart/form-data" name="myupfm" method="Post">
  <div class="form-group">
    <label class="control-label col-sm-2">Song Title:</label>
    <div class="col-sm-10">
      <input type="name"class="form-control" name="sname" id="sname" placeholder="song">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Album:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="album" id="album" placeholder="album">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Release Date:</label>
    <div class="col-sm-10">
      <select class="form-control" id="year" name="year">
        <?php for($i=1950;$i<=2017;$i++) {?>
        <option class="form-control" value ="<?php echo $i; ?>"><?php echo $i;?></option><?php } ?>
      </select>
    </div>


  </div>
    <div class="form-group">
    <label class="control-label col-sm-2">Select File:</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="upFile" id="upFile">
    </div>
  </div>


		<div class="form-group">
		<label class="control-label col-sm-2">Select Album Art</label>
		<div class="col-sm-10"><br>
			<input type="file" class="form-control" name="upimgFile" id="upimgFile">
		</div>
	</div>

  <div class="form-group">
    <label class="control-label col-sm-2"></label>
    <div class="col-sm-10">
      <button type="submit" onclick="return MusicUpload();" class="btn btn-info">Upload</button>
    </div>
  </div>

</form>
</div>
		  </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Song edit-->
  <div class="container-fluid">
    <div class="modal fade" id="SongEditModal" role="dialog">
  <div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div style="background-color:#5b42ab" class="modal-header">
      <h4 class="modal-title"><span class="glyphicon glyphicon-pencil" id="icon-signup"></span>  EDIT </h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" name="songeditfm" method="Post">
        <div class="form-group">
          <label class="control-label col-sm-2">Song Title:</label>
          <div class="col-sm-10">
            <input type="name"class="form-control" name="sname" id="usname" placeholder="song">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" >Album:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="album" id="ualbum" placeholder="album">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Release Date:</label>
          <div class="col-sm-10">
            <select class="form-control" id="uyear" name="uyear">
              <?php for($i=1950;$i<=2017;$i++) {?>
              <option class="form-control" value ="<?php echo $i; ?>"><?php echo $i;?></option><?php } ?>
            </select>
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="updateSong();" class="btn btn-info">Update</button>
    </form>

      <button type="button" id="fclose" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
    </div>
  </div>

  </div>
  </div>
  </div>
</div>

</body>
<?php
echo '<script>makeUptables("'.$_SESSION["username"].'");</script>';
?>

</html>
