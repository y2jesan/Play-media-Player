<form class="form-horizontal"action="#" name="mylfm" method="Post">

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="mail" onkeyup="loginError('mail')" id="mail"  placeholder="name@example.com">
    </div>
  </div>
  <div class="hidden" id="lEemail">
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" onkeyup="loginError('pass')" id="pass" placeholder="Enter password">
    </div>
  </div>
  <div class="activen" id="lEpass">
  </div>
