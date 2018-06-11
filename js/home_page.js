$(document).ready(function(){

  

     $('#logout_button').click(function(e){
     
     logout();

     });


});

function logout(){



$.post("webservice/logout.php",
{
task : "logout",



}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	// var data_json = jQuery.parseJSON( data );
	// //alert(data_json);
	// if(data_json=="done"){
	// 	 window.open ('login.php','_self',false)
	// }
	//console.log(data);
	
}

);


}