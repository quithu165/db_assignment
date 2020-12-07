<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     $_SESSION['username'] = '';
// }
include 'views/header.html';

// define('STAFF', '2');
// define('ADMIN', '3');

// if (!isset($_SESSION['username'])) {
//     $_SESSION['username'] = '';
// }
// $username = $_SESSION['username'];

if (isset($_COOKIE["username"])) {
?>
    <script>
        var loginBlock = document.getElementById("login");
        loginBlock.style.display = 'none';
        var signupBlock = document.getElementById("signup");
        signupBlock.style.display = 'none';
        var logoutBlock = document.getElementById("logout");
        logoutBlock.removeAttribute("style");
    </script>
<?php
} else { ?>
    <script>
        var signupBlock = document.getElementById("signup");
        logoutBlock.style.display = 'none';
        var logoutBlock = document.getElementById("logout");
        loginBlock.removeAttribute("style");
        var logoutBlock = document.getElementById("logout");
        signupBlock.removeAttribute("style");
    </script>
    <?php
}

if (isset($_COOKIE["role"])) {
    if ($_COOKIE["role"] == 1) {
    ?>
        <script>
            var insertdb = document.getElementById("insert");
            var editdb = document.getElementById("edit");
            var deletedb = document.getElementById("delete");
            insertdb.removeAttribute("style");
            editdb.removeAttribute("style");
            deletedb.removeAttribute("style");
        </script>
    <?php
    } else { ?>
        <script>
            var insertdb = document.getElementById("insert");
            var editdb = document.getElementById("edit");
            var deletedb = document.getElementById("delete");
            insertdb.style.display = 'none';
            editdb.style.display = 'none';
            deletedb.style.display = 'none';
        </script>
<?php
    }
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "") {
        include "views/exception.html";
    } elseif ($page == "home") {
        include "views/home.html";
    } elseif ($page == "login") {
        include "views/login.html";
    } elseif ($page == "signup") {
        include "views/signup.html";
    } elseif ($page == "insert") {
        include "views/insert.html";
    } elseif ($page == "edit") {
        include "views/edit.html";
    } elseif ($page == "delete") {
        include "views/delete.html";
    } elseif ($page == "promote") {
        include "views/promote.html";
    }
} else include "views/home.html";
//require_once 'views/footer.html';
?>