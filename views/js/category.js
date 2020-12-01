function getProductList() {
    var iput = document.getElementById("categoryip");
    var resip = iput.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/category_controller.php?function=getProductList";
    var asynchronous = true;
    var numStaff = 0;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
        }
    }
    ajax.open(method, url + '_' + resip, asynchronous);
    ajax.send();
}