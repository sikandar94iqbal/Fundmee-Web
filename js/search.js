$(document).ready(function(){

  

     $('#search_btn').click(function(e){
     
     // alert('working');

     search();

     });


});


function search(){

	var type = $('#contentselect').val();
	var search_item = $('#datatext').val();

	
$.post("../search.php",
{
task : "search",

type1 : type,
search_item1 : search_item

}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	var data_json = data;
	
	if(data_json == "1"){
		//alert("success");
	 window.open ('../search.php','_self');
	}
	else if(data_json == "0"){
		alert("Wrong Cradentials");
	}

	//console.log("shit");

});



}