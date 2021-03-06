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

function setIMGID(data)
{
	var src = $("#pic"+data).attr("src");
	$("#modalsrc").attr("src",src);
}

function deleteIMG()
{
	var src = $("#modalsrc").attr("src");
	var i = 0;
	while (i < 4)
	{
		if($("#pic"+i).attr("src") == src)
		{
			break;
		}
	}
	while (i < 4)
	{
	$("#pic"+i).attr("src", null);
	i++;
	}
	data = {};
	data.src = src;
	$.ajax("bckend/delIMG.php",
	{
		type : "POST",
		data : data,
		success : function(data)
		{
			getAccountInfo();
		}
	});
}

function ProfDelete()
{
	var src = $("#profpic").attr("src");
	var i = 0;
	$("#profpic").attr("src", null);
	while (i < 4)
	{
	$("#pic"+i).attr("src", null);
	i++;
	}
	data = {};
	data.src = src;
	$.ajax("bckend/delProfIMG.php",
	{
		type : "POST",
		data : data,
		success : function(data)
		{
			getAccountInfo();
		}
	});
	getAccountInfo();
}

function getAllPics()
{
	$.ajax("bckend/getUserPics.php",
	{
		success : function(data)
		{
			var json = jQuery.parseJSON(data);
			setAllPics(json); 
			console.log("All", json);
		}
	});
}

function setAllPics(data)
{
	var i = 0;
	while(i < data.length && i < 4)
	{
		console.log("tester","test");
		$("#pic"+i).attr("src", data[i].PicID);
		$("#pic"+i).show();
		i++;
	}
	while(i < 4)
	{
		$("#pic"+i).hide();
		i++;
	}
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
	console.log("tester","teste");
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

function getInterests()
{
	$.ajax("bckend/getInterests.php",
	{
		success : function(data){ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
			setInterests(json);
		}
	});
}

function deleteInterest(interest)
{
	data = {};

	data.interest = interest;
	$.ajax("bckend/deleteInterest.php",
	{
		type : "POST",
		data : data,
		success : function(data)
		{ 
		// function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			getInterests();
		}
	});
}

function setInterests(data)
{
	var i = 0;

	console.log("data = ", data);
	var parent = document.querySelector("#interest_sub");
	while (parent.firstChild) 
        parent.removeChild(parent.firstChild);
	while (i < data.length)
	{
	$("#interest" + i).remove();
		$("#interest_sub").append('<a class="btn btn-default"'
	 + 'id="interest' + i + '"'	
	 +'><span class="glyphicon glyphicon-remove"></span>' 
	 + data[i]
	 + '</a>');
	 $("#interest" + i).attr("onclick", "deleteInterest('" + data[i] + "');");
	 //+ 'onclick="deleteInterest(' + data[i] + ')"';	
		i++;
	}

}

function setAccount(data)
{
	getAllPics();
	getInterests();
	//getInterests();
	$("#first_name").val(data.Firstname); //set value of element
	$("#last_name").val(data.Lastname);
	$("#email").val(data.email);
	$("#bio").val(data.Bio);
	$("#passwd").val("");
	$("#confpasswd").val("");
	getProfilePic();
	//$("#interests").val(data.Bio);
}