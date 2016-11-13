
function getProfilePic()
{
	$.ajax("../bckend/getUserProfilePic.php", //tell it what sropt to run 
	{
		success : function(data)
		{ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
			setPic(json);
		}
	});
}

function setPic(data)
{
	var i = 0;
	while (i < data.length)
	{
		if (data[i].ProfPic == 1)
		{
			console.log("LOL", data[i].PicID);	
			$("#popup_pic").attr("src", "../" + data[i].PicID);
			break;
		}
		i++;
	}
}

function getProfile(user)
{
	data = {}; //create POST array to send
	
	data.user = user; //add user key will be $_POST['user']
	$.ajax("../bckend/getUserProfile.php", //tell it what script to run 
	{
		type : "POST", //data type
		data : data, //actual data
		success : function(data){ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
			setProfile(json);
			setPopPics(user);
		} 
	});
}

function setPopPics(user)
{
	data = {};

	data.user = user;
	$.ajax("../bckend/getUserPics.php", //tell it what script to run 
	{
		type : "POST", //data type
		data : data, //actual data
		success : function(data){ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
		} 
	});
}

function setProfile(data)
{
//	getProfilePic();
	console.log(data);
	$("#name_surname_popup").html(data.Firstname + " " + data.Lastname); //set innerHTML of #name_surname element
	$("#user_bio").html("<strong>Bio: </strong><br>" + data.Bio);// You get the idea
	$("#popup_pic").attr("src", "../" + data.image);
}

function getLiked(user)
{
	data = {};

	data.user = user;
	$.ajax("../bckend/getLikes.php",
	{
		type : "POST",
		data : data
	});
}

function getBlock(user)
{
	data = {};

	data.user = user;
	$.ajax("../bckend/block.php",
	{
		type : "POST",
		data : data
	});
}
