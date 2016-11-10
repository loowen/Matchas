function getAccountInfo()
{
	$.ajax("bckend/getUserAccount.php", //tell it what sropt to run 
	{
		success : function(data)
		{ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
			setAccount(json);
		} 
	});
}

function getProfilePic()
{
	$.ajax("bckend/getUserProfilePic.php",
	{
		success : function(data)
		{
			var json = jQuery.parseJSON(data);
			setPics(json);
			console.log("pics", json);			
		} 
	});
}

function setPics(data)
{
	// add loop to add more pics
	$("#profpic").attr("src", data.PicID);
}

function makeAlert(message, prepend)
{
	$("#alert_message").remove();
	$(prepend).prepend(
		   '<div id="alert_message" class="alert alert-info alert-dismissable">'
         + '<a class="panel-close close" data-dismiss="alert">×</a>'
         + '<i class="fa fa-coffee"></i>' 
         + message + '</div>');
}

function setAccount(data)
{
	getProfilePic();
	console.log(data);
	$("#first_name").val(data.Firstname); //set value of element
	$("#last_name").val(data.Lastname);
	$("#email").val(data.email);
	$("#bio").val(data.Bio);

}