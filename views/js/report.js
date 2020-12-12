var ajax = new XMLHttpRequest();
var method = "POST";
var url = "controllers/report_controller.php";
var asynchronous = true;
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = this.responseText;
        if (data.length > 0) {
            data = data.substr(1, data.length - 1);
            console.log(data);
            while (data.length > 0) {

                beginStr = 0;
                endStr = data.length;
                if (data.indexOf("_") > 0)
                    endStr = data.indexOf("_");
                name = data.substr(beginStr, endStr);
                data = data.substr(endStr + 1, data.length - 1);
                // console.log(data);

                beginStr = 0;
                endStr = data.length;
                if (data.indexOf("_") > 0)
                    endStr = data.indexOf("_");
                quantity = data.substr(beginStr, endStr);
                data = data.substr(endStr + 1, data.length - 1);
                // console.log(data);

                addRow(name, quantity);
            }
        }
    }

}
ajax.open(method, url, asynchronous);
ajax.send();

function addRow(name, quantity) {
    var table = document.getElementsByName("tableReport")[0];
    var newRow = document.createElement("tr");
    table.appendChild(newRow);
    // new?Row.id = "row" + index;

    var newCol1 = document.createElement("td");
    var txtCol1 = document.createTextNode(name);
    newCol1.appendChild(txtCol1);
    newRow.appendChild(newCol1);

    var newCol2 = document.createElement("td");
    var txtCol2 = document.createTextNode(quantity);
    newCol2.appendChild(txtCol2);
    newRow.appendChild(newCol2);
}