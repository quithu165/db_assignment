
function authentification() {
    var wel = document.getElementById("user");

    var usernameE = document.getElementById("loginName");
    var passwordE = document.getElementById("loginPass");
    console.log(usernameE.value);
    var username = usernameE.value;
    var password = passwordE.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/login_controller.php?info=";
    var asynchronous = true;
    // console.log(username);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
        }
    }
    alert(url + username + "_" + password);
    ajax.open(method, url + username + "_" + password, asynchronous);
    ajax.send();
}

function logout() {
    // alert("logout, ok");
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/logout_controller.php?info=logout";
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            alert("logout, ok");
            // var iusername = data;
            // wel.innerHTML = "Welcome, guest";
        }
    }
    ajax.open(method, url, asynchronous);
    ajax.send();
}