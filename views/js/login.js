function authentification() {
    var usernameE = document.getElementsByName("name");
    var passwordE = document.getElementsByName("pass");
    var username = usernameE.value;
    var password = passwordE.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/login_controller.php?info=";
    var asynchronous = true;
    console.log(username);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
        }
    }
    ajax.open(method, url + username + '_' + password, asynchronous);
    ajax.send();
}