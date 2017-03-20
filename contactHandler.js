/*
File name: contactHandler.js
Authors: Blake Kappel, Brian Bargas
Date created: 09 Nov 2016
Date modified: 08 Dec 2016
*/

function thankYou(){
  var fname = document.getElementById("fname").value; //$("#fname").val();
  var lname = document.getElementById("lname").value; //$("#lname").val();
  var email = document.getElementById("email").value; //$("#email").val();
  var message = document.getElementById("message").value; //$("#message").val();

	var emailVal = /^.+@.+\..+$/;
	if ((fname == "") || (lname == "") || (email == "") || (message == "")) {
		window.alert("Please fill out all fields in the form.");
                return false;
	}
	
	else if (email.match(emailVal) == null){
		window.alert("Plese enter a valid email.");
                return false;
	}
	
	else{
		//window.alert("Thank you for sending us your inquiry!");
                return true;
	}
}
