function getAccountInfo()
{
	$.ajax("bckend/chat.php", //tell it what sropt to run 
	{
		success : function(data)
		{ // function that will run if request was successful- data 
		// data will be whatever the phpscript echo'd
			var json = jQuery.parseJSON(data);
			setAccount(json);
		} 
	});
}