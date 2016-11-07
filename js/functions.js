  function goDoSomething(){       

            alert("data-id:");
        }

function _(element)
{
	return (document.getElementById(element));
}


function userUpload()
{
	uploadFile(_("image1").files[0], "user" ,null);
}

function uploadFile(file, key, name)
{
    var formelem = document.querySelector("#image_upload_form");
	var	formdata = new FormData(formelem);
    console.log(formdata.toString());
	if (name)
		formdata.append(key, file, name);
	else
		formdata.append(key, file);
	var ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandler, false);
	ajax.open("POST", "bckend/upload.php");
	ajax.send(formdata);
}

function completeHandler()
{
	console.log("Done");
    document.querySelector("#image1").value = "";
}

$(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});