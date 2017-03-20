var xhr;
if (window.ActiveXObject){
  xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
  xhr = new XMLHttpRequest();
}

//Called for onchange event for username input
function callServerUser(){
  //get name value and assign to variables
  var name = document.getElementById("user").value;
  //window.alert(name);

  //Only make server call if there is data
  if ((name == null) || (name == ""))return; 

  //build url to connect to php script on server
  var url = "./user_emailCheck.php?userName=" + escape(name);

  //Create the name-value pairs that will be sent as date
  //This will be changed to add encryption function
  //var param = "userName=" + name;
  //window.alert(url);

  //Open server connection
  xhr.open("GET", url, true);
  //window.alert("has opened");

  //Create proper headers to send with the request
 // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  //Setup function for server to run when it's done
  xhr.onreadystatechange = updatePage;

  //Send the request
  xhr.send(null);
  
}

//Called in the script for onchange event for email input
function callServerEmail(){
  //get name value and assign to variables
  var email = document.getElementById("e-mail").value;
  //window.alert(name);

  //Only make server call if there is data
  if ((email == null) || (email == ""))return; 

  //build url to connect to php script on server
  var url = "./user_emailCheck.php?email=" + escape(email);

  //Create the name-value pairs that will be sent as date
  //This will be changed to add encryption function
  //var param = "userName=" + name;
  //window.alert(url);

  //Open server connection
  xhr.open("GET", url, true);
  //window.alert("has opened");

  //Create proper headers to send with the request
 // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  //Setup function for server to run when it's done
  xhr.onreadystatechange = updatePage;

  //Send the request
  xhr.send(null);
  
}

function updatePage(){
  if ((xhr.readyState==4)&&(xhr.status==200)){
    //If the username already exists, show alert box saying so
    //If it doesn't exist, do nothing
    var response = xhr.responseText;
    if (response != ""){
      window.alert(response);
    }
  }
}