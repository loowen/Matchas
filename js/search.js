function search()
{
		data = {}; //create POST array to send
	
	data.search = $("#search").val();
    data.age_min = $("#age_min").val();
    data.age_max = $("#age_max").val();
    data.fame_min = $("#fame_min").val();
    data.fame_max = $("#fame_max").val();
    data.interests = $("#interest_filter").val();

	console.log("search=", data);

	//Do some error checks first ???
	
	$.ajax("../bckend/search.php", //tell it what sript to run 
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
			data.search = $("#search").val("");
            window.location.href = data;
		}
	});
}