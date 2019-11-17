<?php  session_start(); ?>
<body>
<div class="container-fluid" id="accountPage">
  <div class="row">
    <div class="col-md-5">

      <h1>My Playlist</h1>
      <div class="panel panel-default">

      <label class="control-label col-sm-4" style="font-size:20px;color:black;">Select Playlist:</label>
      <div class="col-sm-2">
        <a href="#" data-toggle="tooltip" id="playButton" title="Click To Play this List">
          <span style="font-size:25px;color:#5b42ab;" class="glyphicon glyphicon-play">
        </span>
      </a>
      </div>
      <div class="col-sm-6">

        <select class="form-control" id="listOptions" onchange="getSongs()" name="list">
        </select>
      </div>


        <div class="panel-body">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Title</th>
            <th>Released On</th>
            <th>Remove</th>
          </tr>
        </thead>
      <tbody id="listTable">
      </tbody>
      </table>
    </div>
  </div>
  </div>
    <div class="col-md-2">
      <h1>butt</h1>
    </div>
    <div class="col-md-5">
      <input id="search" type="text" name="search" placeholder="Search..">
      <div class="btn-group">
    <button type="button" class="btn btn-success" onclick="makealltables(document.getElementById('search').value,'allsong','search')">Go</button>
    <button type="button" class="btn btn-danger" onclick="clearSearch()">Clear</button>
  </div>
      <div class="panel panel-default">
      <div class="panel-body">
    <table id="myTable" class="table table-striped table-condensed">
      <thead>
        <tr>
          <th>Add</th>
          <th onclick="sortTable(1)">Artist</th>
          <th onclick="sortTable(2)">Album</th>
          <th onclick="sortTable(3)">Title</th>
          <th onclick="sortTable(4)">Released On</th>
        </tr>
      </thead>
    <tbody id="allsong">
    </tbody>
    </table>
  </div>
    </div>
  </div>

  </div>
</div>
</body>

<?php
echo '<script>getPlayList("'.$_SESSION["id"].'");makealltables("all","allsong","all");</script>';
?>
</html>
