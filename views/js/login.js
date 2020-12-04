
function authentification() {
    var wel = document.getElementById("user");

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
            console.log(iusername.indexOf("#"));
            // if (iusername != "error") {
            //     // ipuser.style.display = "none";
            //     // ippass.style.display = "none";
            //     iplogin.style.display = "none";
            //     wel.removeAttribute("style");
            if (iusername.indexOf("#") != 3) wel.innerHTML = "Welcome, " + iusername + "!";
            else {
                alert("Fail to login");
            }
            // }
            // else {
            //     wel.style.display = "none";
            //     // ipuser.removeAttribute("style");
            //     // ippass.removeAttribute("style");
            //     iplogin.removeAttribute("style");
            // }
        }
    }
    ajax.open(method, url + username, asynchronous);
    ajax.send();
}

function logout() {
    var wel = document.getElementById("user");

    var usernameE = document.getElementById("name");
    var username = usernameE.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/login_controller.php?info=logout";
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            var iusername = data;
            wel.innerHTML = "Welcome, guest";
        }
    }
    ajax.open(method, url, asynchronous);
    ajax.send();
}