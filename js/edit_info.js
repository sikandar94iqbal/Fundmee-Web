$(document).ready(function(){

  

     $('#edit_btn').click(function(e){
   
   // alert('hello');
      edit();

     });

     $('input[type=file]').change(function () {
   alert(this.files[1].mozFullPath);
});


});

function edit(){
	var name = $("#name_id").val();
	var email = $("#email_id").val();
	var company = $("#company_id").val();
	var password= $("#password_id").val();
	var location = $("#loc_id").val();
	var biography = $("#biography_id").val();

	var image = $('#exampleTextarea').val();
// var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
   ///alert(name + " " + email + " " + company + " " + password + " " + location + " " + biography+ " " + filename);


$.post("webservice/edit_profile_web.php",
{
task : "edit",

name_id : name,
email_id : email,
company_id : company,
password_id : password,
loc_id : location,
biography_id : biography,
image_id : image


}
).fail(

function(){
	console.log("ERROR");
}

).done(

function(data){
	var data_json = data;
alert(data_json);

	console.log(data_json);

		
	});

}