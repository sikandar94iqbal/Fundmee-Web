$(document).ready(function(){

  

     $('#signin_button').click(function(e){
     
     login();

     });


});

function login(){
	var email1 = $("#form-email").val();
	var password1 = $("#form-password").val();

	// alert(email1 + password1);

$.post("webservice/admin_signin_web.php",
{
task : "signin",

password : password1,
email : email1,

}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	var data_json = data;
	
	if(data_json == "1"){
		alert("success");
	 window.open ('admin_home.php','_self');
	}
	else if(data_json == "0"){
		alert("Wrong Cradentials");
	}

	//console.log("shit");

		
		



 




	
}

);


}