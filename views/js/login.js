var ipuser = document.getElementById("name");
var ippass = document.getElementById("pass");
var iplogin = document.getElementById("login");
var wel = document.getElementById("user");


var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/session_controller.php?confirm=username";
var asynchronous = true;
var username;
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = this.responseText;
        username = data;
        console.log(username);
    }   
}
ajax.open(method, url + username, asynchronous);
ajax.send();

if (username != "error") {
    ipuser.style.display = "none";
    ippass.style.display = "none";
    iplogin.style.display = "none";
    wel.removeAttribute("style");
    wel.innerHTML = "Welcome, " + username + "!";
}
else {
    wel.style.display = "none";
    ipuser.removeAttribute("style");
    ippass.removeAttribute("style");
    iplogin.removeAttribute("style");
}

function authentification() {
    var usernameE = document.getElementById("name");
    var username = usernameE.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/login_controller.php?info=";
    var asynchronous = true;
    // console.log(username);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            var iusername = data;
            if (iusername != "error") {
                ipuser.style.display = "none";
                ippass.style.display = "none";
                iplogin.style.display = "none";
                wel.removeAttribute("style");
                wel.innerHTML = "Welcome, " + iusername + "!";
            }
            else {
                wel.style.display = "none";
                ipuser.removeAttribute("style");
                ippass.removeAttribute("style");
                iplogin.removeAttribute("style");
            }
        }
    }
    ajax.open(method, url + username, asynchronous);
    ajax.send();
}