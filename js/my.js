var name="";
var mail="";
var pass="";
var cpass="";
var phone="";
var songid="";
var selectedPlayList="";
function bal(){
  document.getElementById("Ename").className="alert-danger";
}

function CheckErrors(field,work){
  if(work=="edit"){
    fname = document.myedfm.fname.value;
    fid = document.getElementById("Eename");
    mail = document.myedfm.mail.value;
  	mid = document.getElementById("Eeemail");
    pass = document.myedfm.pass.value;
  	pid = document.getElementById("Eepass");
  	cpass=document.myedfm.cpass.value;
  	cpid=document.getElementById("Eecpass");
    sb=document.getElementById("editsubmit");
  }
  if(work=="sign"){
  fname = document.myfm.fname.value;
  fid = document.getElementById("Ename");
  mail = document.myfm.mail.value;
	mid = document.getElementById("Eemail");
  pass = document.myfm.pass.value;
	pid = document.getElementById("Epass");
	cpass=document.myfm.cpass.value;
	cpid=document.getElementById("Ecpass");
  sb=document.getElementById("submit");}


  switch (field) {
    case "Ename":
    	if(fname.length<5){
      	fid.className="alert";
      	fid.className +=" alert-danger";
      	fid.className +=" activen";
      	fid.innerHTML="Username must be at least 5 character";
        successf=false;
    	}
    	else{
        signup(fname,fid,"user");

      }
			break;
    case "Eemail":
      if(mail.indexOf("@")>-1 && mail.indexOf(".com")>-1 ){
        signup(mail,mid,"mail");
      }
      else{
        mid.className="alert";
        mid.className +=" alert-danger";
        mid.className +=" activen";
        mid.innerHTML="Invaild Email";
				successm=false;

      }
			break;
    case "Epass":
      if(pass.length<8){
        pid.className="alert";
        pid.className +=" alert-danger";
        pid.className +=" activen";
        pid.innerHTML="Password must be at least 8 charecter";
				successp=false;

      }
      else{
        pid.innerHTML="";
        pid.className="hidden";
				successp=true;

      }
			break;
    case "Ecpass":
      if(pass!=cpass){
        cpid.className="alert";
        cpid.className +=" alert-danger";
        cpid.className +=" activen";
        cpid.innerHTML="Password Mismatch";
				successcp=false;

      }
      else{
        cpid.innerHTML="";
        cpid.className="hidden";
				successcp=true;

      }
			break;
    default:
  }

	if(successf && successm && successp && successcp){
		sb.removeAttribute("disabled");
	}
	else {
		sb.setAttribute("disabled","disabled");
	}

}

function logout(){
  var reallyLogout=confirm("Do you really want to log out?");
        if(reallyLogout){
  $.ajax({
url: 'config/Server.php',
method: 'GET',
data: {
    'logout': "do",
    'id': "something"
    },
success: function() {
    location.reload("Index.php");
}
});
}
}

function loginError(field){
  mail = document.mylfm.mail.value;
	mid = document.getElementById("lEemail");
  pass = document.mylfm.pass.value;
	pid = document.getElementById("lEpass");
  switch (field) {
    case "mail":
    if(mail !="" && mail.indexOf("@")>-1 && mail.indexOf(".com")>-1 ){
      mid.innerHTML="";
      mid.className="hidden";
      successEm=true;
    }
    else {
      mid.className="alert";
      mid.className +=" alert-danger";
      mid.className +=" activen";
      mid.innerHTML="Invaild Email";
      successEm=false;
    }

      break;
      case "pass":
      if(pass!=""){
        pid.innerHTML="";
        pid.className="hidden";
        successPa=true;
      }
      else {
        pid.className="alert";
        pid.className +=" alert-danger";
        pid.className +=" activen";
        pid.innerHTML="Empty Field";
        successPa=false;
      }
      break;
    default:
  }
  if(successEm && successPa){
		document.getElementById("loginb").removeAttribute("disabled");
	}
	else {
		document.getElementById("loginb").setAttribute("disabled","disabled");
	}

}
function signup(val,id,name){
  var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			for(i=0;i<resp.length;i++){
				if(resp[i].email==val || resp[i].username==val){
          id.className="alert";
        	id.className +=" alert-danger";
        	id.className +=" activen";
        	id.innerHTML="Already exist";
          if(name=="user"){
            successf=false;
          }
          if(name=="mail"){
            successm=false;
          }
          break;
				}
        else{
          id.innerHTML="";
      	  id.className="hidden";
          if(name=="user"){
            successf=true;
          }
          if(name=="mail"){
            successm=true;
          }
        }
			}
		}
	};
	var url="/boot/config/Server.php?work=login";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();



}

function userlogin(e) {
	mail=document.mylfm.mail.value;
  pass=md5(document.mylfm.pass.value);
	id=document.getElementById("lEpass");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);

			for(i=0;i<resp.length;i++){
				if(resp[i].email==mail && resp[i].password==pass){
          id.className="alert";
          id.className+=" alert-success"
          id.className+=" activen";
          type=resp[i].type;
          id=resp[i].id;
          name=resp[i].username;
          img=resp[i].img;
          alert("Successfully Logged In");
          $.ajax({
        url: 'config/Server.php',
        method: 'GET',
        data: {
            'login': 1,
            'id': id,
            'username': name,
            'type': type,
            'img': img
            },
        success: function() {
            location.reload("Index.php");
        }
    });
				break;
				}
				else{
          id.className="alert";
          id.className+=" alert-danger"
          id.className+=" activen";
					id.innerHTML="Incorrect email or password";
				}
				}



			}

	};
	var url="/boot/config/Server.php?work=login";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}



/*function IncludePage() {
  var z, i, elmnt, file, xhttp;
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    file = elmnt.getAttribute("include-Page");
    if (file) {
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          elmnt.innerHTML = this.responseText;
          elmnt.removeAttribute("include-Page");
          IncludePage();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      return;
    }
  }
}*/

function maketables(field,tname,purpose){
  document.getElementById(tname).innerHTML="";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    			resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<10;i++,j++){
            document.getElementById(tname).innerHTML +="<tr ><th scope='row'>"+j+"</th><td><a href='#' onclick='fetchArtist(\""+resp[i].artist+"\")' data-toggle='modal' data-target='#viewProModal'>"+resp[i].artist+"</a></td><td>"+resp[i].album+"</td><td><a href='#' onclick='makeplaylist(\""+resp[i].id+"\",\""+resp[i].title+"\",\""+resp[i].artist+"\",\""+resp[i].path+"\",\""+resp[i].img+"\")'>"+resp[i].title+"</a></td><td>"+resp[i].releasedate+"</td></tr>";
    				}
    			}
    	};
    	var url="/boot/config/Server.php?work=table&qr="+field+"&purp="+purpose;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();

}
function makealltables(field,tname,purpose){
  document.getElementById(tname).innerHTML="";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    			resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<10;i++,j++){
            document.getElementById(tname).innerHTML +="<tr ><th><span onclick='addtoPlaylist(\""+resp[i].id+"\")' class='glyphicon glyphicon-plus'></span></th><td><a href='#' onclick='fetchArtist(\""+resp[i].artist+"\")' data-toggle='modal' data-target='#viewProModal'>"+resp[i].artist+"</a></td><td>"+resp[i].album+"</td><td><a href='#' onclick='makeplaylist(\""+resp[i].id+"\",\""+resp[i].title+"\",\""+resp[i].artist+"\",\""+resp[i].path+"\",\""+resp[i].img+"\")'>"+resp[i].title+"</a></td><td>"+resp[i].releasedate+"</td></tr>";
    				}
    			}
    	};
    	var url="/boot/config/Server.php?work=table&qr="+field+"&purp="+purpose;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();

}

function addtoPlaylist(id){
  if(songExist(id)==true){
    alert("Already Playlisted");
  }
  else{}
}
function songExist(id){
  flag=false;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<resp.length;i++){
            if(resp[i].id==selectedPlayList){
              alert("ache");
              flag=true;
              break;
            }
            }
            alert(flag);

    			}
          return flag;
    	};
    	var url="/boot/config/Server.php?work=exist&qr="+id;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();
}

function fetchAccInfo(id){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {

    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    			resp=JSON.parse(xmlhttp.responseText);
    			for(i=0;i<resp.length;i++){
            if(id==resp[i].id){
              document.getElementById("acname").innerHTML=resp[i].username;
              document.getElementById("acmail").innerHTML=resp[i].email;
              document.getElementById("acphone").innerHTML=resp[i].phone;
              document.getElementById("actype").innerHTML=resp[i].type;
              document.getElementById("dispic").innerHTML="<center><img class='img-thumbnail' alt='Cinque Terre' src='img/account/"+resp[i].img+"' width='304' height='236'></center>";

            }

    				}
    			}
    	};
    	var url="/boot/config/Server.php?work=login";
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();
}

function fetchArtist(usname){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    resp=JSON.parse(xmlhttp.responseText);
    for(i=0;i<resp.length;i++){
      if(usname==resp[i].username){
        document.getElementById("artname").innerHTML=resp[i].username;
        document.getElementById("arname").innerHTML=resp[i].username;
        document.getElementById("armail").innerHTML=resp[i].email;
        maketables(usname,"artbody","artist");
        document.getElementById("fartimg").innerHTML ="<img class='img-thumbnail' alt='Cinque Terre' src='img/account/"+resp[i].img+"' width='304' height='236'>";


      }

      }
    }
};
var url="/boot/config/Server.php?work=login";
xmlhttp.open("GET", url, true);
xmlhttp.send();

}

function makeUptables(name){

  document.getElementById("upbody").innerHTML="";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    			resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<resp.length;i++){
            if(name==resp[i].artist){
            document.getElementById("upbody").innerHTML +="<tr ><th scope='row' id='"+resp[i].id+"'>"+j+"</th><td><a href='#' onclick='makeplaylist(\""+resp[i].id+"\",\""+resp[i].title+"\",\""+resp[i].artist+"\",\""+resp[i].path+"\",\""+resp[i].img+"\")'>"+resp[i].title+"</a></td><td>"+resp[i].album+"</td><td>"+resp[i].releasedate+"</td><td><span onclick='DelSong(\""+resp[i].id+"\",\""+resp[i].path+"\",\""+resp[i].img+"\")' class='glyphicon glyphicon-remove btn btn-xs'></span></td><td><span onclick='getId(\""+resp[i].id+"\")' data-toggle='modal' data-target='#SongEditModal' class='glyphicon glyphicon-pencil btn btn-xs'></span></td></tr>";
            j++;}
            }
    			}
    	};
    	var url="/boot/config/Server.php?work=table&qr="+name+"&purp=artist";
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();

}

function getId(id){
  songid=id;
}

function updateSong(){
  title=document.getElementById('usname').value;
  album=document.getElementById('ualbum').value
  date=document.getElementById('uyear').value;
  flag=true;
  if(title==""){
    flag=false;
  }
  if(album==""){
    flag=false;
  }
  if(flag==true){
    $.ajax({
  url: 'config/Server.php',
  method: 'GET',
  data: {
      'del': "up",
      'id': songid,
      'title': title,
      'album': album,
      'date' : date
      },
  success: function() {
    songid="";
      alert("Update Successful");
      document.getElementById('fclose').click();
      document.getElementById('studio').click();
  }
  });
  }
  else {
    alert("Empty Field");
  }
}

function DelSong(id,path,img){
  var reallyDel=confirm("Do you really want to Delete this track?");
        if(reallyDel){
  $.ajax({
url: 'config/Server.php',
method: 'GET',
data: {
    'del': "do",
    'id': id,
    'path': path,
    'img': img
    },
success: function() {
    alert("Delete Successful");
    document.getElementById('studio').click();
}
});
}
}

function makeplaylist(id,title,artist,path,img){
 document.getElementById("playlist").innerHTML="<li  class='current-song'><img class='pull-right' src='audio/covers/"+img+"' width='50' height='50'><a href='"+path+"'>"+title+"<br><label id='art'> -"+artist+"</label></a></li>"
 audioPlayer();
}

function PicUpload(){
  flag=true;
	if(document.myimgfm.upproFile.value.length==0){
		flag=false;
	}

	return flag;
}


function MusicUpload(){
  flag=true;
	if(document.myupfm.upFile.value.length==0){
		flag=false;
	}
	if(document.myupfm.sname.value.length==0 || document.myupfm.album.value.length==0){
		flag=false;
	}
	return flag;

}


function ChangePage(name){

  url=name+".php";
  $("#content").load(url);


  document.getElementById('home').className = "none";
  document.getElementById('beat').className = "none";
  if(document.getElementById('studio')){
    document.getElementById('studio').className = "none";
  }
  document.getElementById('about').className = "none";
  if(document.getElementById('lobby')){
  document.getElementById('lobby').className = "none";
   }
   if(document.getElementById('account')){
   document.getElementById('account').className = "none";}


   if(name=="music"){
    document.getElementById("lobby").className = "active";
   }
   else{
     document.getElementById(name).className = "active";
   }


   document.getElementById('mainBody').className="";

   if(name=="studio"){
     document.getElementById('mainBody').className="studioBody";
   }




}
function getPlayList(id){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    			resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<resp.length;i++){
            document.getElementById("listOptions").innerHTML +="<option value ='"+resp[i].id+"'>"+resp[i].name+"</option>";

            }
            getSongs();
    			}
    	};
    	var url="/boot/config/Server.php?work=list&qr="+id;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();

}

function getSongs(){
  id=document.getElementById("listOptions").value;
  selectedPlayList=id;
  document.getElementById("playButton").onclick=function(){startPlaylist(id);};
  document.getElementById("listTable").innerHTML="";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resp=JSON.parse(xmlhttp.responseText);
    			for(i=0,j=1;i<resp.length;i++){
            makeSong(resp[i].songid,j,id);
            j++;

            }
    			}
    	};
    	var url="/boot/config/Server.php?work=song&qr="+id;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();
}

function makeSong(id,j,playid){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resp2=JSON.parse(xmlhttp.responseText);
          document.getElementById("listTable").innerHTML += "<tr><th scope='row'>"+j+"</th><td><a href='#' onclick='fetchArtist(\""+resp2[0].artist+"\")' data-toggle='modal' data-target='#viewProModal'>"+resp2[0].artist+"</a></td><td>"+resp2[0].album+"</td><td><a href='#' onclick='makeplaylist(\""+resp2[0].id+"\",\""+resp2[0].title+"\",\""+resp2[0].artist+"\",\""+resp2[0].path+"\",\""+resp2[0].img+"\")'>"+resp2[0].title+"</a></td><td>"+resp2[0].releasedate+"</td><td><span onclick='removeSong(\""+id+"\",\""+playid+"\")' class='glyphicon glyphicon-remove btn btn-xs'></span></td></tr>";
          }
      };
      var url="/boot/config/Server.php?work=table&qr="+resp[i].songid+"&purp=id";
      xmlhttp.open("GET", url, true);
      xmlhttp.send();


}

function removeSong(songid,listid){
  var reallyDel=confirm("Do you really want to Remove this track From this Playlist?");
        if(reallyDel){
  $.ajax({
url: 'config/Server.php',
method: 'GET',
data: {
    'work': "RemoveFromPlaylist",
    'songid': songid,
    'listid': listid
    },
success: function() {
    alert("Successfully Removed");
    ChangePage("music");
}
});
}
}
function test(){
  $.ajax({
url: 'config/test.php',
method: 'GET',
data: {
    'work': "RemoveFromPlaylist",
    'songid': songid,
    'listid': listid
    }
});
}

function startPlaylist(id){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resp=JSON.parse(xmlhttp.responseText);
    			for(i=0;i<resp.length;i++){
            listPlay(resp[i].songid,i);
            }
    			}
    	};
    	var url="/boot/config/Server.php?work=song&qr="+id;
    	xmlhttp.open("GET", url, true);
    	xmlhttp.send();
}
function listPlay(songid,i){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resp2=JSON.parse(xmlhttp.responseText);
          if(i==0){
            document.getElementById("playlist").innerHTML="<li  class='current-song'><img class='pull-right' src='audio/covers/"+resp2[0].img+"' width='50' height='50'><a href='"+resp2[0].path+"'>"+resp2[0].title+"<br><label id='art'> -"+resp2[0].artist+"</label></a></li>"
            audioPlayer();
          }
          else{
            document.getElementById("playlist").innerHTML+="<li><img class='pull-right' src='audio/covers/"+resp2[0].img+"' width='50' height='50'><a href='"+resp2[0].path+"'>"+resp2[0].title+"<br><label id='art'> -"+resp2[0].artist+"</label></a></li>"
          }
          }
      };
      var url="/boot/config/Server.php?work=table&qr="+resp[i].songid+"&purp=id";
      xmlhttp.open("GET", url, true);
      xmlhttp.send();


}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function clearSearch(){
  maketables("all","allsong","all");
  document.getElementById("search").value="";

}
function redirect(){
  alert("hoise");
}
