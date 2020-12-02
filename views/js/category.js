var numProduct = 0;
var idProduct = -1;

console.log(idProduct);
function getProductList() {
    var iput = document.getElementById("categoryip");
    var resip = iput.value;
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/category_controller.php?function=getProductList";
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            if (data.length > 0) {
                data = data.substr(4, data.length - 1);
                // console.log(data);

                //addResult(data[0, data.indexOf("_")]);
                index = 1;
                clearResult();
                while (data.length > 0) {
                    numProduct = index;

                    beginStr = 0;
                    endStr = data.length;
                    if (data.indexOf("_") > 0)
                        endStr = data.indexOf("_");
                    product = data.substr(beginStr, endStr);
                    data = data.substr(endStr + 1, data.length - 1);
                    // console.log(data);

                    beginStr = 0;
                    endStr = data.length;
                    if (data.indexOf("_") > 0)
                        endStr = data.indexOf("_");
                    id = data.substr(beginStr, endStr);
                    data = data.substr(endStr + 1, data.length - 1);
                    // console.log(data);

                    addResult(product, index, id);
                    index = index + 1;
                }
            }
            else addResult("No suggestion", 0);
        }
    }
    ajax.open(method, url + '_' + resip, asynchronous);
    ajax.send();

}
function clearResult() {
    //console.log(numProduct);
    for (var i = 1; i <= numProduct; i++) {
        var dElement = document.getElementById("sResult" + i);
        dElement.remove();
        // console.log("Remove element" + i);
    }
}

function showDetail(id) {
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "controllers/category_controller.php?function=" + id;
    var asynchronous = true;
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            console.log(data);
            var index = 1;
            clearResult();
            var searchBox = document.getElementById("categoryip");
            while (index < 7) {
                var txtElement = document.getElementById("pd" + index);
                beginStr = 0;
                endStr = data.length;
                if (data.indexOf("_") > 0)
                    endStr = data.indexOf("_");
                txt = data.substr(beginStr, endStr);
                data = data.substr(endStr + 1, data.length - 1);
                if (index == 3) searchBox.innerHTML = txt;
                txtElement.innerHTML = txt;
                index = index + 1;
            }
        }
    }
    ajax.open(method, url, asynchronous);
    ajax.send();
}
function addResult(sResult, index, id) {
    var parent = document.getElementById("livesearch");
    var fChild = document.getElementById("categoryip");

    var nResult = document.createElement("div");
    var content = document.createElement("a");
    // console.log(sResult);
    var txtContent = document.createTextNode(sResult);

    content.appendChild(txtContent);

    nResult.appendChild(content);

    parent.appendChild(nResult);

    nResult.classList.add("row");
    nResult.classList.add("shadow-sm");
    nResult.id = "sResult" + index;
    // content.href = "index.php?page=view_product";
    content.onclick = function () { showDetail(id) };
}