function IncreaseFame(prof, type)
{
    data = {};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/increaseFame.php",
	{
        type : "POST",
		data : data,
        success : function(data)
        {
            AddHistory(prof, type);
        }
    });
}

function AddHistory(prof, type)
{
    data={};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/addHistory.php",
    {
        type : "POST",
        data : data
    });
}

function DelHistory(prof, type)
{
    data={};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/DelHistory.php",
    {
        type : "POST",
        data : data
    });
}

function Notify(prof, type)
{
    data={};
    data.prof = prof;
    data.type = type;
    $.ajax("bckend/addNotify.php",
    {
        type : "POST",
        data : data
    });
}

function delNotify()
{
    $.ajax("bckend/delNotify.php",
    {

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