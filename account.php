<?php
session_start();
 ?>
<html>
<div id="accountPage">
  <div class="container-fluid">
    <div class="row"><center><h1>Profile</h1> </center>
      <button type="button" class="btn btn-warning btn-lg pull-right" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-cog"></span></button>
      <div class="col-md-4">
        <div id="dispic">Pro Pic
        </div>
        <form action="config/Server.php?work=uploadimg" enctype="multipart/form-data" name="myimgfm" method="Post">
          <input type="file" class="form-control" name="upproFile" id="upproFile">
          <button type="submit" onclick="return PicUpload();" class="btn">Upload</button>
        </form>
        <?php
         if($_SESSION["type"]=="musician")
          echo '<h1>Rating</h1>';
          ?>
      </div>

      <div class="col-md-8">
        <form class="form-horizontal" name="accountfm" id="accountfm" method="Post">
          <div class="form-group">
            <label class="control-label col-sm-4">Username:</label>
            <div class="col-sm-6">
              <label id="acname" class="control-label">Name</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Email:</label>
            <div class="col-sm-6">
              <label id="acmail" class="control-label">Mail</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Phone:</label>
            <div class="col-sm-6">
              <label id="acphone" class="control-label">Phone</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Account Type:</label>
            <div class="col-sm-6">
              <label id="actype" class="control-label">Name</label>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>


</div>

<!--edit-->
<div class="container-fluid">
  <div class="modal fade" id="editModal" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
  <div style="background-color:#5b42ab" class="modal-header">
    <h4 class="modal-title"><span class="glyphicon glyphicon-pencil" id="icon-signup"></span>  Sign Up </h4>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" action="#" name="myedfm" method="Post">
      <div class="form-group">
        <label class="control-label col-sm-2">Name:</label>
        <div class="col-sm-10">
          <input type="name"class="form-control" onkeyup ="CheckErrors('Ename','edit')" name="fname" id="fname" placeholder="Username">
        </div>
      </div>
      <div class="hidden" id="Eename">
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" onkeyup ="CheckErrors('Eemail','edit')" name="mail" id="mail" placeholder="name@example.com">
        </div>
      </div>
      <div class="hidden" id="Eeemail">
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" onkeyup ="CheckErrors('Epass','edit')" name="pass" id="pass" placeholder="Enter password">
        </div>
      </div>
      <div class="hidden" id="Eepass">
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" onkeyup ="CheckErrors('Ecpass','edit')" name="cpass" id="cpass" placeholder="Enter password again">
        </div>
      </div>
      <div class="hidden" id="Eecpass">
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Phone:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone" id="phone" placeholder="+8801*********">
        </div>
      </div>

  </div>
  <div class="modal-footer">
    <button type="submit" id="editsubmit" class="btn btn-success" value="Submit" disabled>Submit <span class="glyphicon glyphicon-ok"></span></button>
  </form>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
  </div>
</div>

</div>
</div>
</div>
<<?php
echo '<script>fetchAccInfo("'.$_SESSION["id"].'");</script>';
 ?>



</html>
