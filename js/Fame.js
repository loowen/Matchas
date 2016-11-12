function IncreaseFame(prof, type)
{
    data = {};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/increaseFame.php",
	{
        type : "POST",
		data : data
    });
}

function DecreaseFame(prof, type)
{
    data = {};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/decreaseFame.php",
	{
        type : "POST",
		data : data
    });
}