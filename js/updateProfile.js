function updateProfile()
{
	data = {}; //create POST array to send
	
	data.name = $("#first_name").val() ; //add user key will be $_POST['name']
	data.surname = $("#last_name").val();
	data.email = $("#email").val();
	data.bio = $("#bio").val();
	console.log("bio=", data.bio);
	data.passwd = $("#passwd").val();
	data.confpasswd = $("#confpasswd").val();
	
	//Do some error checks first ??? 
	$.ajax("bckend/updateProfile.php", //tell it what sropt to run 
	{
		type : "POST", //data type
		data : data, //actual data
		success : function(data){ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			//var json = jQuery.parseJSON(data);
			if (data.length > 0)
			{
				console.log("Status", data);	
				makeAlert(data, "#personal_div");
			}
			getAccountInfo();
		}
	});
}


function setProfIMG()
{
	data={};

	data.newIMG= $("#modalsrc").attr("src");
	$.ajax("bckend/IMGSet.php",
	{
		type : "POST",
		data : data,
		success : function(data)
		{
			
			getAccountInfo();
			$("#profpic").attr("src", data.newIMG);
		}
	});
}


function addinterest()
{
		data = {}; //create POST array to send
	
	data.interest = $("#interests").val();
	console.log("interests=", data.interest);
	
	//Do some error checks first ??? 
	
	$.ajax("bckend/addInterest.php", //tell it what sropt to run 
	{
		type : "POST", //data type
		data : data, //actual data
		success : function(data){ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			//var json = jQuery.parseJSON(data);
			if (data.length > 0)
			{
				console.log("Status", data);	
				makeAlert(data, "#personal_div");
			}
			getAccountInfo();
			data.interest = $("#interests").val("");
		}
	});
}