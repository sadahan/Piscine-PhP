function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var c = decodedCookie.split(';');
    if (c[0].indexOf(name) == 0)
        return c[0].substring(name.length, c[0].length);
    return null;
}

function setCookie(cname, cvalue) {
    var date = new Date();
    date.setTime(date.getTime() + (10*24*60*60*1000));
    var expires = "expires="+ date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

window.addEventListener("load", on_load);

function on_load()
{
    var list = document.getElementById("ft_list");
    const ft_list = JSON.parse(getCookie("ft_list"));
    if (ft_list)
        ft_list.forEach((todo) => add_elem(list, todo))
}

function add_elem(parent, todo)
{
    var elem = document.createElement("div");
    elem.innerText = todo;
    elem.onclick = function(){
        if (confirm("Voulez-vous supprimer ce to do ?"))
        {
            parent.removeChild(this);
            setCookie("ft_list", JSON.stringify([...parent.children].map((value) => value.innerText).reverse()));
        }
    }
    parent.prepend(elem);
}

function add_todo() {
    var todo = prompt("What to do ?");
    if (!todo)
        return; 
    var parent = document.getElementById("ft_list");
    add_elem(parent, todo);
    setCookie("ft_list", JSON.stringify([...parent.children].map((value) => value.innerText).reverse()));
}