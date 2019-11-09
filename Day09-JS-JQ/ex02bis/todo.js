$(window).on("load", function(){
    var name = "ft_list" + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var c = decodedCookie.split(';');
    var str = null;
    if (c[0].indexOf(name) == 0)
        str = c[0].substring(name.length, c[0].length);
    const ft_list = JSON.parse(str);
    if (ft_list)
    { 
        $(ft_list).each(function(index, value){
        var elem = $("<div></div>").text(value);
        $("#ft_list").append(elem);
        DelElem(elem);
    });
    }
});

$(document).ready(function(){
    $("#button").click(function(){
        var todo = prompt("What to do ?");
        if (!todo)
            return; 
        var elem = $("<div></div>").text(todo);
        $("#ft_list").prepend(elem);
        DelElem(elem);
        SetCookie();
    });
});

function DelElem(elem){
    $(elem).click(function() {
    if (confirm("Voulez-vous supprimer ce to do ?"))
    {
        $(this).remove();
        SetCookie();
    }
    });
}

function SetCookie(){
    var date = new Date();
    date.setTime(date.getTime() + (10*24*60*60*1000));
    var expires = "expires="+ date.toUTCString();
    var array = $("#ft_list").find("div");
    array = jQuery.map(array, (value) => value.innerText);
    document.cookie = "ft_list" + "=" + JSON.stringify(array) + ";" + expires + ";path=/";
}
