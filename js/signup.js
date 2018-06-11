$(document).ready(function(){

  

     $('#signup_button').click(function(e){
     
 signup_function();

     });


});

function signup_function(){
	var name1 = $('#name1').val();
	var password1 = $('#password1').val();
	var email1 = $('#email1').val();

	//alert(name1 + password1 + email1);
//console.log(name1);

if((name1.length == 0) || (email1.length == 0) || (password1.length==0)){
alert("empty");
}
else{
$.post("webservice/signup_web.php",
{


password : password1,
email : email1,
name : name1

}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	var data_json = data;
	console.log(data_json);
	if(data_json == "1"){
		alert("success");
	 window.open ('index.php','_self');
	}
	else if(data_json == "0"){
		alert("user exists");
	}

	//console.log("shit");

		
		});


}


}


