<?php
session_start();
$login=0;
$type="public";
if(isset($_SESSION['login']) && isset($_SESSION['type'])){
  $login=$_SESSION['login'];
  $type=$_SESSION['type'];
  $usname=$_SESSION['username'];
}

?>

<html>


<body id="mainBody">
    <div class="bar">
      <div class="container-fluid">
        <div class="navbar-header">
           <h class="logo">PLAY</h>

        </div>
        <div>
          <ul class="nav navbar-nav">
            <a href="#" onclick="test()">test</a>
            <?php
              if($login==1){
                echo '<li><font color="white" size="2.5px">Welcome, '.$_SESSION["username"].'&emsp;</font></li>
                <li><button type="button" onclick="logout()" class="myButton" >Log out</button></li>';
              }
              else{
                echo '<li><button type="button" class="myButton" data-toggle="modal" data-target="#myModal">Sing Up</button></li>
                <li><button type="button" class="myButton" data-toggle="modal" data-target="#myModal2">Login</button></li>';
              }
          ?>

          </ul>
        </div>
      </div>
    </div>
      <nav style="" class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
             <a href="#" class="logo2"><img src="img/logo.png" alt=""></a>
          </div>

          <div>
            <ul class="nav navbar-nav">
              <li class="active" id="home" onclick="ChangePage('home')"><a href="#">Home</a></li>
              <?php
              if($login==1){
              echo '<li class="dropdown" id="lobby">
                <a href="#" class="dropwdown-toggle" id="lobby" data-toggle="dropdown">My Lobby <span class="caret"></span></a>
                <ul style="" class="dropdown-menu">
                  <li onclick="ChangePage(\'music\')"><a href="#">Music</a></li>
                  <li><a href="#">Movie</a></li>
                </ul>
              </li>';
            }
            if($login==1 && $type=="admin"){
              echo '<li><a id="admin" href="#">Admin Panel</a></li>';
            }
            if($login==1 && $type=="musician"){
              echo "<li id='studio' onclick='ChangePage(\"studio\")'><a href='#'>Studio</a></li>";
            }
              ?>
              <li><a id="beat" href="#">Beat Down</a></li>
              <?php if($login==1){
                echo "<li id='account' onclick='ChangePage(\"account\")'><a href='#'>Account</a></li>";
              }
              ?>
              <li id="about" onclick="ChangePage('about')"><a href="#">About</a></li>
            </ul>


          </div>
        </div>



      </nav>
      <div class="container-fluid">
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div id="modalheader" class="modal-header">
          <h4 class="modal-title"><span class="glyphicon glyphicon-pencil" id="icon-signup"></span>  Sign Up </h4>
        </div>
        <div class="modal-body">
          <?php include 'signup.php';?>
        </div>
        <div class="modal-footer">
          <button type="submit" id="submit" class="btn btn-success" value="Submit" disabled>Submit <span class="glyphicon glyphicon-ok"></span></button>
        </form>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
        </div>
      </div>

    </div>
  </div>
      </div>

      <!--/login -->
      <div class="container-fluid">
        <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div id="modalheader" class="modal-header">
          <h4 class="modal-title"><span class="glyphicon glyphicon-pencil" id="icon-signup"></span>  Login </h4>
        </div>
        <div class="modal-body">
          <?php include 'login.php';?>
        </div>
        <div class="modal-footer">
          <button type="button" id="loginb" class="btn btn-success" onclick="userlogin(this)" value="Submit" disabled>Login <span class="glyphicon glyphicon-ok"></span></button>
        </form>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
        </div>
      </div>

    </div>
  </div>
      </div>
  </body>
</html>
