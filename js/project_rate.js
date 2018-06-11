$(document).ready(function(){

  

 //     $('#rate').click(function(e){
   
 // rate();

 //     });

 


});

function rate(value,proj_id1,user_id1,author_id1) {

var val = value;

// alert(proj_id1+"  value is lit nigga " + val);

// alert(user_id1+" is lit nigga " + author_id1);

$.post("webservice/rating_web.php",
{
task : "rate",

project_id : proj_id1,
user_id : user_id1,
author_id : author_id1,
rating : value,



}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	var data_json = data;
//alert(data_json);

	console.log(data_json);

		
	});



}