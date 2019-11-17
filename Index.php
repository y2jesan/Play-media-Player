<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Play</title>

    <!-- Bootstrap -->
    <link href="css/style.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script stype="text/javascript" src="js/my.js"></script>
    <script stype="text/javascript" src="js/md5.js"></script>


    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>




  </head>
  <?php include 'header.php';?>




  <div id="content">
  </div>



    <?php include 'footer.php';?>
    <script>
    document.getElementById('home').click();
    </script>

    <!--view profile-->
    <div class="container-fluid">
      <div class="modal fade" id="viewProModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background-color:#5b42ab" class="modal-header">
        <h4 class="modal-title" id="artname"> Login </h4>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
          <center><div id="fartimg"></div><h1>Rating</h1></center>
        </div>
        <div class="col-md-6">
              <label class="control-label">Username:</label>
                <label id="arname" class="control-label">Name</label><br>
              <label class="control-label">Email:</label>
                <label id="armail" class="control-label">Mail</label>
            </div>


            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Artist</th>
                  <th>Album</th>
                  <th>Title</th>
                  <th>Released On</th>
                </tr>
              </thead>
            <tbody id="artbody">
            </tbody>
            </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
      </div>
    </div>
      </div>
  </div>
  </div>


</html>
