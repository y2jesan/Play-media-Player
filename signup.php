<form class="form-horizontal" action="config/Server.php?work=signup" name="myfm" method="Post">
  <div class="form-group">
    <label class="control-label col-sm-2">Name:</label>
    <div class="col-sm-10">
      <input type="name"class="form-control" onkeyup ="CheckErrors('Ename','sign')" name="fname" id="fname" placeholder="Username">
    </div>
  </div>
  <div class="hidden" id="Ename">
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" onkeyup ="CheckErrors('Eemail','sign')" name="mail" id="mail" placeholder="name@example.com">
    </div>
  </div>
  <div class="hidden" id="Eemail">
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" onkeyup ="CheckErrors('Epass','sign')" name="pass" id="pass" placeholder="Enter password">
    </div>
  </div>
  <div class="hidden" id="Epass">
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" onkeyup ="CheckErrors('Ecpass','sign')" name="cpass" id="cpass" placeholder="Enter password again">
    </div>
  </div>
  <div class="hidden" id="Ecpass">
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Gender:</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
      <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
      <label class="radio-inline"><input type="radio" name="gender" value="other" checked>Other</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2"><br>Date of Birth:</label>
    <div class="col-sm-3">
      Day:
      <select class="form-control" id="day" name="day">
        <?php for($i=1;$i<=31;$i++) {?>
        <option value ="<?php echo $i; ?>"><?php echo $i;?></option><?php } ?>
      </select>
    </div>
    <div class="col-sm-3">
      Month:
      <select class="form-control" id="month" name="month">
        <?php for($i=1;$i<=12;$i++) {?>
        <option value ="<?php echo $i; ?>"><?php echo $i;?></option><?php } ?>
      </select>
    </div>
    <div class="col-sm-3">
      Year:
      <select class="form-control" id="year" name="year">
        <?php for($i=1980;$i<=2017;$i++) {?>
        <option value ="<?php echo $i; ?>"><?php echo $i;?></option><?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Phone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone" id="phone" placeholder="+8801*********">
    </div>
  </div>
