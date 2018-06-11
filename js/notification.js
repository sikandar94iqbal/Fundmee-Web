$(document).ready(function(){

  

     $('#back_id').click(function(e){
  //alert('working');
   notif();

     });


});

function notif(){
var project_id1 = $('#project_id').val();
var backer_id1 = $('#backer_id').val();
var author_id1 = $('#author_id').val();
var amount_id1 = $('#amount_id').val();
var temp_back_id1 = $('#temp_back_id').val();

//alert(project_id + " " + backer_id + " " + author_id + " " + amount_id);

$.post("webservice/back_project_web.php",
{
task : "back_project",

project_id : project_id1,
backer_id : backer_id1,
author_id : author_id1,
amount_id : amount_id1,
temp_back_id : temp_back_id1

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
	 window.open ('home.php','_self');
	}
	else if(data_json == "0"){
		alert("something went wrong!");
	}

	//console.log("shit");
});
}